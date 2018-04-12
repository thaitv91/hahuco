@extends('layouts.admin')

@section('title')

@endsection

@section('content')
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">

			<div class="box-header with-border">
				<h3 class="box-title">Sửa: Dịch vụ</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<form role="form" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-8">
						<div class="box-body">
							<div class="form-group margin-bottom-30">
								<label  class="" for="name">Title</label>
								<input type="text" class="form-control" name="name" id="name" value="{{ $dichvu->name }}">
								@if($errors->has('name'))
									<span class="help-block">
									<strong class="text-danger">{{$errors->first('name')}}</strong>
								</span>
								@endif
							</div>

							<div class="form-group margin-bottom-30">
								<label  class="" for="excerpt">Mô tả tóm tắt</label>
								<textarea class="form-control" rows="5" id="excerpt" name="excerpt">{{ $dichvu->excerpt }}</textarea>
							</div>

							<div class="form-group margin-bottom-30">
								<label  class="" for="content">Content</label>
								<textarea class="form-control my-editor" rows="15" id="content" name="content">{{ $dichvu->content }}</textarea>
							</div>

							@include('admin.include.seo')
						</div>
					</div>
					<div class="col-md-4">
						<div class="box-body">
							<div class="form-group margin-bottom-30">
								<label class="">Thumbnail</label>
								<input type="file" name="thumbnail" value="" id="thumbnail" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
								<img src="{{ asset($dichvu->image) }}" class="img img-thumbnail" id="preview-thumbnail" width="675px" height="auto"  @if (!$dichvu->image) style="display: none" @endif>
							</div>
							@if($errors->has('thumbnail'))
								<span class="help-block">
								<strong class="text-danger">{{$errors->first('thumbnail')}}</strong>
							</span>
							@endif

							@include('admin.include.tag')

							<div class="form-group margin-bottom-30">
								<button type="submit" class="btn btn-primary">Save</button>
							</div>
						</div>
					</div>
				</div>

				<div class="box-footer">

				</div>
			</form>
		</div>
		<!-- /.box -->
	</div>

@endsection

@section('scripts')
	<script type="text/javascript">
        $('#thumbnail').on('change', function() {
            readURL(this, 'preview-thumbnail');
        });
	</script>
@endsection