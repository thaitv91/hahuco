<section class="bg-v2 profile-indemnify healthy">
    <div class="container">
        <h2 class="title text-center text-white">Hồ sơ bồi thường sức khỏe</h2>

        <form id="form-indem-health" method="POST" action="/api/hapi">
            <div class="steps step-1">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Họ tên người được bảo hiểm <span>*</span></label>
                                <div class="form-group">
                                    <input name="ho_ten_ndbh" class="form-control" type="text" placeholder="Họ tên người được bảo hiểm" required/>
                                    <input name="ngay_tb" class="form-control" type="hidden" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" />
                                    <input name="gio_tb" class="form-control" type="hidden" value="{{ \Carbon\Carbon::now()->format('h:i') }}" />
                                    <!-- <input name="moi_qh" class="form-control" type="hidden" value="nguoi than" /> -->
                                    {{ csrf_field() }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>CMND/Hộ chiếu <span>*</span></label>
                                <div class="form-group">
                                    <input name="cmnd" class="form-control" type="text" placeholder="CMND/Hộ chiếu" required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Ngày sinh <span>*</span></label>
                                <div class="form-group">
                                    <input name="ngay_sinh" class="form-control" data-toggle="datepicker" type="text" placeholder="Ngày sinh" required/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Họ tên người yêu cầu trả tiền <span>*</span></label>
                                <div class="form-group">
                                    <input name="ho_ten_tb" class="form-control" type="text" placeholder="Họ tên người yêu cầu trả tiền" required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Email <span>*</span></label>
                                <div class="form-group">
                                    <input name="email_tb" class="form-control" type="email" placeholder="Email" required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Điện thoại <span>*</span></label>

                                <div class="form-group">
                                    <input name="dthoai_tb" class="form-control" type="number" placeholder="Điện thoại" required/>
                                </div>
                            </div>

                            <div class="text-center col-md-12">
                                <button onclick="nextStep(2); return false;" class="btn btn-primary">Tiếp tục <i class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.step-2 -->
            <div class="steps step-2 hidden-block">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Hinh thức điều trị <span>*</span></label>
                                <div class="form-group">
                                    <select class="form-control" required name="dieu_tri">
                                        <option disabled selected>--Chọn--</option>
                                        <option value="G">Ngoại Trú</option>
                                        <option value="N">Nội Trú</option>
                                        <option value="K">Không diều trị tại CSYT</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Ngày khám/Nhập viện <span>*</span></label>
                                <div class="form-group">
                                    <input name="ngay_vv" class="form-control" data-toggle="datepicker" type="text" placeholder="Ngày khám/Nhập viện" required/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Ngày kết thúc/Ra viện <span>*</span></label>
                                <div class="form-group">
                                    <input name="ngay_rv" class="form-control" data-toggle="datepicker" type="text" placeholder="Ngày kết thúc/Ra viện" required/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Tỉnh/Thành nơi khám chữa bệnh <span>*</span></label>
                                <div class="form-group">
                                    <!-- <input name="tinh_thanh_bv_ten" class="form-control" type="text" placeholder="Tỉnh/Thành nơi khám chữa bệnh" required/>
                                    <input name="quan_huyen_bv_ten" class="form-control" type="hidden" value="Hà Nội" /> -->
                                    <select class="form-control" name="tinh_thanh_bv_ten">
                                        <option>-- Chọn Tỉnh/Thành --</option>
                                        @foreach ($provinces as $province)
                                        <option value="{{ $province->code }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Tên cơ sở y tế</label>
                                <div class="form-group">
                                    <input name="ten_bv" id="health-facility" class="form-control" type="text" placeholder="Tên cơ sở y tế"/>
                                    <!-- <input name="dchi_bv" class="form-control" type="hidden" value="Cầu Giấy Hà Nội" /> -->
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Chẩn đoán bệnh <span>*</span></label>
                                <div class="form-group">
                                    <textarea name="chan_doan" class="form-control" required></textarea>
                                </div>
                            </div>

                            <div class="text-center col-md-12">
                                <button class="btn btn-default" onclick="backStep(1); return false;"><i class="fa fa-angle-left"></i> Quay lại</button>
                                <button class="btn btn-primary" onclick="nextStep(3); return false;">Tiếp tục <i class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.step-3 -->
            <div class="steps step-3 hidden-block">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Số tiền yêu cầu <span>*</span></label>
                                <div class="form-group">
                                    <input name="so_tien_ycbh" id="money-require" type="text" class="form-control" placeholder="Số tiền yêu cầu" required/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Hình thức thanh toán</label>
                                <div class="form-group">
                                    <select name="hinh_thuc_tt" class="form-control" id="paying-method">
                                        <option value="CK">Chuyển khoản</option>
                                        <option value="TM">Tiền Mặt</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Tên người thụ hưởng <span>*</span></label>
                                <div class="form-group">
                                    <input name="nguoi_nhan_tt" class="form-control" type="text" placeholder="Tên người thụ hưởng" required/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label id="paying-number">Số tài khoản ngân hàng <span>*</span></label>
                                <div class="form-group">
                                    <input name="tai_khoan_tt" class="form-control" type="text" placeholder="Số tài khoản ngân hàng" required/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Tên ngân hàng, Chi nhánh <span>*</span></label>

                                <div class="form-group">
                                    <input name="ngan_hang_tt_ten" class="form-control" type="text" placeholder="Tên ngân hàng, Chi nhánh" required />
                                    <input name="vbi_key_cc" class="form-control" type="hidden" value="vdf5gjt84hdgsfde3345" placeholder="Tên ngân hàng, Chi nhánh" required />
                                    <input name="nguon" class="form-control" type="hidden" value="WEB" placeholder="Tên ngân hàng, Chi nhánh" required />
                                </div>
                            </div>

                            <div class="text-center col-md-12" id="btn-submit-health">
                                <button class="btn btn-default" onclick="backStep(2); return false;"><i class="fa fa-angle-left"></i> Quay lại</button>
                                <button class="btn btn-primary" type="submit">Gửi</button>
                            </div>
                            <div class="loading text-center hidden-block col-md-12">
                                <img src="/images/upload/loading.gif" alt="img-loading">
                                <p>Đang gửi...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- /.step-4 -->
           	<div class="mess text-center hidden-block step-4 align-items-center">
                <div>
                    <p>Bạn đã khai báo bồi thường sức khỏe thành công!</p>
                    <p>Tải bản ứng dụng trên điện thoại để <b>hoàn thành hồ sơ </b>và theo dõi bồi thường</p>
                    <div class="download-app">
                        <a href="{{ $apple }}"><img src="/images/app-store.png" alt=""></a>
                        <a href="{{ $android }}"><img src="/images/google-play.png" alt=""></a>
                    </div>
                </div>
            </div>
        </form><!---->
    </div>
</section><!-- /.profile-indemnify -->
<script type="text/javascript">
    function nextStep(step) {
    	var isShowedValid = $("#form-indem-health .step-"+ (step-1) +" :input").valid();

    	if (isShowedValid) {
    		$('#form-indem-health .step-'+step).removeClass('hidden-block');
    		$('#form-indem-health .step-'+(step - 1)).addClass('hidden-block');
    	} else {
    		$('#form-indem-health').submit();
    	}

        moveTo('#form-indem-health');
    	// moveTo('healthy');
    }

    function backStep(step) {
        $('.step-' + (step + 1)).addClass('hidden-block');
        $('.step-' + step).removeClass('hidden-block');
    }

    function moveTo(id) {
        $('html, body').animate({
            scrollTop: $(id).offset().top - 300},
            100);
    }

    <?php echo "var health_facilities = ". $health_facilities.";"; ?>

    function oneDot(input) {
        var value = input.value,
        value = value.split('.').join('');

        if (value.length > 3) {
            value = value.substring(0, value.length - 3) + '.' + value.substring(value.length - 3, value.length);
        }

        input.value = value;
    }
</script>
