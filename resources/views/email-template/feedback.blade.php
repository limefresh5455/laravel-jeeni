@extends('email-template.master')

@section('subject') Support request received @endsection


@section('content')
<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#323230;width:100%;" width="100%">
    <tbody>
        <tr>
            <td align="left" style="padding:10px 25px;word-break:break-word;">
                @include('email-template.partials.table-cell',[
                    'content' => 'Hi Admin, <br> New feedback/comment has received, please find the details below.'
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
                            @include('email-template.partials.table-cell',['content' => $user->getFullName()])
                        </td>
                    </tr>
                    @foreach($data as $key => $value)
                        <tr><td colspan="2" style="height: 20px;"></td></tr>
                        <tr>
                            <td width="50%">
                                @include('email-template.partials.table-cell',['content' => $mapping[$key].' : '])
                            </td>
                            <td width="50%">
                                @php $finalData = (is_array($value)) ? implode('<br/>',$value) : $value @endphp
                                @include('email-template.partials.table-cell',['content' => $finalData])
                            </td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
    </tbody>
</table>
@endsection
