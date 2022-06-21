@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' Send Custom Emails')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-edit"></i> {{ 'Send Custom Emails' }}
        </h1>
    </div>
@stop
@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="form-group col-md-12 email-template-parent">
                            <label class="control-label" for="ddlEmailTemplate">Select Email Template</label>
                            <select id="ddlEmailTemplate" class="form-control ddl-jeeni">
                                <option value="">Select Template</option>
                                @foreach($emailList as $email)
                                    <option value="{{ $email['id'] }}">{{ $email['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label" for="ddlUserType">Select User Type</label>
                            <select id="ddlUserType" class="form-control ddl-jeeni">
                                <option value="all">All Users</option>
                                <option value="artist">All Artists</option>
                                <option value="viewer">All Viewers</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <button id="sendEmails"
                                    data-url="{{ route('voyager.sendmail.schedule-emails') }}"
                                    type="button" class="btn btn-primary">SEND</button>
                        </div>
                    </div>
                </div>
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTableEmailTemplates" class="table table-hover">
                                <thead>
                                    <th class="nosort">
                                        <input type="checkbox" class="select_all">
                                    </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        let getUserLink = '{{ route('voyager.sendmail.browse.users') }}';
        let dataTableEmailTemplates;
        $(document).ready(function () {
            $('#ddlEmailTemplate').select2();
            dataTableEmailTemplates = $('#dataTableEmailTemplates').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: getUserLink,
                    method: 'POST'
                },
                columnDefs: [ {"targets": 'nosort',"orderable": false}],
                columns: [
                    {"data":"id","name":"id","searchable":false},
                    {"data":"name","name":"name","searchable":false},
                    {"data":"email","name":"email","searchable":false}
                ],
                order : [],
                pageLength: 25,
                initComplete: function () {
                    browseInitComplete(this.api().columns());
                }
            });

            $('#ddlUserType').on('change', function(){
                refreshUsers($(this).val());
            });

            $('#sendEmails').on('click', function (){
                if($('#ddlEmailTemplate').val() === '') {
                    $('.email-template-parent').addClass('has-error');
                    return false
                } else {
                    $('.email-template-parent').removeClass('has-error');
                }
                sendEmails();
            });
        });

        function refreshUsers(type) {
           dataTableEmailTemplates.ajax.url( getUserLink + '?type=' + type ).load();
        }

        function sendEmails() {
            $.ajax({
                url:$('#sendEmails').attr('data-url'),
                type: 'POST',
                dataType: 'json',
                data: {
                    emailTemplateId: $('#ddlEmailTemplate').val(),
                    userType:$('#ddlUserType').val()
                },
                beforeSend: function() {
                    toggleLoader('show');
                },
                success: function (data) {
                    console.log(data);
                    alert(data.message);
                    toggleLoader('hide');
                    //window.location.reload();
                },
                error: function (data) {
                    alert(data.message);
                    toggleLoader('hide');
                }
            });
        }
    </script>
@stop
