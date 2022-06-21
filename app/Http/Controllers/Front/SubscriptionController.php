<?php

namespace App\Http\Controllers\Front;

use App\Events\UserRegistered;
use App\Helpers\Jeeni;
use App\Helpers\SocialDataHelper;
use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Stripe\Customer;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Stripe\Token as StripeToken;

/**
 * SubscriptionController
 */
class SubscriptionController extends Controller
{
    /**
     * Showing the join page.
     *
     * @return Renderable
     */
    public function joinJeeni(): Renderable
    {
        return view('front.subscription.join-jeeni');
    }

    /**
     * Showing checkout page
     *
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function checkout(Request $request)
    {
        $type = $request->get('type', 'viewer');
        $passwordClass = (session()->has('social_login')) ? 'd-none' : '';

        if($type == 'viewer' && session()->has('social_login')) {
            $roleId = Jeeni::getRoleIdByType($type);
            $user = User::create([
                'first_name' => SocialDataHelper::getSocialData('first_name'),
                'last_name' => SocialDataHelper::getSocialData('last_name'),
                'name' => SocialDataHelper::getSocialData('name'),
                'email' => SocialDataHelper::getSocialData('email'),
                'user_name' => SocialDataHelper::getSocialData('email'),
                'password' => SocialDataHelper::getSocialData('password'),
                'role_id' => $roleId,
                'is_active' => true,
                'agree_news_letter' => false,
                'email_verified_at' => Carbon::now()
            ]);

            event(new UserRegistered($user));

            SocialDataHelper::attachSocialAccount($user->id);

            auth()->login($user);

            return redirect()->route('welcome');
        }

        return view('front.subscription.checkout', compact(
            'type',
            'passwordClass'
        ));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function postCheckout(Request $request): JsonResponse
    {
        $userType = $request->get('hdnType', 'viewer');
        $newsLetter = $request->has('signUpNewsLetter');
        $roleId = Jeeni::getRoleIdByType($userType);
        $email = $request->get('email');
        $cardPaymentChoices = $request->get('CardPaymentChoices');
        if($this->isEmailExist($email)) {
            return response()->json([
                'error' => true,
                'message' => 'User with Email('.$email.') already Exist'
            ]);
        }
        try {

            $userData = [
                'first_name' => $request->get('firstname'),
                'last_name' => $request->get('lastname'),
                'name' => $request->get('firstname') . ' ' .$request->get('lastname'),
                'email' => $request->get('email'),
                'user_name' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'role_id' => $roleId,
                'is_active' => true,
                'agree_news_letter' => $newsLetter,
                'email_verified_at' => Carbon::now(),
                'is_password_updated' => true
            ];
            $user = User::create($userData);
            event(new UserRegistered($user));
            /*if($userType == 'artist') {```
                if($cardPaymentChoices == 'Stripe') {
                    $user->update(['pm_type' => strtolower($cardPaymentChoices)]);
                    if($request->has('stripeToken')) {
                        $stripeTokenData = $request->get('stripeToken');
                        $stripeTokenId = $stripeTokenData['id'];
                        $user->update(['pm_last_four' => $stripeTokenData['card']['last4']]);

                        if (is_null($user->stripe_id)) {
                            $this->createStripeCustomer($user);
                        }

                        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
                        $stripe->customers->createSource($user->stripe_id,['source' => $stripeTokenData]);

                        $user->newSubscription('default', Jeeni::getDefaultPlan())->create($stripeTokenData);
                    }
                }
            }*/

            $userIntent = $user->createSetupIntent();
            return response()->json([
                'success' => true,
                'data' => [
                    'email' => $user->email,
                    'password' => $request->get('password'),
                    'indentSecret' => $userIntent->client_secret,
                    'cardHolderName' => $user->name
                ],
                'message' => 'You have registered successfully!!'
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => true,
                'message' => 'Unable to process your request.['.$ex->getMessage().']'
            ]);
        }
    }

    /**
     * @param $email
     * @return bool
     */
    public function isEmailExist($email): bool
    {
        $isExist = User::whereEmail($email)->first();
        return ($isExist instanceof User);
    }

    /**
     * @param $stripeTokenId
     * @param null $user
     * @return array
     */
    public function updateCardSource($stripeTokenId, $user): array
    {
        try {
            $customer = $user->asStripeCustomer();
            $token = StripeToken::retrieve($stripeTokenId, config('services.stripe.secret'));
            $card = null;
            $cards = $user->cards();
            if ($cards) {
                foreach ($cards as $exist_card) {
                    if ($exist_card->fingerprint == $token->card->fingerprint) {
                        $card = $exist_card;
                    }
                }
            }

            if (is_null($card)) {
                $card = $customer->sources->create(array('source' => $token));
                $user->updateStripeCustomer(['default_source' => $card->id]);
            }

            return ['success' => true, 'card_id' => $card->id];
        } catch (\Stripe\Error\Card | \Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * @param $user
     * @param array $option
     * @return array
     */
    public function createStripeCustomer($user, array $option = []): array
    {
        try {

            $user_options = [
                'name' => $user->name,
                'email' => $user->email
            ];

            //merge something like metadata
            $user_options = array_merge($user_options, $option);
            $customer = $user->createAsStripeCustomer($user_options);

            return ['success' => true, 'customer' => $customer];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function chargePayment(Request $request): array
    {
        try {
            $user = User::whereEmail($request->email)->first();
            if($user instanceof User) {
                $planDetails = Jeeni::getDefaultPlan();
                $user->newSubscription($planDetails['name'], $planDetails['key'])
                    ->createAndSendInvoice([],['days_until_due' => 0]);
                return ['success' => true, 'message' => 'You have registered successfully!!'];
            } else {
                return ['error' => true, 'message' => 'Something went wrong, please try again.'];
            }

        }catch (\Exception $ex) {
            return ['error' => true, 'message' => $ex->getMessage()];
        }
    }

    public static function getTestData() {
        try {
            $user = User::whereEmail('patelg10@gmail.com')->first();
            event(new UserRegistered($user));
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }
}
