@extends('layouts.app')

@section('content')
<!-- main content -->
    @if ($page->getContentofField("chamsockhachhang-banner-image"))
        <section class="section-img banner-text mt-header" style="background-image: url('{{ $page->getContentofField('chamsockhachhang-banner-image') }}')">
    @else
        <section class="section-img banner-text mt-header" style="background-image: url('images/excellent-customer-service-skills.jpg')">
    @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4 text-center">
                    <h1 class="text-center">
                        @if ($page->getContentofField("chamsockhachhang-slogan"))
                        {{ $page->getContentofField("chamsockhachhang-slogan") }}
                        @else
                        Chúng tôi lắng nghe để hỗ trợ bạn tốt nhất
                        @endif
                    </h1>

                    <ul class="list-unstyled">
                        @if ($page->getContentofField("chamsockhachhang-slogan-text"))
                        <?php echo $page->getContentofField("chamsockhachhang-slogan-text"); ?>
                        @else
                        <li>Ưu thế 1 của dịch vụ chăm sóc KH</li>
                        <li>Ưu thế 2 của dịch vụ chăm sóc KH</li>
                        <li>Ưu thế 3 của dịch vụ chăm sóc KH</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>

<form id="form-search-certificate" method="GET" action="/tra-cuu/boi-thuong">
    {{ csrf_field() }}
    <section class="testimonials searchtc text-white">
        <div class="container">
            <h2 class="text-center title text-white">Tra cứu giấy chứng nhận điện tử/Hóa đơn điện tử</h2>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="form-group">
                        <select class="form-control" id="select-option-search" name="loai">
                            <option value="GCN">Giấy chứng nhận điện tử</option>
                            <option value="HOADON">Hóa đơn điện tử</option>
                            <option value="BT">Bồi thường</option>
                        </select>
                    </div>
                    <div class="option-1 pane-option">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Số Giấy chứng nhận" name="nd_1" />
                            <p class="note">Ví dụ: 0201160000879)</p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Điện thoai/CMT/Email" name="nd_2" />
                            <p class="note">(Ví dụ: 0973583553/thang2d.vbi@vietinbank.vn)</p>
                        </div>
                    </div>

                    <div class="option-2 pane-option">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Số hóa đơn" name="nd_1" disabled/>
                            <p class="note">Ví dụ: AA</p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Mã số thuế/Điện thoại" name="nd_2" disabled />
                            <p class="note">(Ví dụ: 16E0000001/0113302942)</p>
                        </div>
                    </div>
                    <div class="option-3 pane-option" style="display: none">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Số hóa đơn" name="nd_1" disabled/>
                            <p class="note">Ví dụ: 17120419</p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Điện thoại" name="nd_2" disabled />
                            <p class="note">(Ví dụ: 01234123123)</p>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                        <label>&nbsp;</label>
                        <div class="row">
                          <div class="col-6 col-md-7 col-lg-5 col-xl-4">
                              <div class="captcha">
                                  <span>{!! captcha_img() !!}</span>
                                  <button type="button" class="btn-success btn-refresh"><i class="fa fa-refresh"></i></button>
                              </div>
                          </div>
                          <div class="col-6 col-md-5 col-lg-7 col-xl-8">
                              <input id="captcha" type="text" class="form-control" placeholder="Nhập mã xác nhận" name="captcha">
                              <span class="help-block">
                                <strong style="color: red; display: none;" id="error-captcha"></strong>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary text-uppercase">Tra cứu</button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="result-tc mt-5">
                        <div id="loading" align="text-center" style="display: none;">
                            <img src="/images/upload/loading.gif" alt="img-loading" style="display: block; margin-right : auto; margin-left: auto; width: 45px">
                        </div>
                        <div class="list" id="result">

                        </div>
                    </div><!-- /.result-tc -->
                </div>
            </div>
        </div>
    </section><!-- /.searchtc -->
</form>

    @if ($page->getContentofField("chamsockhachhang-customercarewidget"))
        @widget($page->getContentofField("chamsockhachhang-customercarewidget"))
    @endif

    @if ($page->getContentofField("chamsockhachhang-testimonialwidget"))
        @widget($page->getContentofField("chamsockhachhang-testimonialwidget"), ['section_class' => 'news'])
    @endif

<!-- e: main content -->
@endsection

@section('scripts')
<script type="text/javascript">
    $('#form-search-certificate').on('submit', function(e) {
        e.preventDefault();
        $('#loading').css('display', 'block');
        // setTimeout(function() {displayResult();}, 300);
//        $('.result-tc').append('<h4 class="text-center mt-5">Kết quả tra cứu</h4>');
        displayResult();
    });

    function displayResult() {
        var result_html = $('#result');
        result_html.empty();
        $.ajax({
            url : "/tra-cuu/boi-thuong",
            data : $('#form-search-certificate').serialize()+'&_token='+$("meta[name='csrf-token']").attr('content'),
        }).done(function (data) {
            if (data.type == 'error') {
                var error = data.results;
                $('#error-captcha').css('display', 'block');
                $('#error-captcha').text(error.captcha[0]);
            } 
            else if (data.results.length == 0) {
                result_html.append('<p class="text-center"><b>Không tìm thấy kết quả</b></p>');
            }
            else {
                if (data.type == 'GCN' || data.type == 'HOADON') {
                    var results = data.results;
                    $.each(results, function(index, value) {
//                        so_gcn = value.so_gcn == "null" ? '' : value.so_gcn;
                       var html = '<div class="row"><div class="col-md-4 col-sm-6">' +
                           '<p><b>Số giấy chứng nhận</b>: '+ value.so_gcn +'</p>'+
                           '<p><b>Họ tên</b>: '+value.ho_ten+'</p>'+
                           '<p><b>Ngày sinh</b>: '+value.ngay_sinh+'</p>'+
                           '<p><b>Địa chỉ</b>: '+value.dia_chi+'</p></div><div class="col-md-4 col-sm-6">'+

                            '<p><b>Chứng minh thư</b>: '+value.cmt+'</p>'+
                            '<p><b>Email</b>: '+value.email+'</p>'+
                            '<p><b>Điện thoại</b>: '+value.dien_thoai+'</p>'+
                            '<p><b>Giới tính</b>: '+value.gioi_tinh+'</p></div><div class="col-md-4 col-sm-6">'+

                           '<p><b>Biển xe</b>: '+value.bien_xe+'</p>'+
                           '<p><b>Ngày HL</b>: '+value.ngay_hl+'</p>'+
                           '<p><b>Ngày kiểm tra</b>: '+value.ngay_kt+'</p>'+
                           '<p><b>Loại giấy chứng nhận</b>: '+value.loai_gcn+'</p>'+
                           '<p><b>Trạng thái</b>: '+value.trang_thai+'</p></div></div>';
                        result_html.append(html);
                    });
                } else if (data.type == 'BT') {
                    var results = data.results;
                    $.each(results, function(index, value) {
                        result_html.append('<p><b>Nội dung</b>: '+value.noi_dung+'</p>');
                        result_html.append('<p><b>Ngày XL</b>: '+value.ngay_xl+'</p>');
                        result_html.append('<hr>');
                    });
                        
                }
            }

            $('#loading').css('display', 'none');

            refreshCapcha();
        });
    }

    $(".btn-refresh").click(function(){
        refreshCapcha();
    });

    $('#captcha').on('focus', function() {
        $('#error-captcha').css('display', 'none');
    });

    function refreshCapcha(notification) {
        $.ajax({
            type:'GET',
            url:'/refresh_captcha',
            success:function(data){
                $(".captcha span").html(data.captcha);
                $('#captcha').val('');
            }
        });
    }
</script>
@endsection