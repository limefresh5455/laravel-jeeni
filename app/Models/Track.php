<?php

namespace App\Models;

use App\Helpers\Jeeni;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

/**
 *
 */
class Track extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'showcase_id',
        'title',
        'track_file',
        'thumbnail',
        'description',
        'is_active',
        'duration',
        'is_valid_track',
        'slug'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('ancient', function (Builder $builder) {
            $builder->where('is_valid_track', true);
        });
    }

    /**
     * Return associated User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return associated Showcase.
     */
    public function showcase(): BelongsTo
    {
        return $this->belongsTo(Showcase::class);
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return url('track/'.Jeeni::encryptData($this->id));
    }

    /**
     * @return mixed
     */
    public function getMyTags() {
        $trackId = $this->id;
        return Tag::whereIn('id',function ($query) use ($trackId) {
            $query->select('tag_id')
                ->from('track_tags')
                ->where('track_id', $trackId);
        })->get();
    }

    /**
     * @return string;
     */
    public function getThumbnail(): string
    {
        if(!is_int($this->thumbnail)) {
            $thumb = "https://jeeni.com/wp-content/plugins/jeeni-plugin/img/backgrounds/jeeni-default-img.jpg";
        }
        $thumb = $this->thumbnail;
        if (!filter_var($thumb, FILTER_VALIDATE_URL)) {
            $thumb = Jeeni::getRandomThumbnail();
        }
        return $thumb;
    }

    /**
     * @return string
     */
    public function getDuration(): string
    {
        return gmdate("i:s", $this->duration);
    }

    /**
     * @return string name of database table
     */
    public function searchableAs(): string
    {
        return 'tracks';
    }

    /**
     * @return mixed|string
     */
    public function getTrackFile()
    {
        return (is_null($this->track_file)) ? '' : $this->track_file;
    }

    /**
     * @return mixed
     */
    public function getSocialShare($type = 'facebook') {
        return \Share::page($this->getLink())->{$type}();
    }

    /**
     * @param false $html
     * @return mixed
     */
    public function getShareList($html = false) {
        if($html) {
            return \Share::page($this->getLink(), $this->title)
                ->facebook()
                ->twitter()
                ->linkedin($this->description)
                ->whatsapp();
        } else {
            return \Share::page($this->getLink(), $this->title)
                ->facebook()
                ->twitter()
                ->linkedin($this->description)
                ->whatsapp()->getRawLinks();
        }
    }

    /**
     * A number of user (viewer) voted for current track
     * Returns users who voted for this track
     * @return BelongsToMany
     */
    public function votes(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'user_votes',
            'track_id',
            'user_id',
            'id',
            'id'
        );
    }

    /**
     * @return int
     */
    public function hasCurrentUserVote(): int
    {
        if(auth()->check()) {
            return UserVote::where('user_id', Auth::user()->id)
                ->where('track_id', $this->id)->count();
        } else {
            return 0;
        }
    }

    /**
     * @return int
     */
    public function hasCurrentUserPlayList(): int
    {
        if(auth()->check()) {
            return PlaylistTrack::whereHas('playlist', function ($query){
                $query->where('user_id', auth()->user()->id);
            })->where('track_id', $this->id)->count();
        } else {
            return 0;
        }
    }

    /**
     * @return string
     */
    public function getVoteClass(): string
    {
        return ($this->hasCurrentUserVote())
            ? 'bi-heart-fill' : 'bi-heart';
    }

    /**
     * @return string
     */
    public function getPlayListClass(): string
    {
        return ($this->hasCurrentUserPlayList())
            ? 'bi-dash-lg' : 'bi-plus-lg';
    }

    /**
     * @return string
     */
    public function getVoteActionLink(): string
    {
        return ($this->hasCurrentUserVote()) ?
            route('track.remove-from-favourite') : route('track.add-to-favourite');
    }

    /**
     * @return string
     */
    public function getPlayListActionLink(): string
    {
        return ($this->hasCurrentUserPlayList()) ?
            route('track.remove-from-playlist') : route('track.add-to-playlist');
    }

    /**
     * @return string
     */
    public function getVoteActionClass(): string
    {
        return (!auth()->check()) ? '' : (($this->hasCurrentUserVote())
            ? 'remove-track-to-favourite' : 'add-track-to-favourite');
    }

    /**
     * @return string
     */
    public function getPlayListActionClass(): string
    {
        return (!auth()->check()) ? '' : (($this->hasCurrentUserPlayList())
            ? 'remove-track-to-playlist' : 'add-track-to-playlist');
    }


    /**
     * @return array
     */
    public function getChannelIds(): array
    {
        return DB::table('track_channels')
            ->where('track_id', $this->id)
            ->pluck('channel_id')->toArray();
    }

    /**
     * @return mixed
     */
    public function similarTracks() {
        $trackId = $this->id;
        return Track::whereIn('id', function($query) use($trackId) {
            $query->select('track_id')
                ->from('track_channels')
                ->where('track_id', '!=', $trackId)
                ->whereIn('channel_id', $this->getChannelIds());
        })->limit(4)->get();
    }

    /**
     * @param string $direction
     * @return string
     */
    public function getRelatedTrack(string $direction = 'next'): string
    {
        $trackId = $this->id;
        $order = ($direction == 'next') ? 'DESC' : 'ASC';
        $relatedTrack = Track::whereIn('id', function($query) use($trackId) {
            $query->select('track_id')
                ->from('track_channels')
                ->where('track_id', '!=', $trackId)
                ->whereIn('channel_id', $this->getChannelIds());
        })->orderBy('id', $order)->first();
        return ($relatedTrack instanceof Track) ? $relatedTrack->getLink() : $this->getLink();
    }

    /**
     * @return mixed
     */
    public function getArtistShowcaseLink()
    {
        return $this->user->getArtistLink();
    }

    public function isTrackOwner(): bool
    {
        return (auth()->check() && auth()->user()->id == $this->user_id) ?? true;
    }
}
