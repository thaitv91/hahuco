<section class="create-profile space-global">
    <div class="container">
        <div class="text-center">
            <a class="btn-vbi fz-24 btn-pink text-uppercase" href="/template/mau-ho-so.docx"><i class="fa fa-file"></i> Download mẫu hồ sơ</a>
            <button class="btn-vbi fz-24 btn-blue text-uppercase" data-toggle="collapse" href="#collapseform" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-paper-plane"></i> Gửi hồ sơ</button>
        </div>
        <form id="form-recruitment" action="{{ route('recruitment.storeProfile') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="collapse" id="collapseform">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Họ và tên <span>*</span>:</label>
                            <input id="name" name="name" type="text"  class="form-control" placeholder="Cho chúng tôi biết họ tên đầy đủ của bạn?" required />
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email <span>*</span>:</label>
                            <input id="email" name="email" type="email" class="form-control" placeholder="Chúng tôi sẽ thông báo tuyển dụng về email nào?" required/>
                           
                            <span class="help-block">
                                <strong style="color: red display: none;" id="error-email">{{ $errors->first('email') }}</strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Số điện thoại <span>*</span>:</label>
                            <input id="phone" name="phone" type="text" class="form-control" placeholder="Số di động rất cần thiết để chúng tôi trao đổi trực tiếp" required/>
                            @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong style="color: red">{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tải CV cá nhân <span>*</span>:</label>
                            <div class="upload-cv">
                                <input id="cvupload" type="file" name="profile" required>
                                <p class="note">Tải CV cá nhân của bạn ở đây (chúng tôi sẽ nhận file pdf; word; hoặc excel)</p>
                                @if ($errors->has('profile'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('profile') }}</strong>
                                    </span>
                                 @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nội dung giới thiệu:</label>
                            <textarea id="content" name="content" class="form-control" placeholder="Hãy giới thiệu ngắn cho chúng tôi biết về bạn; kinh nghiệm và những thế mạnh của bạn!" required></textarea>
                            @if ($errors->has('content'))
                            <span class="help-block">
                                <strong style="color: red">{{ $errors->first('content') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
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
                                            <strong style="color: red; display: none;" id="error-captcha">{{ $errors->first('captcha') }}</strong>
                                      </div>
                                  </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary text-uppercase">Gửi tới VBI</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.collapse -->
        </form>
        <div class="message-success">
            VBI đã nhận được hồ sơ của bạn, vui lòng chờ phản hồi từ bộ phận nhân sự
        </div>
    </div>
</section>
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#form-recruitment').on('submit', function(e) {
            e.preventDefault();

            var profile = $('#cvupload')[0].files[0];
            var formData = new FormData();
            formData.append('name', $('#name').val());
            formData.append('email', $('#email').val());
            formData.append('phone', $('#phone').val());
            formData.append('content', $('#content').val());
            formData.append('captcha', $('#captcha').val());
            formData.append('profile', profile);

            
            $.ajax({
                url : $('#form-recruitment').attr('action'),
                data : formData,
                type : 'POST',
                contentType : false,
                processData : false,
                success : function (data) {
                    console.log(data);
                    if (data == 1){
//                        toastr.success('VBI đã nhận được hồ sơ của bạn, vui lòng chờ phản hồi từ bộ phận nhân sự');
                        $('.message-success').addClass('show');
                        $('#collapseform').removeClass('show');
                        $('#error-email').css('display', 'none');
                        $('#error-captcha').css('display', 'none');
                        $('#form-recruitment')[0].reset();
                    }

                    if (data == 0){
                        toastr.error('Error! Please try again.');
                    }
                    if (data.captcha) {
                        console.log(data.captcha[0]);
                        $('#error-captcha').css('display', 'block');
                        $('#error-captcha').text(data.captcha[0]);
                        $.ajax({
                            type:'GET',
                            url:'/refresh_captcha',
                            success:function(data){
                                $(".captcha span").html(data.captcha);
                            }
                        });
                    }
                    if (data.email) {
                        $('#error-email').css('display', 'block');
                        $('#error-email').text(data.email[0]);
                        $.ajax({
                            type:'GET',
                            url:'/refresh_captcha',
                            success:function(data){
                                $(".captcha span").html(data.captcha);
                            }
                        });
                    }
                }
            });
        });
    });

$(".btn-refresh").click(function(){
  $.ajax({
     type:'GET',
     url:'/refresh_captcha',
     success:function(data){
        $(".captcha span").html(data.captcha);
     }
  });
});

$("#captcha").change(function(){
    $('#error-captcha').css('display', 'none');
})
</script>
@endsection