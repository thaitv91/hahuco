@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">Create</h3>
		</div>
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group row">
                        <label class="col-md-2 col-md-offset-1">Logo</label>
						<div class="col-md-8">
	                        <input type="file" name="logo" value="" id="logo" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
	                          <img id="previewHolder" alt="" width="170px" height="100px"/>
	                        <div class="col-md-8">
	                        	@if($errors->has('logo'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('logo')}}</strong>
		                            </span>
		                        @endif
	                    	</div>
                    	</div>
               		</div>

					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="sitename">Site Name</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="sitename" id="sitename" value="{{ old('sitename') }}">
							@if($errors->has('sitename'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('sitename')}}</strong>
		                            </span>
		                    @endif
						</div>
					</div>

					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">Facebook</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="facebook" id="facebook">
							@if($errors->has('facebook'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{$errors->first('facebook')}}</strong>
	                            </span>   
	                        @endif
						</div>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">Twitter</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="twitter" id="twitter" value="{{ old('twitter') }}">
						@if($errors->has('twitter'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{$errors->first('twitter')}}</strong>
	                            </span>   
	                        @endif	
						</div>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="google">Google</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="google" id="google" value="{{ old('google') }}">
							@if($errors->has('google'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('google')}}</strong>
		                            </span>   
		                    @endif	
						</div>
					</div>

					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="instagram">Instagram</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="instagram" id="instagram" value="{{ old('instagram') }}">
						@if($errors->has('instagram'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{$errors->first('instagram')}}</strong>
	                            </span>   
	                        @endif	
						</div>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="copyright">Copyright</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="copyright" id="copyright" value="{{ old('copyright') }}">
							@if($errors->has('copyright'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('copyright')}}</strong>
		                            </span>   
		                     @endif	
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-md-offset-1">Ảnh huyến mại</label>
						<div class="col-md-8">
							<input type="file" name="promotion_image" value="" id="promotion_image" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
							<img id="previewHolder2" src="{{ asset(old('promotion_image')) }}" alt="" width="170px" height="100px"/>
							<div class="col-md-8">
								@if($errors->has('promotion_image'))
									<span class="help-block">
		                                <strong class="text-danger">{{$errors->first('promotion_image')}}</strong>
		                            </span>
								@endif
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="promotion_title">Tiêu đề khuyến mại</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="promotion_title" id="promotion_title" value="{{ old('promotion_title') }}">
							@if($errors->has('promotion_title'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('promotion_title')}}</strong>
		                            </span>   
		                     @endif	
						</div>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="promotion_content">Nội Dung Khuyến mại</label>
						<div class="col-md-8">
							<textarea name="promotion_content" class="form-control" id="promotion_content">{{ old('promotion_content') }}</textarea>
							@if($errors->has('promotion_content'))
								<span class="help-block">
		                                <strong class="text-danger">{{$errors->first('promotion_content')}}</strong>
		                            </span>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="promotion_url">Link Khuyến mại</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="promotion_url" id="promotion_url" value="{{ old('promotion_url') }}">
							@if($errors->has('promotion_url'))
								<span class="help-block">
		                                <strong class="text-danger">{{$errors->first('promotion_url')}}</strong>
		                            </span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="android">Link Android</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="android" id="android" value="{{ old('android') }}">
							@if($errors->has('android'))
								<span class="help-block">
		                                <strong class="text-danger">{{$errors->first('android')}}</strong>
		                            </span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="apple">Link Ios</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="apple" id="apple" value="{{ old('apple') }}">
							@if($errors->has('apple'))
								<span class="help-block">
		                                <strong class="text-danger">{{$errors->first('apple')}}</strong>
		                            </span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="apple">Email</label>
						<div class="col-md-8">
							<input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
							@if($errors->has('email'))
								<span class="help-block">
		                                <strong class="text-danger">{{$errors->first('email')}}</strong>
		                            </span>
							@endif
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Create</button>
						<a href="{{ route('admin.configure.index') }}" type="submit" class="btn btn-default">Back</a>
					</div>
				</div>
		</form>
	</div>
	<!-- /.box -->
</div>
@endsection
@section('scripts')
<script type="text/javascript">
   	function readURL(input) {
  		if (input.files && input.files[0]) {
		    var reader = new FileReader();
		    reader.onload = function(e) {
		      $('#previewHolder').attr('src', e.target.result);
		    }

		    reader.readAsDataURL(input.files[0]);
		    console.log(reader);
  		}
	}
 	$("#logo").change(function() {
  	readURL(this);
	});
</script>
<script type="text/javascript">
   	function readURL2(input) {
  		if (input.files && input.files[0]) {
		    var reader = new FileReader();
		    reader.onload = function(e) {
		      $('#previewHolder2').attr('src', e.target.result);
		    }

		    reader.readAsDataURL(input.files[0]);
		    console.log(reader);
  		}
	}
 	$("#promotion_image").change(function() {
  	readURL2(this);
	});
</script>
@endsection