@extends('email-template.master')

@section('subject') Support request received @endsection


@section('content')
<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#323230;width:100%;" width="100%">
    <tbody>
        <tr>
            <td align="left" style="padding:10px 25px;word-break:break-word;">
                <table width="100%">
                    @include('email-template.partials.mail-subject',['subject' => 'JEENI SUPPORT HELPDESK'])
                    <tr>
                        <td width="100%">
                            @php
                                $data = 'Thank you for contacting the Jeeni Support Helpdesk. Your enquiry will be dealt with as soon as possible by a real human being, who will reply direct to the email address we have on record for you.'
                            @endphp
                            @include('email-template.partials.table-cell',['content' => $data])
                        </td>
                    </tr>

                    <tr>
                        <td width="100%" style="height: 20px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td width="100%">
                            @include('email-template.partials.table-cell',['content' => 'Team Jeeni'])
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
@endsection
