@extends('voyager::master')

@section('page_title', __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .permissions-table thead tr th:nth-child(4) {
            display: none;
        }
        .permissions-table tbody tr td:nth-child(4) {
            display: none;
        }
    </style>
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form class="form-edit-add" id="frmRole" role="form"
                          action="@if(isset($dataTypeContent->id)){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->id) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                          method="POST" enctype="multipart/form-data">

                        <!-- PUT Method if we are editing -->
                    @if(isset($dataTypeContent->id))
                        {{ method_field("PUT") }}
                    @endif

                    <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @foreach($dataType->addRows as $row)
                                <div class="form-group">
                                    <label for="name">{{ $row->display_name }}</label>

                                    {!! Voyager::formField($row, $dataType, $dataTypeContent) !!}

                                </div>
                            @endforeach

                            <div class="form-group clearfix">
                                <label for="permission">{{ __('voyager::generic.permissions') }}</label><br>
                                <a href="#" class="permission-select-all radio-link active">{{ __('voyager::generic.select_all') }}</a>
                                <a href="#"  class="permission-deselect-all radio-link">{{ __('voyager::generic.deselect_all') }}</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover dataTable no-footer permissions-table">
                                    <thead>
                                    <tr role="row">
                                        <th class="border-right">Section</th>
                                        <th class="border-right">Page</th>
                                        <th class="text-center">Page visible?</th>
                                        <th class="text-center">Read only?</th>
                                        <th class="text-center">Add</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $role_permissions = (isset($dataTypeContent)) ? $dataTypeContent->permissions->pluck('key')->toArray() : []; ?>
                                    @foreach($permissionTree as $item)
                                        <tr class="parent">
                                            <td>
                                                @if(count($item['children']) > 0)
                                                    <a href="#" class="parent-control" data-id="{{ $item['id'] }}">
                                                        <i class="fas fa-minus-circle"></i></a>
                                                @endif
                                                {{ $item['title'] }}
                                            </td>
                                            <td></td>
                                            @forelse ($item['permission_keys'] as $key)
                                                <td class="text-center">
                                                    <div class="custom-checkbox">
                                                        <input type="checkbox" data-parent="{{ $item['id'] }}" id="permission-{{ $item['id'] }}" name="permissions[]"
                                                               {{ (isset($rolePermissions) && in_array($key, $rolePermissions)) ? 'checked="checked" ' : '' }}
                                                               class="the-permission" value="{{ $key }}">
                                                        <label></label>
                                                    </div>
                                                </td>
                                            @empty
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            @endforelse
                                        </tr>
                                        @forelse ($item['children'] as $children)
                                            <tr class="children children-{{ $item['id'] }}">
                                                <td></td>
                                                <td>{{ $children['title'] }}</td>
                                                @forelse ($children['permission_keys'] as $childKey)
                                                    <td class="text-center">
                                                        <div class="custom-checkbox">
                                                            <input type="checkbox" data-parent="{{ $children['id'] }}" id="permission-{{ $children['id'] }}" name="permissions[]"
                                                                   {{ (isset($rolePermissions) && in_array($childKey, $rolePermissions)) ? 'checked="checked" ' : '' }}
                                                                   class="the-permission" value="{{ $childKey }}">
                                                            <label></label>
                                                        </div>
                                                    </td>
                                                    @if(count($children['permission_keys']) == 1)
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    @endif
                                                @empty
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                @endforelse
                                            </tr>
                                        @empty

                                        @endforelse
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- panel-body -->
                        <div class="panel-footer">
                            <button type="button" class="btn btn-primary submit save">{{ __('voyager::generic.submit') }}</button>
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                          enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        {{ csrf_field() }}
                        <input name="image" id="upload_file" type="file"
                               onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function () {

            $('#frmRole').validate({
                rules: {
                    name:'required',
                    display_name:'required'
                }
            });

            $('.toggleswitch').bootstrapToggle();


            $('.permission-select-all').on('click', function(){
                $('.permissions-table').find("input[type='checkbox']").prop('checked', true);
            });

            $('.permission-deselect-all').on('click', function(){
                $('.permissions-table').find("input[type='checkbox']").prop('checked', false);
                return false;
            });

            $('.custom-checkbox').on('click', function (e) {
                e.preventDefault();
                if($(this).find('input[type="checkbox"]').is(":checked")){
                    $(this).find('input[type="checkbox"]').prop('checked', false);
                } else {
                    $(this).find('input[type="checkbox"]').prop('checked', true);
                }
            });

            $('.submit').unbind('click').click(function() {
                var isvalid = $("#frmRole").valid();
                if (isvalid) {
                    $('#frmRole')[0].submit();
                }
                else {
                    return false;
                }
            });

            $('.permissions-table tbody tr').each(function() {
                $(this).find('td:nth-child(4)').find('.the-permission').prop('checked', true);
            });

        });
    </script>
@stop
