@extends('layouts.app')

@section('content')
    <!-- main content -->
    <section class="banner-only-img space-global">
        <div class="section-img" style="background-image: url('images/upload/banner-contact.jpg')"></div>
    </section>

    <section class="contact-us space-global">
        <div class="container">
            <h2 class="title text-center">Liên hệ</h2>
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0 form">
                    <div class="row form-group align-items-center">
                        <label class="col-md-3">Họ và tên</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control"/>
                        </div>
                    </div>

                    <div class="row form-group align-items-center">
                        <label class="col-md-3">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control"/>
                        </div>
                    </div>

                    <div class="row form-group align-items-center">
                        <label class="col-md-3">Điện thoại</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control"/>
                        </div>
                    </div>

                    <div class="row form-group align-items-center">
                        <label class="col-md-3">Nội dung</label>
                        <div class="col-md-9">
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="text-right">
                        <button class="btn btn-primary text-uppercase">Gửi</button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="map" id="map" style="height: 298px; width: 100%;">
                    </div>
                    <div class="text">
                        <h4>TRỤ SỞ CHÍNH TỔNG CÔNG TY BẢO HIỂM VIETINBANK</h4>
                        <p>
                            Địa chỉ: 108 Trần Hưng Đạo, quận Hoàn Kiếm, TP. Hà Nội, Việt Nam<br/>
                            Điện thoại: 1900 558 868/ 024 3941 8868<br/>
                            Fax: 024 3942 1032
                        </p>
                        <p>
                            Đường dây nóng tiếp quỹ ATM hết tiền<br/>
                            Điện thoại: 1900 558 868 / 024 3941 8868<br/>
                            Email: <a href="#">contact@vietinbank.vn</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
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