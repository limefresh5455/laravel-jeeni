@extends('email-template.master')

@section('subject') {{ $template->subject }} @endsection

@section('content')

<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
    <tbody>
        <tr>
            <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                <br /><br /> Hello {{ isset($user) ? $user->name : "Dear" }}
            </td>
        </tr>
        <tr>
            <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                <br /><br /> {!! strip_tags($template->description) !!}
            </td>
        </tr>
    </tbody>
</table>
@endsection
