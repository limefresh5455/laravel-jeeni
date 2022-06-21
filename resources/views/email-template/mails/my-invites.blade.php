@extends('email-template.master')

@section('content')
    <div style="text-align: left">
        <p>
            Greeting User,
        </p>
        <p>
            This is a personal invitation from {{ $user_name }} to join Jeeni, the entertainment platform for
            independent
            musicians and performers.
        </p>

        <div>
            As viewers we enjoy all this for FREE:
            <ul>
                <li>100 channels of entertainment</li>
                <li>votes to push our favourites up the charts</li>
                <li>special offers on tickets, deals & merchandise</li>
                <li>latest news and exclusive info</li>
                <li>create and share our own playlists</li>
                <li>rewards for spreading the love</li>
                <li>no adverts, no rip-offs, no hype, no fakes</li>
            </ul>
        </div>
        <br>
        <div>
            As artists we boost our careers with all this:
            <ul>
                <li>our own commercial showcase</li>
                <li>a personal Jeeni address</li>
                <li>publicity service to our fans & the whole Jeeni audience</li>
                <li>professional marketing suite with full analytics & reports</li>
                <li>we keep 100% of all our sales income</li>
                <li>we keep 100% of all our donations</li>
                <li>full creative rights package</li>
                <li>automatic entry for Jeeni Festivals & Awards</li>
            </ul>
        </div>
        <p>
            <a href="{{ route('subscribe') }}">CLICK HERE</a> to join, and Jeeni will recognise my personal code to give a thank-you reward.
        </p>
        <p>
            Help me spread the love, and have a great time on Jeeni.
        </p>
    </div>
@endsection
