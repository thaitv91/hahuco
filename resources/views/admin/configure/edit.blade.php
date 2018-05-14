@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/configure.configure')</h3>
		</div>
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="box-body">
				<div class="form-group row">
					<label class="col-md-2 col-md-offset-1">Logo</label>
					<div class="col-md-8">
						<input type="file" name="logo" value="" id="logo" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
						<img id="previewHolder" src="{{ asset($data->logo) }}" alt="" width="170px" height="100px"/>
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
					<label  class="col-md-2 col-md-offset-1" for="sitename">@lang('admin/configure.site_name')</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="sitename" id="sitename" value="{{ $data->sitename }}">
						@if($errors->has('logo'))
						<span class="help-block">
							<strong class="text-danger">{{$errors->first('logo')}}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/configure.facebook')</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="facebook" id="facebook" value="{{ $data->facebook }}">
						@if($errors->has('facebook'))
						<span class="help-block">
							<strong class="text-danger">{{$errors->first('facebook')}}</strong>
						</span>   
						@endif
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/configure.twitter')</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="twitter" id="twitter" value="{{ $data->twitter }}">
						@if($errors->has('twitter'))
						<span class="help-block">
							<strong class="text-danger">{{$errors->first('twitter')}}</strong>
						</span>   
						@endif	
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-md-offset-1" for="google">@lang('admin/configure.google')</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="google" id="google" value="{{ $data->google }}">
						@if($errors->has('google'))
						<span class="help-block">
							<strong class="text-danger">{{$errors->first('google')}}</strong>
						</span>   
						@endif	
					</div>
				</div>

				<div class="form-group row">
					<label  class="col-md-2 col-md-offset-1" for="instagram">@lang('admin/configure.instagram')</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="instagram" id="instagram" value="{{ $data->instagram }}">
						@if($errors->has('instagram'))
						<span class="help-block">
							<strong class="text-danger">{{$errors->first('instagram')}}</strong>
						</span>   
						@endif	
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-md-2 col-md-offset-1" for="copyright">@lang('admin/configure.copyright')</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="copyright" id="copyright" value="{{ $data->copyright }}">
						@if($errors->has('copyright'))
						<span class="help-block">
							<strong class="text-danger">{{$errors->first('copyright')}}</strong>
						</span>   
						@endif	
					</div>
				</div>

				<div class="form-group row">
					<label class="col-md-2 col-md-offset-1">@lang('admin/configure.promotion_image')</label>
					<div class="col-md-8">
						<input type="file" name="promotion_image" value="" id="promotion_image" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
						<img id="previewHolder2" src="{{ asset($data->promotion_image) }}" alt="" width="170px" height="100px"/>
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
					<label  class="col-md-2 col-md-offset-1" for="promotion_title">@lang('admin/configure.promotion_title')</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="promotion_title" id="promotion_title" value="{{ $data->promotion_title }}">
						@if($errors->has('promotion_title'))
						<span class="help-block">
							<strong class="text-danger">{{$errors->first('promotion_title')}}</strong>
						</span>   
						@endif	
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-md-2 col-md-offset-1" for="mapdes">Nội dung địa chỉ trên bản đồ</label>
					<div class="col-md-8">
						<textarea name="mapdes" class="form-control" rows="10" id="mapdes">{{ $data->mapdes }}</textarea>
						@if($errors->has('mapdes'))
						<span class="help-block">
							<strong class="text-danger">{{$errors->first('mapdes')}}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<label  class="col-md-2 col-md-offset-1" for="promotion_content">@lang('admin/configure.promotion_content')</label>
					<div class="col-md-8">
						<textarea name="promotion_content" class="form-control" id="promotion_content">{{ $data->promotion_content }}</textarea>
						@if($errors->has('promotion_content'))
							<span class="help-block">
							<strong class="text-danger">{{$errors->first('promotion_content')}}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<label  class="col-md-2 col-md-offset-1" for="promotion_url">@lang('admin/configure.promotion_link')</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="promotion_url" id="promotion_url" value="{{ $data->promotion_url }}">
						@if($errors->has('promotion_url'))
						<span class="help-block">
							<strong class="text-danger">{{$errors->first('promotion_url')}}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-md-2 col-md-offset-1" for="android">@lang('admin/configure.android_link')</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="android" id="android" value="{{ $data->android }}">
						@if($errors->has('android'))
						<span class="help-block">
							<strong class="text-danger">{{$errors->first('android')}}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-md-2 col-md-offset-1" for="apple">@lang('admin/configure.ios_link')</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="apple" id="apple" value="{{ $data->apple }}">
						@if($errors->has('apple'))
						<span class="help-block">
							<strong class="text-danger">{{$errors->first('apple')}}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group row">
					<label  class="col-md-2 col-md-offset-1" for="apple">@lang('admin/configure.email')</label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="email" id="email" value="{{ $data->email }}">
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
					<button type="submit" class="btn btn-primary">@lang('admin/general.update')</button>
					<a href="{{ route('admin.configure.index') }}" type="submit" class="btn btn-default">@lang('admin/general.back')</a>
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