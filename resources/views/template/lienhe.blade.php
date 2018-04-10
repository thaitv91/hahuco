@extends('layouts.app')

@section('content')
    <!-- main content -->
    <section class="banner-only-img space-global">
        <div class="section-img" style="background-image: url('{{ $page->thumbnail }}')"></div>
    </section>
    
    <section class="contact-us space-global">
        <form id="form-contact" method="POST">
            {{ csrf_field() }}
            <div class="container">
                <h2 class="title text-center">{{ $page->title }}</h2>
                @if (Session::has('success'))
                <div class="row form-group align-items-center alert alert-success">
                    <label class="">{{ Session::get('success') }}</label>
                </div>
                @endif
                <div class="form-group">
                    {!! $page->getContentofField("lienhe-header-text")  !!}
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-5 mb-lg-0 form">
                        <div class="row form-group align-items-center">
                            <label class="col-md-3">Họ và tên</label>
                            <div class="col-md-9">
                                <input name="name" type="text" class="form-control" placeholder="Cho chúng tôi biết tên của bạn?" />
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong style="color: red">{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group align-items-center">
                            <label class="col-md-3">Email <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input name="email" type="email" class="form-control" placeholder="Chúng tôi có thể gửi thư điện tử về địa chỉ nào?" required />
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong style="color: red">{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group align-items-center">
                            <label class="col-md-3">Điện thoại <span style="color: red">*</span></label>
                            <div class="col-md-9">
                                <input name="phone" type="text" class="form-control" placeholder="Chúng tôi sẽ liên lạc trực tiếp với bạn qua số máy nào?" required/>
                                @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong style="color: red">{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group align-items-center">
                            <label class="col-md-3">Nội dung</label>
                            <div class="col-md-9">
                                <textarea name="content" class="form-control" placeholder="Chúng tôi đang lắng nghe những điều bạn chia sẻ..."></textarea>
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

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary text-uppercase">Gửi</button>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="map" id="map" style="height: 298px; width: 100%;">
                        </div>
                        <div class="text">
                            <?php echo $page->content ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- e: main content -->
@endsection

@section('scripts')

    <script type="text/javascript">
        function initialize() {
            initMap();
        }

        function initMap() {
            var uluru = {lat: 21.034413874733524, lng: 105.82743510603905};
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