@extends('email-template.master')

@section('subject') Support request received @endsection


@section('content')
<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#323230;width:100%;" width="100%">
    <tbody>
        <tr>
            <td align="left" style="padding:10px 25px;word-break:break-word;">
                <table width="100%">
                    @include('email-template.partials.mail-subject',['subject' => 'THANK YOU!'])
                    <tr>
                        <td width="100%">
                            @php
                                $data = 'Dear '.$user_name.', '
                            @endphp
                            @include('email-template.partials.table-cell',['content' => $data])
                        </td>
                    </tr>

                    <tr>
                        <td width="100%">
                            @php
                                $data = 'Thanks for uploading your track on Jeeni. Excellent!<br/><br/>';
                                $data .= 'Please be patient with us. Your track is in the queue, waiting to be approved by a real human being.<br/><br/>';
                                $data .= 'We\'ll let you know as soon as it\'s approved, or if there is any reason it can\'t be approved just yet.<br/><br/>';
                                $data .= 'Please do not reply to this message directly.';
                            @endphp
                            @include('email-template.partials.table-cell',['content' => $data])
                        </td>
                    </tr>

                    <tr>
                        <td width="100%" style="height: 20px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td width="100%">
                            @php
                                $data = 'Thanks for uploading your track on Jeeni. Excellent!'
                            @endphp
                            @include('email-template.partials.table-cell',['content' => $data])
                        </td>
                    </tr>

                    <tr>
                        <td width="100%" style="height: 20px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td width="100%">
                            @include('email-template.partials.table-cell',['content' => 'Jeeni - built with love.'])
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
@endsection
