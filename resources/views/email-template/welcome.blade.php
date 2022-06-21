@extends('email-template.master')

@section('subject') Welcome to Jeeni! @endsection


@section('content')
<!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" ><![endif]-->
<div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
        <tbody>
        <tr>
            <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                <div style="font-family:Arial;font-size:16px;font-weight:normal;line-height:22px;text-align:left;color:#bdbdbd;">
                    <span style="color: #e30613; font-weight: bold; text-transform: capitalize; font-size: 30px; padding-bottom: 20px;">
                        Welcome To Jeeni
                    </span>
                    <br /><br /> Greetings {{ $user->getFullName() }}<br />
                    You have joined Jeeni as our latest {{ strtoupper($user->role->name) }}, a very warm welcome. <br />
                    <ul>
                        <li>Your Username is: {{ $user->user_name }}</li>
                        <li>You can Log-in <a href="{{ route('login') }}">HERE</a> and enjoy everything for FREE!</li>
                    </ul>
                    <br/>
                    @if($user->role->name == 'viewer')
                        <ul>
                            <li>100 channels of entertainment</li>
                            <li>vote to push your favourites up the charts</li>
                            <li>special offers on tickets, deals & merchandise</li>
                            <li>latest news and exclusive info</li>
                            <li>create and share your own playlists</li>
                            <li>earn rewards for spreading the love</li>
                            <li>no adverts, no rip-offs, no hype, no fakes</li>
                        </ul>
                    @else
                        BUILD YOUR FANBASE & BOOST YOUR CAREER:<br/>
                        <ul>
                            <li>your own dedicated commercial showcase</li>
                            <li>personal Jeeni address</li>
                            <li>publicity service to your fans & the whole Jeeni audience</li>
                            <li>Pro Artist marketing suite with full analytics & reports</li>
                            <li>keep 100% of all your sales income</li>
                            <li>keep 100% of all your donations</li>
                            <li>full creative rights package</li>
                            <li>automatic eligibility for Jeeni Festivals & Awards</li>
                            <li>Jeeni helpdesk service</li>
                        </ul>
                        <br/>
                        <ul>
                            <li>100 channels of free entertainment</li>
                            <li>benefit as your fans push you up the charts</li>
                            <li>create special offers on tickets, deals & merchandise</li>
                            <li>publicise your latest news and exclusive info</li>
                            <li>earn rewards for spreading the love</li>
                        </ul>
                    @endif
                    And congratulations - you're a Jeenius! <br /> Jeeni - built with love.
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<!--[if mso | IE]></td></tr></table><![endif]-->
@endsection
