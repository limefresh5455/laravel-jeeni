@extends('email-template.master')

@section('subject') Support request received @endsection


@section('content')
<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#323230;width:100%;" width="100%">
    <tbody>
        <tr>
            <td align="left" style="padding:10px 25px;word-break:break-word;">
                @include('email-template.partials.table-cell',[
                    'content' => 'Hi Admin, <br> New support request has received, please find the details below.'
                ])
            </td>
        </tr>
        <tr>
            <td align="left" style="padding:10px 25px;word-break:break-word;">
                <table width="100%">
                    <tr>
                        <td width="50%">
                            @include('email-template.partials.table-cell',['content' => 'Name : '])
                        </td>
                        <td width="50%">
                            @include('email-template.partials.table-cell',['content' => $data['feedback-name']])
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">
                            @include('email-template.partials.table-cell',['content' => 'Email : '])
                        </td>
                        <td width="50%">
                            @include('email-template.partials.table-cell',['content' => $data['feedback-email']])
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">
                            @include('email-template.partials.table-cell',['content' => 'Type : '])
                        </td>
                        <td width="50%">
                            @include('email-template.partials.table-cell',['content' => $data['feedback-type']])
                        </td>
                    </tr>

                    <tr>
                        <td width="50%">
                            @include('email-template.partials.table-cell',['content' => 'Feedback : '])
                        </td>
                        <td width="50%">
                            @include('email-template.partials.table-cell',['content' => $data['feedback-description']])
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
@endsection
