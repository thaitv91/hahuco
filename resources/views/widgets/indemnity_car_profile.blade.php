<section class="bg-v2 profile-indemnify">
    <form id="form-indem-car">
        <div class="container">
            <h2 class="title text-center text-white">Hồ sơ bồi thường xe</h2>
            <div class="steps step-1">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Họ tên người thông báo <span>*</span></label>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Họ và tên người thông báo" name="ho_ten_tb" required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Email người thông báo <span>*</span></label>
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email người thông báo" name="email_tb" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Điện thoại thông báo <span>*</span></label>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Điện thoại thông báo" name="dthoai_tb" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Biển số xe <span>*</span></label>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Biển số xe" name="bien_xe" required/>
                                </div>
                            </div>
                            <div class="text-center col-md-12">
                                <button class="btn btn-primary" onclick="next(2); return false;">Tiếp tục <i class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.step-1 -->

            <div class="steps step-2 hidden-block">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Ngày xảy ra tổn thất <span>*</span></label>
                                <div class="form-group">
                                    <input class="form-control" data-toggle="datepicker" type="text" placeholder="Ngày xảy ra tổn thất" name="ngay_xr" required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Giờ xảy ra tổn thất <span>*</span></label>
                                <div class="form-group">
                                    <input class="form-control" data-toggle="timepicker" type="text" placeholder="Giờ xảy ra tổn thất" name="gio_xr" required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Tỉnh/thành xảy ra <span>*</span></label>
                                <div class="form-group">
                                    <select name="tinh_thanh" class="form-control" id="province">
                                        <option disabled selected>-- Chọn Tỉnh/Thành --</option>
                                        @foreach ($provinces as $province)
                                        <option value="{{ $province->code }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Quận/Huyện <span>*</span></label>
                                <div class="form-group">
                                    <select name="quan_huyen" id="district" class="form-control">
                                        <option disabled selected>-- Vui lòng chọn Tỉnh/Thành --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Địa chỉ xảy ra cụ thể <span>*</span></label>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Địa chỉ xảy ra cụ thể" name="dia_diem" required/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Nguyên nhân tổn thất <span>*</span></label>
                                <div class="form-group">
                                    <textarea class="form-control"  placeholder="Nguyên nhân tổn thất" name="nguyen_nhan" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Hậu quả tổn thất <span>*</span></label>
                                <div class="form-group">
                                    <textarea class="form-control"  placeholder="Hậu quả tổn thất" name="hau_qua" required></textarea>
                                </div>
                            </div>
                            <div class="text-center col-md-12">
                                <button class="btn btn-default" onclick="back(1); return false;"><i class="fa fa-angle-left"></i> Quay lại</button>
                                <button class="btn btn-primary" onclick="next(3); return false;">Tiếp tục <i class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.step-2 -->

            <div class="steps step-3 hidden-block">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Ngày giám định</label>
                                <div class="form-group">
                                    <input class="form-control" data-toggle="datepicker" type="text" placeholder="Ngày giám định" name="ngay_gd"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Giờ giám định</label>
                                <div class="form-group">
                                    <input class="form-control" data-toggle="timepicker" type="text" placeholder="Giờ giám định" name="gio_gd"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Tỉnh/Thành</label>
                                <div class="form-group">
                                    <select name="tinh_thanh_gd" class="form-control" id="province-identification">
                                        <option disabled selected>-- Chọn Tỉnh/Thành --</option>
                                        @foreach ($provinces as $province)
                                        <option value="{{ $province->code }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Quận/Huyện</label>
                                <div class="form-group">
                                    <select name="quan_huyen_gd" class="form-control" id="district-identification">
                                        <option disabled selected>-- Chọn Tỉnh/Thành --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Địa chỉ nơi giám định cụ thể</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Địa chỉ nơi giám định cụ thể" name="dia_diem_gd"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Họ tên người liên hệ <span>*</span></label>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Họ tên người liên hệ" name="ho_ten_lhe" required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Điện thoại liên hệ <span>*</span></label>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Điện thoại liên hệ" name="dthoai_lhe" required/>
                                </div>
                            </div>

                            <div class="col-md-6 hidden-block">
                                <label>Trạng thái <span>*</span></label>
                                <div class="form-group">
                                    <input class="form-control" type="hidden" placeholder="Điện thoại liên hệ" name="trang_thai" required value="D" />
                                </div>
                            </div>

                            <div class="col-md-6 hidden-block">
                                <label>Nguồn <span>*</span></label>
                                <div class="form-group">
                                    <input class="form-control" type="hidden" placeholder="Điện thoại liên hệ" name="nguon" required value="WEB" />
                                </div>
                            </div>

                            <div class="text-center col-md-12">
                                <button class="btn btn-default" onclick="back(2); return false;"><i class="fa fa-angle-left"></i> Quay lại</button>
                                <button class="btn btn-primary" onclick="next(4); return false;">Tiếp tục <i class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.step-3 -->

            <div class="steps step-4 hidden-block">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="row">
                            <div class="col-md-12 hidden-block">
                                <label>Gara liên kết của VBI</label>
                                <div class="form-group">
                                    <select class="form-control" name="ma_gara">
                                        <option>Ga ra liên kết của VBI</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Tỉnh/Thành</label>
                                <select name="tinh_thanh_gara" class="form-control" id="province-garage">
                                    <option disabled selected>-- Chọn Tỉnh/Thành --</option>
                                    @foreach ($provinces as $province)
                                    <option value="{{ $province->code }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label>Quận/Huyện</label>
                                <select name="quan_huyen_gara" class="form-control" id="district-garage">
                                    <option disabled selected>-- Chọn Tỉnh/Thành --</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label>Tên Gara sửa chữa</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Tên Gara sửa chữa" name="ten_gara"/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Địa chỉ gara</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Địa chỉ gara" name="dchi_gara" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control" type="hidden" placeholder="Địa chỉ gara" name="vbi_key_cc" value="cssanewddvew5675gff"/>
                                </div>
                            </div>

                            <div class="text-center col-md-12" id="btn-submit-car">
                                <button class="btn btn-default" onclick="back(3); return false;"><i class="fa fa-angle-left"></i> Quay lại</button>
                                <button class="btn btn-primary" type="submit">Gửi</button>
                            </div>
                            <div class="loading text-center hidden-block col-md-12">
                                <img src="/images/upload/loading.gif" alt="img-loading">
                                <p>Đang gửi...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.step-4 -->
        </form>

        <div class="mess text-center hidden-block step-5 align-items-center">
            <div>
                <p>Bạn đã khai báo bồi thường ôtô thành công!</p>
                <p>Tải bản ứng dụng trên điện thoại để <b>hoàn thành hồ sơ </b>và theo dõi bồi thường</p>
                <div class="download-app">
                    <a href="{{ $apple }}"><img src="/images/app-store.png" alt=""></a>
                    <a href="{{ $android }}"><img src="/images/google-play.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.profile-indemnify --> 

<script type="text/javascript">
    function next(step) {
        var isShowedValid = $("#form-indem-car .step-"+ (step-1) +" :input").valid();
        
        if (isShowedValid) {
            $('#form-indem-car .step-'+step).removeClass('hidden-block');
            $('#form-indem-car .step-'+(step - 1)).addClass('hidden-block');
        } else {
            $('#form-indem-car').submit();
        }

        moveTo('#form-indem-car');
    }

    function back(step) {
        $('#form-indem-car .step-'+(step + 1)).addClass('hidden-block');
        $('#form-indem-car .step-'+(step)).removeClass('hidden-block');
        moveTo('#form-indem-car');
    }

    function moveTo(id) {
        $('html,body').animate({
            scrollTop: $(id).offset().top - 300},
            0);
    }
</script>
