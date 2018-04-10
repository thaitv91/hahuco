@extends('layouts.app')

@section('content')
    <!-- main content -->
    <section class="section-img banner-networks space-global">
        <div class="container text-center">
            <h1>Chúng tôi luôn ở gần bạn để trợ giúp</h1>
            <ul class="list-unstyled">
                <li><span class="btn-vbi text-uppercase">ưu thế 1 của mạng lưới</span></li>
                <li><span class="btn-vbi text-uppercase">ưu thế 2 của mạng lưới</span></li>
                <li><span class="btn-vbi text-uppercase">ưu thế 3 của mạng lưới</span></li>
                <li><span class="btn-vbi btn-pink text-uppercase">Hotline: <strong>190088888</strong></span></li>
            </ul>
        </div>
    </section>

    <section class="networks space-global">
        <div class="container">
            <h2 class="title text-center">Mạng lưới hoạt động của Bảo hiểm VietinBank</h2>
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control"  id="select-region">
                                    @if(count($data_mien)!=0)
                                        <option value="">Chọn vùng/miền</option>
                                        @foreach($data_mien as $db_mien)
                                            <option value="{{$db_mien->id}}" data-tokens="{{$db_mien->name}}" >{{$db_mien->name }} </option>
                                        @endforeach
                                    @endif
                                    @if(count($data_mien)==0)
                                        <option value=""><em>(Không có dữ liệu)</em></option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" id="select-city">
                                    <option value="">Chọn tỉnh/thành phố</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" id="select-district">
                                    <option value="">Chọn quận/huyện</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <ul class="list-unstyled d-flex flex-wrap list-tab justify-content-center">
                        <li class="form-group active">
                            <input _token="{{ csrf_token() }}" class="filter-data" type="radio" name="data" value="all" id="data1" checked>
                            <label for="data1" class="btn-vbi btn-gray md fz-16">Tất cả</label>
                        </li>
                        <li class="form-group">
                            <input _token="{{ csrf_token() }}" class="filter-data" type="radio" name="data" value="chinhanh" id="data2">
                            <label for="data2" class="btn-vbi btn-gray md fz-16">Chi nhánh</label>
                        </li>
                        <li class="form-group">
                            <input _token="{{ csrf_token() }}" class="filter-data" type="radio" name="data" value="giaodich" id="data3">
                            <label for="data3" class="btn-vbi btn-gray md fz-16">Điểm giao dịch</label>
                        </li>
                        <li class="form-group">
                            <input _token="{{ csrf_token() }}" class="filter-data" type="radio" name="data" value="gara" id="data4">
                            <label for="data4" class="btn-vbi btn-gray md fz-16">Danh sách Gara</label>
                        </li>
                        <li class="form-group">
                            <input _token="{{ csrf_token() }}" class="filter-data" type="radio" name="data" value="benhvien" id="data5">
                            <label for="data5" class="btn-vbi btn-gray md fz-16">Danh sách bệnh viện</label>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="list-office mCustomScrollbar">
                        <ul class="list-unstyled">
                            @if(count($data_network)==0)
                                Không có dữ liệu nào!!!
                            @else
                                @foreach($data_network as $key => $list_network)
                                    <li>
                                        <p>Tên: {{ $list_network->name}}</p>
                                        <p>Địa chỉ: {{ $list_network->address}}</p>
                                        <p>Điện thoại: {{ $list_network->phone}}</p>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div><!-- /.list-office -->
                </div>
                <div class="col-lg-8" id="map">
                </div>
            </div>
        </div>
    </section><!-- /.networks -->
    <!-- e: main content -->
@endsection

@section('scripts')
    <script type="text/javascript">

    function initMap(locations, data_lat, data_long) {
        var uluru = { lat: data_lat, lng: data_long };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: uluru,
        });

        var marker, i;
        for (i = 0; i < locations.length; i++) {
             var pinImage = new google.maps.MarkerImage("http://" + window.location.host + ''+locations[i][3]+'',
                    new google.maps.Size(20, 20),
                    new google.maps.Point(0, 0),
                    new google.maps.Point(20, 20));

                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        icon: pinImage,
                    });

                    var infowindow = new google.maps.InfoWindow({
                        content: locations[i][0],
                    });
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                              infowindow.setContent(locations[i][0]);
                              infowindow.open(map, marker);
                            }
                    })(marker, i));

        }
    }

    function initialize() {
        var data_lat = {{ $lat }};
        var data_long = {{ $long }};
        var locations = <?php print_r($data_maker); ?>;
        initMap(locations, data_lat, data_long);
    }
    var map;
    var infowindow;

    $('#select-region').on('change', function() {
        var region_id = $( "#select-region" ).val();
        var _token = $(this).attr('_token');
        $.ajax({
            // dataType: 'html',
            type: 'GET',
            url: '{{ route("user.network.changeRegion") }}',
            data: {region_id: region_id, _token: _token},

            success: function (res) {
                var html;
                var data_maker = res.markers;
                var lat = res.lat;
                var long = res.long
                html += '<option value="">Chọn tỉnh/thành phố</option>';
                $.each(res.data_city, function(index, value) {

                  html += '<option value="'+value.id+'" data-tokens="'+value.name+'">'+value.name+' </option>';
                });
                window.locations = data_maker;
                window.data_lat = parseFloat(lat);
                window.data_long = parseFloat(long);
                // console.log(locations);
                window.initMap(locations, data_lat , data_long);
                $('#select-city').empty();
                $('#select-city').append(html);


            }
        });
    });


    $('#select-city').on('change', function() {
            var city_id = $( "#select-city" ).val();
            console.log(city_id);
            var _token = $(this).attr('_token');
            $.ajax({
                type: 'GET',
                url: '{{ route("user.network.changeCity") }}',
                data: {city_id: city_id, _token: _token},

                success: function (res) {
                    var html;
                    var data_maker = res.markers;
                    var lat = res.lat;
                    var long = res.long
                    console.log(res.data_district);
                    html += '<option value="">Chọn quận/huyện</option>';
                    $.each(res.data_district, function(index, value) {
                        html += '<option value="'+value.id+'" data-tokens="'+value.name+'">'+value.name+' </option>';
                    });
                    window.locations = data_maker;   
                    window.data_lat = parseFloat(lat);   
                    window.data_long = parseFloat(long);
                    // console.log(locations);
                    window.initMap(locations, data_lat , data_long);
                    $('#select-district').empty();
                    $('#select-district').append(html);
                }
            });
        });

    $('#select-district').on('change', function() {
            var district_id = $( "#select-district" ).val();
            var _token = $(this).attr('_token');
            $.ajax({
                type: 'GET',
                url: '{{ route("user.network.changeDistrict") }}',
                data: {district_id: district_id, _token: _token},

                success: function (res) {
                    var data_maker = res.markers;
                    var lat = res.lat;
                    var long = res.long
                    window.locations = data_maker;   
                    window.data_lat = parseFloat(lat);   
                    window.data_long = parseFloat(long);
                    console.log(locations);
                    window.initMap(locations, data_lat , data_long);
                }
            });
        });

    $('.filter-data').click(function () {
        var type = $(this).val();
        var _token = $(this).attr('_token');
        var region_id = $( "#select-region" ).val();
        var city_id = $( "#select-city" ).val();
        var district_id = $( "#select-district" ).val();

        $.ajax({
            type: 'POST',
            url: '{{ route('user.network.changeButton') }}',
            data: {type: type, _token: _token, region_id: region_id, city_id: city_id, district_id: district_id},

            success: function (res) {
                var data_maker = res.markers;
                var lat = res.lat;
                var long = res.long
                window.locations = data_maker;
                window.data_lat = parseFloat(lat);
                window.data_long = parseFloat(long);
                console.log(locations);
                window.initMap(locations, data_lat , data_long);
            }
        });
    });

</script>

@endsection