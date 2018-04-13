@extends('layouts.frontend')

@section('content')
    <section class="container page-inner">
        {{ Breadcrumbs::render('page', $page) }}
        <div class="f_contact">
            <div class="min_wrap">
                <div class="maps_ct">
                    <div class="map" id="map" style="height: 355px; width: 100%;"></div>
                </div><!-- End .maps_ct -->

                <div class="form-ct clearfix">
                    <div class="f2-ct">
                        <div class="top_f2ct">
	                        <?php echo $page->content ?>
                        </div>
                    </div><!-- End .f2-ct -->
                    <div class="f1-ct">
                        <div class="m_iCon">
                            <form id="form-contact" method="POST">
                                {{ csrf_field() }}
                                <div class="container">
                                    @if (Session::has('success'))
                                        <div class="row form-group align-items-center alert alert-success">
                                            <label class="">{{ Session::get('success') }}</label>
                                        </div>
                                    @endif
                                    <div class="row form-group align-items-center">
                                        <div class="col-md-12">
                                            <input name="name" type="text" class="form-control" placeholder="Họ tên" />
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong style="color: red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row form-group align-items-center">
                                        <div class="col-md-12">
                                            <input name="email" type="email" class="form-control" placeholder="Email" required />
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong style="color: red">{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row form-group align-items-center">
                                        <div class="col-md-12">
                                            <input name="phone" type="text" class="form-control" placeholder="Điện thoại" required/>
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                    <strong style="color: red">{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row form-group align-items-center">
                                        <div class="col-md-12">
                                            <textarea name="content" class="form-control" placeholder="Nội dung"></textarea>
                                            @if ($errors->has('content'))
                                                <span class="help-block">
                                                    <strong style="color: red">{{ $errors->first('content') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group align-items-center">
                                        <p>(<span style="color: red">*</span>) trường thông tin bắt buộc</p>
                                    </div>

                                    <div class="text-left">
                                        <button type="submit" class="btn btn-primary text-uppercase">Gửi liên hệ</button>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div><!-- End .m_iCon -->
                    </div><!-- End .f1-ct -->
                </div><!-- End .form-ct -->
            </div><!-- End .min_wrap -->

    </section>
    <!-- e: main content -->
@endsection

@section('scripts')

    <script type="text/javascript">
        function initialize() {
            initMap();
        }

        function initMap() {
            var uluru = {lat: 21.006172, lng: 105.911813};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>

@endsection