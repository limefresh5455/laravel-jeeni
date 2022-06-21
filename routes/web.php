<?php

use App\Http\Controllers\Front\ArtistController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ChannelController;
use App\Http\Controllers\Front\FollowerController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\InviteController;
use App\Http\Controllers\Front\MarketingController;
use App\Http\Controllers\Front\OfferController;
use App\Http\Controllers\Front\PlaylistController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\ShowcaseController;
use App\Http\Controllers\Front\SubscriptionController;
use App\Http\Controllers\Front\TrackController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\SocialLogin\SocialAuthGoogleController;
use Illuminate\Support\Facades\Route;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Migration Script --- *** To remove before production ***/
//Route::get('/jeeni-asset-migration',function(){
//    Artisan::call('jeeni-asset:migrate');
//});

/*Frontend Routes starts*/

/* Log report route */
Route::get('logs', [LogViewerController::class, 'index']);

Route::get('/', [FrontController::class, 'welcome'])->name('welcome');

Route::get('/privacy', [FrontController::class, 'getDynamicPage'])->name('privacy');
Route::get('/terms', [FrontController::class, 'getDynamicPage'])->name('terms');
Route::get('/about', [FrontController::class, 'getDynamicPage'])->name('about');
Route::get('/faq', [FrontController::class, 'getDynamicPage'])->name('faq');

Route::get('/join-now', [FrontController::class, 'join_now'])->name('join-now');


Route::get('/partners', [FrontController::class, 'partners'])->name('partners');
Route::get('/support', [FrontController::class, 'supportHelpDesk'])->name('support');
Route::get('/team', [FrontController::class, 'team'])->name('team');
Route::post('/supportSubmit', [FrontController::class, 'supportSubmit'])->name('support.submit');
Route::get('/invest', [FrontController::class, 'invest'])->name('invest');
Route::get('/invest-right', [FrontController::class, 'investRight'])->name('invest-right');

/* channel routes */
Route::get('/channel/{slug}', [ChannelController::class, 'getData'])->name('channel');

/* subscription routes */
Route::get('/subscribe', [SubscriptionController::class, 'joinJeeni'])
    ->name('subscribe');
Route::get('/checkout', [SubscriptionController::class, 'checkout'])
    ->name('checkout');

Route::post('/charge-payment', [SubscriptionController::class, 'chargePayment'])
    ->name('checkout.charge_payment');

Route::post('/register-user', [SubscriptionController::class, 'postCheckout'])
    ->name('checkout.post');

/* Search route */
Route::get('/search', [SearchController::class, 'search'])->name('search-results');

/* blog routes */
Route::get('/blogs', [BlogController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [BlogController::class, 'getData'])->name('blog');

Route::get('/artist/{slug}', [ArtistController::class, 'getArtistProfile'])->name('artist.profile');

Route::get('/test', [SubscriptionController::class, 'getTestData'])->name('getTestData');

Route::get('track/{slug}', [TrackController::class, 'single_track'])->name('singletrack');

Route::get('/redirect_google', [SocialAuthGoogleController::class, 'redirect_google'])->name('redirect_google');
Route::get('/callback/google', [SocialAuthGoogleController::class, 'callback_google'])->name('callback_google');
/*Route::POST('web-hook/google/javascript', [GoogleSocialLoginController::class, 'callback_javascript'])->name('callback_google-javascript');*/

Route::post('/go-to-track', [TrackController::class, 'goToTrack'])
    ->name('go-to-track');

Route::get('/unsubscribe/{slug}', [ProfileController::class, 'unsubscribeUser'])->name('user.unsubscribe');

Route::group(['middleware' => 'auth'], function () {
    // User needs to be authenticated to enter here.
    Route::get('/my-profile', [ProfileController::class, 'my_profile'])->name('myprofile');
    Route::post('/update-profile-popup', [ProfileController::class, 'updateProfilePopup'])
        ->name('update.profile.popup');

    Route::post('profile/{type}/update', [ProfileController::class, 'updateProfileMedia'])
        ->name('update.profile.photo');


    Route::get('/invoice/{subscriptionId}', [ProfileController::class, 'getSubscriptionInvoice'])
        ->name('profile.invoice');

    Route::get('/my-feedback', [FrontController::class, 'my_feedback'])->name('myfeedback');
    Route::post('/post-my-feedback', [FrontController::class, 'postMyFeedBack'])->name('post.myfeedback');

    Route::get('/my-account-edit', [FrontController::class, 'my_account_edit'])->name('account.edit');
    Route::post('/my-account-edit', [FrontController::class, 'post_my_account_edit'])->name('account.edit.post');

    Route::post('/update-news-letter-consent', [FrontController::class, 'updateNewsLetterConsent'])
        ->name('account.update-news-letter-consent');

    Route::post('/close_account', [FrontController::class, 'close_account'])->name('account.close');

    /* offer routes */
    Route::get('/offer-service', [OfferController::class, 'getOffers'])->name('offers.list');
    Route::post('offers/store', [OfferController::class, 'store'])->name('offers.store');
    Route::patch('offers/update/{offer}', [OfferController::class, 'update'])->name('offers.update');
    Route::delete('offers/delete/{offer}', [OfferController::class, 'delete'])->name('offers.delete');
    Route::post('offers/search', [OfferController::class, 'search'])->name('offers.search');

    /* marketing(newsfeed) routes */
    Route::prefix('marketing')->group(function () {
        Route::get('', [MarketingController::class, 'getData'])->name('marketing.view');
        Route::post('store', [MarketingController::class, 'store'])->name('marketing.store');
        Route::patch('update/{newsfeed}', [MarketingController::class, 'update'])->name('marketing.update');
        Route::delete('delete/{newsfeed}', [MarketingController::class, 'delete'])->name('marketing.delete');
        Route::post('search', [MarketingController::class, 'search'])->name('marketing.search');
    });

    Route::prefix('my-invites')->group(function () {
        Route::get('', [InviteController::class, 'index'])->name('invite.view');
        Route::post('send', [InviteController::class, 'sendInvites'])->name('invite.send');
    });

    Route::post('/update-social-links', [ProfileController::class, 'update_social_media_links'])
        ->name('social.links.update');

    /** Routes for my-artists */
    Route::get('/my-artists', [FollowerController::class, 'getMyArtist'])->name('my-artists');
    Route::post('/add-following', [FollowerController::class, 'addArtistToMyFollowings'])->name('artist.following.add');
    Route::post('/remove-following', [FollowerController::class, 'removeArtistFromMyFollowings'])->name('artist.following.remove');

    /** Routes for playlist */
    Route::get('/my-playlist', [PlaylistController::class, 'getPlaylistTracks'])->name('myplaylist');
    Route::post('/my-playlist/add', [PlaylistController::class, 'addTrackToPlaylist'])->name('myplaylist.add');
    Route::post('/my-playlist/search', [PlaylistController::class, 'search'])->name('myplaylist.search');

    /** Routes for showcase */
    Route::post('/showcase/store', [ShowcaseController::class, 'addShowcase'])->name('showcase.store');
    Route::post('/my-playlist/search', [ShowcaseController::class, 'searchShowcase'])->name('showcase.search');



    /** track manipulation actions */
    Route::post('track/add-to-favourite', [TrackController::class, 'addToFavourite'])
        ->name('track.add-to-favourite');
    Route::post('track/remove-from-favourite', [TrackController::class, 'removeFromFavourite'])
        ->name('track.remove-from-favourite');
    Route::post('track/add-to-playlist', [TrackController::class, 'addToPlaylist'])
        ->name('track.add-to-playlist');
    Route::post('track/remove-from-playlist', [TrackController::class, 'removeFromPlaylist'])
        ->name('track.remove-from-playlist');

    Route::post('track/save-track-details', [TrackController::class, 'saveTrackDetails'])
        ->name('track.save-track-details');
    Route::post('track/update-track-details', [TrackController::class, 'updateTrackDetails'])
        ->name('track.update-track-details');
    Route::post('track/delete-track', [TrackController::class, 'deleteTrack'])
        ->name('track.delete-track');
    Route::post('track/upload/{type}', [TrackController::class, 'uploadFile'])
        ->name('track.upload-file');
});

Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
/* Frontend Routes ends */

/* Voyager & Backend Routes starts */
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    $namespacePrefix = '\\' . config('voyager.controllers.namespace') . '\\';
    foreach (Voyager::model('DataType')::all() as $dataType) {
        $breadController = $dataType->controller
            ? Str::start($dataType->controller, '\\')
            : $namespacePrefix . 'VoyagerBaseController';
        Route::post($dataType->slug . '/browse', $breadController . '@browse')->name('voyager.' . $dataType->slug . '.browse');
    }

    Route::get('sendmail', $namespacePrefix . 'VoyagerSendEmailController@sendEmails')
        ->name('voyager.sendmail.index');
    Route::post('sendmail/browse-users', $namespacePrefix . 'VoyagerSendEmailController@browseUsers')
        ->name('voyager.sendmail.browse.users');
    Route::post('sendmail/schedule-emails', $namespacePrefix . 'VoyagerSendEmailController@scheduleEmails')
        ->name('voyager.sendmail.schedule-emails');
    Route::get('sendmail/preview/{slug}', $namespacePrefix . 'VoyagerSendEmailController@showPreview')
        ->name('voyager.sendmail.preview');

    Route::get('homepage-configuration', $namespacePrefix . 'VoyagerSettingsController@getHomepageConfiguration')
        ->name('voyager.homepage.configuration');
    Route::post('homepage-save-configuration', $namespacePrefix . 'VoyagerSettingsController@postHomepageConfiguration')
        ->name('voyager.homepage.save-configuration');
});
/* Voyager & Backend Routes starts */

