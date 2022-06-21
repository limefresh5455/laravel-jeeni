@extends('email-template.master')

@section('subject') Support request received @endsection


@section('content')
<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#323230;width:100%;" width="100%">
    <tbody>
        <tr>
            <td align="left" style="padding:10px 25px;word-break:break-word;">
                <table width="100%">
                    @include('email-template.partials.mail-subject',['subject' => $subject])
                    <tr>
                        <td width="100%" style="height: 20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="100%">
                            @php
                                $content = 'Dear '.$user->name.',<br/><br/>';
                            @endphp
                            @include('email-template.partials.table-cell',['content' => $content])
                        </td>
                    </tr>
                    <tr>
                        <td width="100%">
                            @php
                                $content = \Illuminate\Support\Facades\Lang::get('emails.feedback_customer_1');
                                $content .= '<br/><br/><br/>';
                                $content .= \Illuminate\Support\Facades\Lang::get('emails.feedback_customer_2', ['link' => route('support')]);
                            @endphp
                            @include('email-template.partials.table-cell',['content' => $content])
                        </td>
                    </tr>

                    <tr>
                        <td width="100%" style="height: 20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="100%">
                            @php
                                $content = 'Thanks again for your continued support.<br/>Team Jeeni';
                            @endphp
                            @include('email-template.partials.table-cell',['content' => $content])
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
@endsection
