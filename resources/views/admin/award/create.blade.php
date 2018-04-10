@extends('layouts.admin')

@section('title')

@endsection

@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/award.create_award')</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-8">
				<div class="box-body">
					<div class="form-group margin-bottom-30">
						<label for="name">@lang('admin/award.name') *</label>
						<input type="text" class="form-control" name="name" id="name" required="required">
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group margin-bottom-30">
						<label for="tooltip">@lang('admin/award.tooltip')</label>
						<textarea type="text" class="form-control my-editor" name="tooltip" id="tooltip" rows="10"></textarea>
						@if ($errors->has('content'))
						<span class="help-block">
							<strong>{{ $errors->first('content') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<div class="col-md-4">
				<div class="box-body">
						<div class="form-group margin-bottom-30">
							<label for="image">@lang('admin/award.image') * </label>
							<input type="file" id="image" name="image" class="">
							@if ($errors->has('image'))
							<span class="help-block">
								<strong>{{ $errors->first('image') }}</strong>
							</span>
							@endif
						</div>
						<div class="form-group margin-bottom-30">
							<label for="image"></label>
							<img src="" style="display: none" class="img img-thumbnail" id="preview-image" width="675px" height="auto">
						</div>
						<div class="form-group margin-bottom-30">
							<button type="submit" class="btn btn-primary">@lang('admin/general.create')</button>
							<a href="{{ route('admin.award') }}" class="btn btn-default">@lang('admin/general.back')</a>
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
	$('#image').on('change', function() {
		readURL(this, 'preview-image');
	});
</script>
@endsection