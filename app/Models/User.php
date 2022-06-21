<?php

namespace App\Models;

use App\Helpers\Jeeni;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use TCG\Voyager\Models\MenuItem;

/**
 *
 */
class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'first_name',
        'last_name',
        'user_name',
        'password',
        'cover_photo',
        'avatar',
        'bio',
        'facebook_social',
        'twitter_social',
        'linkedin_social',
        'instagram_social',
        'website_social',
        'youtube_social',
        'paypal_link',
        'is_active',
        'email_verified_at',
        'pm_type',
        'pm_last_four',
        'stripe_id',
        'display_name',
        'is_password_updated',
        'agree_news_letter',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return string
     */
    public function getFullName(): string
    {
        $name = (isset($this->display_name)) ? $this->display_name : $this->name;
        if($name == '') {
            $name = $this->first_name . ' ' . $this->last_name;
        }
        return $name;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return ($this->avatar == 'users/default.png') ?
            asset('images/users/default.png') : $this->avatar;
    }

    /**
     * @return string
     */
    public function getCoverPhoto(): string
    {
        return (is_null($this->cover_photo)) ?
            asset('front/images/profile-cover.png') : $this->cover_photo;
    }

    /**
     * @return string
     */
    public function getArtistLink(): string
    {
        return route('artist.profile',['slug' => Jeeni::encryptData($this->id)]) . '?t=showcase';
    }

    /**
     * @return array
     */
    public function getMyChannels(): array
    {
        return DB::table('user_channels')
            ->where('user_id', $this->id)
            ->pluck('channel_id')->toArray();
    }

    /**
     * @return HasMany
     */
    public function showcases(): HasMany
    {
        return $this->hasMany(Showcase::class);
    }

    /**
     * @return HasMany
     */
    public function playlists(): HasMany
    {
        return $this->hasMany(Playlist::class);
    }

    /**
     * @return HasMany
     */
    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    /**
     * @return mixed|string
     */
    public function getPaypalLink()
    {
        return (is_null($this->paypal_link)) ? '#' : $this->paypal_link;
    }

    /**
     * @param iterable|string $ability
     * @param array $arguments
     * @return bool
     */
    public function can($ability, $arguments = []): bool
    {
        if ($arguments instanceof MenuItem) {
            if (!is_null($arguments->url) && $arguments->url != '') {
                return $this->hasPermission(Jeeni::getSectionName($ability, $arguments->url, 'url'));
            } elseif (!is_null($arguments->route) && $arguments->route != '') {
                $routeItems = explode('.', $arguments->route);
                return $this->hasPermission(Jeeni::getSectionName($ability, $routeItems[1], 'route'));
            } else {
                return true;
            }
        } elseif($arguments instanceof Model) {
            return $this->hasPermission($ability.'_'.$arguments->getTable());
        } else {
            return $this->hasPermission($ability.'_'.$arguments);
        }
    }

    /**
     * @return string
     */
    public function currentRole(): string
    {
        return ucfirst($this->role->name);
    }

    /**
     * @param bool $status
     */
    public function toggleNewsletter(bool $status = true) {
        $this->update([
            'agree_news_letter' => $status
        ]);
    }

    /**
     *
     */
    public function enableNewsletter() {
        $this->toggleNewsletter(true);
    }

    /**
     *
     */
    public function disableNewsletter() {
        $this->toggleNewsletter(false);
    }

    /**
     * @return string
     */
    public function getUnSubscribeLink(): string
    {
        return route('user.unsubscribe', [
            'slug' => Jeeni::encryptData($this->id)
        ]);
    }
}
