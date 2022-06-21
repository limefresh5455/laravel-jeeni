@if(auth()->check())
    <span title="Add to My Playlist" id="trackListAction_{{ $track->id }}" data-user-id="{{ auth()->user()->id }}"
          data-track-id="{{ $track->id }}"
          data-submit-url="{{ $track->getPlayListActionLink() }}"
          class="{{ $track->getPlayListActionClass() }}">
        <i class="bi {{ $track->getPlayListClass() }}"></i>
    </span>
@else
    <span data-target="toolTipDataPlaylist"
          class="jeeni-tip {{ $track->getPlayListActionClass() }}">
        <i class="bi {{ $track->getPlayListClass() }}"></i>
    </span>
@endif
