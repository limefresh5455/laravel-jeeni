@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' Homepage Configuration')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-edit"></i> {{ 'Homepage Configuration' }}
        </h1>
    </div>
@stop
@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <form id="frmConfiguration" name="frmConfiguration" method="POST"
            action="{{ route('voyager.homepage.save-configuration') }}">
            @csrf
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-bordered">
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Home page Header(Left text)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Header Text</label>
                                <textarea
                                    class="form-control editor"
                                    rows="10"
                                    name="home_page_header_text"
                                    id="home_page_header_text"
                                    placeholder=""
                                >{{ \App\Helpers\HomePageHelper::getConfigurationData('site.home_page_header_text') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-bordered">
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Home page Header(“pick of the day“)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Video Link</label>
                                <input type="text" class="form-control"
                                       name="pick_of_the_day_video_link" placeholder="Video Link"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.pick_of_the_day_video_link') }}">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Video Thumbnail</label>
                                <input type="text" class="form-control"
                                       name="pick_of_the_day_video_thumb" placeholder="Thumbnail Link"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.pick_of_the_day_video_thumb') }}">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Video Subtitle</label>
                                <input type="text" class="form-control"
                                       name="pick_of_the_day_video_sub_title" placeholder="Subtitle"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.pick_of_the_day_video_sub_title') }}">
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-bordered">
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Home page Viewer Video</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Video Link</label>
                                <input type="text" class="form-control"
                                       name="viewer_video_link" placeholder="Viewer Video Link"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.viewer_video_link') }}">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Video Thumbnail</label>
                                <input type="text" class="form-control"
                                       name="viewer_video_thumb" placeholder="Viewer Thumbnail Link"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.viewer_video_thumb') }}">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Video Subtitle</label>
                                <input type="text" class="form-control"
                                       name="viewer_video_sub_title" placeholder="Viewer Video Subtitle"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.viewer_video_sub_title') }}">
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-bordered">
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Home page Artist Video</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Artist Video Link</label>
                                <input type="text" class="form-control"
                                       name="artist_video_link" placeholder="Viewer Video Link"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.artist_video_link') }}">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Artist Video Thumbnail</label>
                                <input type="text" class="form-control"
                                       name="artist_video_thumb" placeholder="Viewer Thumbnail Link"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.artist_video_thumb') }}">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Artist Video Subtitle</label>
                                <input type="text" class="form-control"
                                       name="artist_video_sub_title" placeholder="Artist Video Subtitle"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.artist_video_sub_title') }}">
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-bordered">
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Invest Page Left Video</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Invest Page Left Video Link</label>
                                <input type="text" class="form-control"
                                       name="invest_left_video_link" placeholder="Invest Page Left Video Link"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.invest_left_video_link') }}">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Invest Page Left Video Thumbnail</label>
                                <input type="text" class="form-control"
                                       name="invest_left_video_thumb" placeholder="Invest Page Left Video Thumbnail Link"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.invest_left_video_thumb') }}">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Invest Page Left Video Subtitle</label>
                                <input type="text" class="form-control"
                                       name="invest_left_video_sub_title" placeholder="Invest Page Left Video Subtitle"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.invest_left_video_sub_title') }}">
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-bordered">
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Invest Page Right Video</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Invest Page Right Video Link</label>
                                <input type="text" class="form-control"
                                       name="invest_right_video_link" placeholder="Invest Page Right Video Link"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.invest_right_video_link') }}">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Invest Page Right Video Thumbnail</label>
                                <input type="text" class="form-control"
                                       name="invest_right_video_thumb" placeholder="Invest Page Right Video Thumbnail Link"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.invest_right_video_thumb') }}">
                            </div>
                            <div class="form-group  col-md-12 ">
                                <label class="control-label" for="name">Invest Page Right Video Subtitle</label>
                                <input type="text" class="form-control"
                                       name="invest_right_sub_title" placeholder="Invest Page Right Video Subtitle"
                                       value="{{ \App\Helpers\HomePageHelper::getConfigurationData('site.invest_right_sub_title') }}">
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="form-group  col-md-12 ">
                                <input type="submit" class="btn btn-primary"
                                       name="configuration_save" value="Save">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop

@section('javascript')
    <script src="//cdn.tiny.cloud/1/dpuzetva7tegew6kdf6tjf92lrronejsso2n3mx4k57rq0nu/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.editor',
            menubar: true,
            plugins: 'advcode',
            toolbar: 'code'
        });
        $(document).ready(function () {

        });
    </script>
@stop
