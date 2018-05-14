<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @if(isset($title))
            {{ $title }}
        @else
            Admin - Backend Manger
        @endif
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.css">
    <link rel="stylesheet" type="text/css" href="{{url('css/multi-select/bootstrap-select.css')}}">
    <link href="{{url('css/toastr.min.css')}}" rel="stylesheet"/>
    <link href="{{url('css/adminStyle.css')}}" rel="stylesheet"/>
    <link href="{{url('css/bootstrap-toggle.min.css')}}" rel="stylesheet"/>
    <link href="{{url('css/bootstrap-tagsinput.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{url('css/bootstrap-datepicker3.css')}}"/>
    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="/dist/css/skins/skin-blue.min.css">
    @yield('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">VietTinBank</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">HEADER</li>
                <li class="">
                    <a href="{{ route('admin.user') }} ">
                        <i class="fa fa-user"></i>
                        <span>@lang('admin/sidebar.user')</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-cubes"></i> <span>@lang('admin/sidebar.product')</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.product') }}"> @lang('admin/sidebar.manager')</a></li>
                        <li><a href="{{ route('admin.product.create') }}"> @lang('admin/sidebar.new')</a></li>
                        <li><a href="{{ route('admin.product.category') }}"> @lang('admin/sidebar.category')</a></li>
                        <li><a href="{{ route('admin.product.term') }}"> @lang('admin/sidebar.term')</a></li>
                    </ul>
                </li>

                <li class="">
                    <a href="/admin/configure/edit/1">
                        <i class="fa fa-cogs"></i>
                        <span>@lang('admin/sidebar.configure')</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-alt"></i>
                        <span>@lang('admin/sidebar.page_manager')</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.template.index') }}"> @lang('admin/sidebar.template')</a></li>
                        <li><a href="{{ route('admin.templateField.index') }}"> @lang('admin/sidebar.template_field')</a></li>
                        <li><a href="{{ route('admin.pageCategory.index') }} ">@lang('admin/sidebar.page_category')</a></li>
                        <li><a href="{{ route('admin.pages.index') }} ">@lang('admin/sidebar.page')</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="far fa-address-book"></i>
                        <span>@lang('admin/sidebar.partner')</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.partner') }}"> @lang('admin/sidebar.manager')</a></li>
                        <li><a href="{{ route('admin.partner.create') }}"> @lang('admin/sidebar.new')</a></li>
                        <li><a href="{{ route('admin.partner.reorder') }}"> @lang('admin/sidebar.reorder')</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-info-circle"></i>
                        <span>@lang('admin/sidebar.news')</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.news') }}"> @lang('admin/sidebar.manager')</a></li>
                        <li><a href="{{ route('admin.news.create') }}"> @lang('admin/sidebar.new')</a></li>
                        <li><a href="{{ route('admin.news.category') }}"> @lang('admin/sidebar.category')</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-legal"></i>
                        <span>@lang('admin/sidebar.testimonial')</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.testimonial') }}"> @lang('admin/sidebar.manager')</a></li>
                        <li><a href="{{ route('admin.testimonial.create') }}"> @lang('admin/sidebar.new')</a></li>
                    </ul>
                </li>

                <li class="">
                    <a href="{{ route('admin.dichvu') }} ">
                        <i class="fa fa-reorder"></i><span>Dịch vụ</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i> 
                        <span>@lang('admin/sidebar.network')</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.network.index') }}"> @lang('admin/sidebar.manager')</a></li>
                        <li><a href="{{ route('admin.region.index') }}"> @lang('admin/sidebar.region')</a></li>
                        <li><a href="{{ route('admin.city.index') }}"> @lang('admin/sidebar.province')</a></li>
                        <li><a href="{{ route('admin.district.index') }}"> @lang('admin/sidebar.district')</a></li>
                    </ul>
                </li>

                <li class="">
                    <a href="{{ route('menu_manager') }} ">
                        <i class="fa fa-reorder"></i><span>@lang('admin/sidebar.menu_manager')</span>
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('admin.video.index') }} ">
                        <i class="fa fa-youtube" aria-hidden="true"></i><span>Video</span>
                    </a>
                </li>

                {{--<li class="">--}}
                    {{--<a href="{{ route('admin.award') }}">--}}
                        {{--<i class="fa fa-photo"></i><span>@lang('admin/sidebar.award')</span>--}}
                    {{--</a>--}}
                {{--</li>--}}

                <li class="">
                    <a href="{{ route('admin.slider') }}">
                        <i class="fa fa-photo"></i><span>@lang('admin/sidebar.slider')</span>
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('admin.contact') }}">
                        <i class="fa fa-photo"></i><span>@lang('admin/sidebar.contact')</span>
                    </a>
                </li>

                {{--<li class="">--}}
                    {{--<a href="{{ route('admin.email_registration') }}">--}}
                        {{--<i class="fa fa-link"></i><span>@lang('admin/sidebar.email_registration')</span>--}}
                    {{--</a>--}}
                {{--</li>--}}

                <li class="">
                    <a href="{{ route('admin.recruitment.resume.index') }} ">
                        <i class="fa fa-link"></i><span>@lang('admin/sidebar.resume')</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i> 
                        <span>@lang('admin/sidebar.recruitment')</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.recruitment.index') }}"> @lang('admin/sidebar.manager')</a></li>
                        <li><a href="{{ route('admin.recruitment.create') }}"> @lang('admin/sidebar.new')</a></li>
                        <li><a href="{{ route('admin.recruitment.job.index') }} "> @lang('admin/sidebar.job')</a></li>
                        <li><a href="{{ route('admin.recruitment.place.index') }} "> @lang('admin/sidebar.place')</a></li>
                        <li><a href="{{ route('admin.recruitment.profile.index') }} "> @lang('admin/sidebar.profile')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{url('logout')}}">@lang('admin/sidebar.logout')</a>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                @yield('content')
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    <!-- Modal delete-->
    <div id="modal-delete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">@lang('admin/general.confirm_delete')</h4>
                </div>
                <div class="modal-body">
                <p>@lang('admin/general.are_you_sure')</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin/general.close')</button>
                    <a href="" id="link-delete"  class="btn btn-danger" >@lang('admin/general.remove')</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/app.min.js"></script>
<script src="{{asset('build/js/custom.min.js')}}"></script>
<script src="{{url('js/multi-select/bootstrap-select.js')}}" type="text/javascript"></script>
<script src="{{ url('js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript" src="{{url('js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
{{-- <script src="http://maps.googleapis.com/maps/api/js?libraries=places" type="text/javascript"></script> --}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAABstmYZWOOycZj4yBeJu23RV8z_hIV3c&libraries=places"></script>
<script type="text/javascript" src="/js/highcharts/highcharts.js"></script>
<script type="text/javascript" src="/js/highcharts/exporting.js"></script>
<script type="text/javascript" src="/js/highcharts/Chart.min.js"></script>
<script type="text/javascript" src="/js/highcharts/map.js"></script>
<script type="text/javascript" src="/js/highcharts/world.js"></script>
<script type="text/javascript" src="/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-tagsinput.js"></script>
<script type='text/javascript' src='{{ url('js/highcharts/loader.js') }}'></script>
<script src="/packages/menu-manager/js/jquery-sortable-lists.js"></script>
<script>
    @if ( Session::has('success'))
    toastr.success('{{ session('success')}}');
    @endif
    @if ( Session::has('error'))
    toastr.error('{{ session('error')}}');
    @endif
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.table').DataTable();

    $('form').on('submit', function() {
        var btn_submit = $(this).find(':submit').attr('disabled', true);
    });

    tinymce.init({
        selector: 'textarea.my-editor',
        menubar: false,
        paste_data_images: true,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste',
            'table'
        ],

        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | table',
        content_css: [
            // '//fonts.googleapis.com/css?family=Arial',
            // '//www.tinymce.com/css/codepen.min.css'
        ],
        setup : function(ed)
        {
            ed.on('init', function (ed) {
                // ed.target.editorCommands.execCommand("fontName", false, "Arial");
                // $('form *:input[type!=hidden]:first').focus();
            });
        },
        // without images_upload_url set, Upload tab won't show up
        images_upload_url: '/upload.php',

        // override default upload handler to simulate successful upload
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '/upload.php');

            xhr.onload = function() {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                var data = "{{ env('APP_URL', 'http://hahuco.childtolife.com') }}" + '/' + json.location;
                success(data);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
    });

    // Preview Image
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#'+id).attr('src', e.target.result);
                $('#'+id).css('display', 'block');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    //Model delete
    function removeItem(url) {
        $('#modal-delete a').attr('href',url);
        $('#modal-delete').modal('show');
    }
    $(window).load(function() {
        $('form *:input[type!=hidden]:first').focus();
    });

    $('form').bind("keypress", function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });
</script>
@yield('scripts')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<input name="image" type="file" id="upload" class="hidden" onchange="">
</body>

</html>
