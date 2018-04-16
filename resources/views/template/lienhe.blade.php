@extends('layouts.frontend')

@section('content')
    <div class="breadcrumb-ov">
        <div class="container">
            {{ Breadcrumbs::render('page', $page) }}
        </div>
    </div><!-- /.breadcrumb-ov -->
    <section class="container">
        <div class="contact-us">
            <div class="desc">
                Cảm ơn bạn đã quan tâm đến Hahuco! Vui lòng liên hệ với chúng tôi theo một trong các cách sau đây.
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="form">
                        <form id="form-contact" method="POST">
                            {{ csrf_field() }}
                                @if (Session::has('success'))
                                    <div class="form-group alert alert-success">
                                        <label class="">{{ Session::get('success') }}</label>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" placeholder="Họ tên" />
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong style="color: red">{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Email" required />
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong style="color: red">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input name="phone" type="text" class="form-control" placeholder="Điện thoại" required/>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong style="color: red">{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <textarea name="content" class="form-control" placeholder="Nội dung"></textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <strong style="color: red">{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <p>(<span style="color: red">*</span>) trường thông tin bắt buộc</p>
                                </div>

                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
                                </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 d-none d-lg-block">
                    <img src="/hahuco/images/upload/contact.jpg" alt=""/>
                </div>
        </div><!-- /.contact-us -->
        
        

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