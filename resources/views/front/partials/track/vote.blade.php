@if(auth()->check())
    <span title="Vote for this Track" id="trackVoteAction_{{ $track->id }}" data-user-id="{{ auth()->user()->id }}"
        data-track-id="{{ $track->id }}"
        data-submit-url="{{ $track->getVoteActionLink() }}"
        class="{{ $track->getVoteActionClass() }}">
        <i class="bi {{ $track->getVoteClass() }}"></i>
    </span>
@else
    <span data-target="toolTipDataVote"
          class="jeeni-tip {{ $track->getVoteActionClass() }}">
        <i class="bi {{ $track->getVoteClass() }}"></i>
    </span>
@endif

