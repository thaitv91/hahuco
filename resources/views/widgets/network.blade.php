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
                        <input _token="{{ csrf_token() }}" class="filter-data" type="radio" name="data" value="all" id="data1" @if($config['type'] == 'all') checked @endif>
                        <label for="data1" class="btn-vbi btn-gray md fz-16">Tất cả</label>
                    </li>
                    <li class="form-group">
                        <input _token="{{ csrf_token() }}" class="filter-data" type="radio" name="data" value="chinhanh" id="data2" @if($config['type'] == 'chinhanh') checked @endif>
                        <label for="data2" class="btn-vbi btn-gray md fz-16">Công ty thành viên</label>
                    </li>
                    <li class="form-group">
                        <input _token="{{ csrf_token() }}" class="filter-data" type="radio" name="data" value="chinhanh" id="data3" @if($config['type'] == 'giaodich') checked @endif >
                        <label for="data3" class="btn-vbi btn-gray md fz-16">Điểm giao dịch</label>
                    </li>
                    <li class="form-group">
                        <input _token="{{ csrf_token() }}" class="filter-data" type="radio" name="data" value="benhvien" id="data5" @if($config['type'] == 'benhvien') checked @endif>
                        <label for="data5" class="btn-vbi btn-gray md fz-16">Danh sách bệnh viện bảo lãnh</label>
                    </li>
                    <li class="form-group">
                        <input _token="{{ csrf_token() }}" class="filter-data" type="radio" name="data" value="gara" id="data4" @if($config['type'] == 'gara') checked @endif>
                        <label for="data4" class="btn-vbi btn-gray md fz-16">Danh sách Gara bảo lãnh</label>
                    </li>
                </ul>
            </div>
        </div>

        <div class="plane-content" id="all">
            <h4>Bảo hiểm VietinBank - Trụ sở chính</h4>
            <p>Tầng 10-11, tòa nhà 126 Đội Cấn, Ba Đình, Hà Nội | Tel: 024 3211 5140</p>
        </div><!-- /.plane-content -->

        <div class="plane-content" id="chinhanh">
            <p>Bảo hiểm VietinBank có hơn 26 Công ty thành viên trải dài trên khắp mọi miền tổ quốc và các phòng giao dịch trong hệ thống Ngân hàng VietinBank</p>
        </div><!-- /.plane-content -->

        <div class="plane-content" id="giaodich">
            <p>Bảo hiểm VietinBank có hơn 26 Công ty thành viên trải dài trên khắp mọi miền tổ quốc và các phòng giao dịch trong hệ thống Ngân hàng VietinBank</p>
        </div><!-- /.plane-content -->

        <div class="plane-content" id="benhvien">
            <h4>Lưu ý</h4>
            <p>+ Phạm vi bảo lãnh nội trú/ngoại trú chỉ áp dụng cho các khách hàng có quyền lợi bảo lãnh được ghi rõ trên Giấy chứng nhận Bảo hiểm Sức khỏe VBI Care.</p>
            <p>+ Các bệnh viện không hỗ trợ bảo lãnh viện phí vào các ngày nghỉ, ngày Lễ/Tết và các trường hợp nhập viện do tai nạn.</p>
        </div><!-- /.plane-content -->

        <div class="plane-content" id="gara">
            <p>Danh sách Garage được cập nhật liên tục trong hệ thống bảo lãnh của Bảo hiểm VietinBank</p>
        </div><!-- /.plane-content -->

        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="list-office mCustomScrollbar">
                    <ul id="list-detail" class="list-unstyled">
                        @if(count($data_network)==0)
                        Không có dữ liệu nào!!!
                        @else
                        @foreach($data_network as $key => $list_network)
                        <li onclick="detailLocal({{ $list_network->lat }}, {{ $list_network->long }})">
                            <p>Tên: {{ $list_network->name}}</p>
                            <p>Địa chỉ: {{ $list_network->address}}</p>
                            <p>Điện thoại: {{ $list_network->phone}}</p>
                            <input type="hidden" name="lat" class="lat_id" value="{{ $list_network->lat }}">
                            <input type="hidden" name="long" class="long_id" value="{{ $list_network->long }}">
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div><!-- /.list-office -->
            </div>
            <div class="col-lg-8" >
                <div class="box-directtion bg-white" id="google-derection" style="display: none;">
                        <div class="row">
                            <div class="col-2">
                                <button class="btn-vbi btn-light-blue sm btn-block" id="btnMylocation"><i class="fa fa-plus" ></i></button>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" id="origin-input" placeholder="Từ"/>
                                <input type="hidden" id="cityLat" name="cityLat" type="text"/>  
                                <input type="hidden" id="cityLng" name="cityLng" type="text"/>  
                            </div>
                            <div class="col-3">
                                <input type="text" id="destination-input" class="form-control" placeholder="Đến"/>
                                
                                <input type="hidden"  id="location_lat" name="location_lat" type="text" />  
                                <input type="hidden"  id="location_long" name="location_long" type="text" />
                            </div>
                            <div class="col-4">
                                <button class="btn-vbi btn-pink sm btn-block" id ="btnSubmit">Tìm đường</button>
                            </div>
                        </div>
                    </div>
                <div id="map"></div>
            </div>
        </div>
    </div>
</section><!-- /.networks -->

@section('scripts')
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
    var map;
    var markers = [];
      // Removes the markers from the map, but keeps them in the array.
    function initMap(locations, data_lat, data_long) {
        var uluru = { lat: data_lat, lng: data_long };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: uluru,
        });

        google.maps.event.addListener(map,'click',function(event) {                  
            var  pos = ''+event.latLng.lat()+', '+event.latLng.lng()+'';
            setMapOnAll(null);
            marker = new google.maps.Marker({position: event.latLng, map: map});
            markers.push(marker);
            document.getElementById('cityLat').value = event.latLng.lat();
            document.getElementById('cityLng').value = event.latLng.lng();
            var geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
            geocoder.geocode({latLng: latlng}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                  if (results[1]) {
                    var arrAddress = results;
                    $.each(arrAddress, function(i, address_component) {
                      if (address_component.types[0] == "street_address" || address_component.types[0] == "route") { 
                        document.getElementById('origin-input').value = address_component.formatted_address;
                      }
                    });
                  } else {
                    alert("No results found");
                  }
                } else {
                  alert("Geocoder failed due to: " + status);
                }
            });      
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

            google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                return function() {
                  infowindow.setContent(locations[i][0]);
                  infowindow.open(map, marker);
                }
            })(marker, i));

            google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
                    return function() {
                      infowindow.close();
                    }
            })(marker, i));

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    var latLong = ''+locations[i][1]+', '+locations[i][2]+''
                    document.getElementById("google-derection").style.display = "block";
                    document.getElementById('destination-input').value = locations[i][4 ];
                    document.getElementById('location_lat').value = locations[i][1];;
                    document.getElementById('location_long').value = locations[i][2];;
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

    function setMapOnAll(map) {
        console.log(markers.length);
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
    }

    function detailLocal(lat, long) {
        document.getElementById("google-derection").style.display = "none";
        document.getElementById('origin-input').value = "";
        $.ajax({
            type: 'GET',
            url: '/changeButton/detail-local',
            data: {lat: lat, long: long},

            success: function (res) {
                var data_maker = res.markers;
                var lat = res.lat;
                var long = res.long
                window.locations = data_maker;
                window.data_lat = parseFloat(lat);
                window.data_long = parseFloat(long);
                window.initMap(locations, data_lat , data_long);
            }
        });
    }
    
    function detailList(makers) {
        var  html = '';
        $.each(makers, function (key, value) {
            html +=  '<li onclick="detailLocal('+value[1]+', '+ value[2] +')"><p>Tên: ' + value[4] + '</p> <p>Địa chỉ: ' + value[5] + '</p> <p>Điện thoại: ' + value[6] + '</p><input type="hidden" name="lat" class="lat_id" value="'+ value[1] +'"><input type="hidden" name="long" class="long_id" value="'+value[2]+'"></li>';
        });
        $('#list-detail').html(html);
    }  

    function data_derection(directionsService, location_lat_lng, location_start) {   

        directionsDisplay = new google.maps.DirectionsRenderer();
        var myOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP,
        }
        map = new google.maps.Map(document.getElementById("map"), myOptions);
        directionsDisplay.setMap(map);
        var start = location_start;
        var end = location_lat_lng;
        var request = {
          origin:start, 
          destination:end,
          travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
              directionsDisplay.setDirections(response);
            }
        });
    }   

    function getLatLng() {
        var input = document.getElementById('origin-input');
        var options = {
          componentRestrictions: {country: "vn"}
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('cityLat').value = place.geometry.location.lat();
            document.getElementById('cityLng').value = place.geometry.location.lng();
        });
    }


    jQuery(document).ready(function($) {

        $('#select-region').on('change', function() {
            document.getElementById("google-derection").style.display = "none";
            document.getElementById('origin-input').value = "";
            var region_id = $( "#select-region" ).val();
            var _token = $(this).attr('_token');
            var type = $('input[name="data"]:checked').val();
            $.ajax({
                type: 'GET',
                url: '{{ route("user.network.changeRegion") }}',
                data: {region_id: region_id, type: type, _token: _token},

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
                    window.initMap(locations, data_lat , data_long);
                    $('#select-city').empty();
                    $('#select-city').append(html);

                    detailList(data_maker);
                }
            });
        });

        $('#select-city').on('change', function() {
                document.getElementById("google-derection").style.display = "none";
                document.getElementById('origin-input').value = "";
                var city_id = $( "#select-city" ).val();
                var _token = $(this).attr('_token');
                var type = $('input[name="data"]:checked').val();
                $.ajax({
                    type: 'GET',
                    url: '{{ route("user.network.changeCity") }}',
                    data: {city_id: city_id, type: type, _token: _token},

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
                        window.initMap(locations, data_lat , data_long);
                        $('#select-district').empty();
                        $('#select-district').append(html);

                        detailList(data_maker);
                    }
                });
            });

        $('#select-district').on('change', function() {
            document.getElementById("google-derection").style.display = "none";
            document.getElementById('origin-input').value = ""
            var district_id = $( "#select-district" ).val();
            var _token = $(this).attr('_token');
            var type = $('input[name="data"]:checked').val();
            $.ajax({
                type: 'GET',
                url: '{{ route("user.network.changeDistrict") }}',
                data: {district_id: district_id, type: type, _token: _token},

                success: function (res) {
                    var data_maker = res.markers;
                    var lat = res.lat;
                    var long = res.long
                    window.locations = data_maker;   
                    window.data_lat = parseFloat(lat);   
                    window.data_long = parseFloat(long);
                    window.initMap(locations, data_lat , data_long);

                    detailList(data_maker);
                }
            });

            
        });

        $('.list-tab li').click(function(){
            // show note maps
            $('.plane-content').hide();
            var type = $(this).find('input').val();
            $('#'+type).show();
        });

        if ($('.list-tab li').find('input:checked')){
            $('.plane-content').hide();
            var type = $(this).find('input:checked').val();
            $('#'+type).show();
        }

        $('.filter-data').click(function () {
            document.getElementById("google-derection").style.display = "none";
            document.getElementById('origin-input').value = "";
            var type = $(this).val();
            var _token = $(this).attr('_token');
            var region_id = $( "#select-region" ).val();
            var city_id = $( "#select-city" ).val();
            var district_id = $( "#select-district" ).val();

            $.ajax({
                type: 'GET',
                url: '/changeButton/filter-button',
                data: {type: type, _token: _token, region_id: region_id, city_id: city_id, district_id: district_id},

                success: function (res) {
                    var data_maker = res.markers;
                    var lat = res.lat;
                    var long = res.long
                    window.locations = data_maker;
                    window.data_lat = parseFloat(lat);
                    window.data_long = parseFloat(long);
                    window.initMap(locations, data_lat , data_long);
                    detailList(data_maker);
                }
            });
        });

        var directionDisplay;
        var directionsService = new google.maps.DirectionsService();
        var map;
        
        google.maps.event.addDomListener(window, 'load', getLatLng); 
        
        $("#btnMylocation").click(function(){
          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {      
                var  pos = ''+position.coords.latitude+', '+position.coords.longitude+'';
                document.getElementById('cityLat').value = position.coords.latitude;
                document.getElementById('cityLng').value = position.coords.longitude;

                var geocoder = new google.maps.Geocoder();
                var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    geocoder.geocode({latLng: latlng}, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                          if (results[1]) {
                            var arrAddress = results;
                            $.each(arrAddress, function(i, address_component) {
                              if (address_component.types[0] == "street_address") {
                                document.getElementById('origin-input').value = address_component.formatted_address;
                              }
                            });
                          } else {
                            alert("No results found");
                          }
                        } else {
                          alert("Geocoder failed due to: " + status);
                        }
                      });

              });
          } else {
              alert("Can't Find");
          }
             
        }); 

        $("#btnSubmit").click(function(){
          var location_lat_lng = ''+$( "#location_lat" ).val()+', '+$( "#location_long" ).val()+'';
          var location_start = ''+$( "#cityLat" ).val()+', '+$( "#cityLng" ).val()+'';
          data_derection(directionsService,location_lat_lng, location_start);
        });  
    });
</script>
@endsection