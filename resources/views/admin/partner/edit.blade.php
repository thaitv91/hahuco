@extends('layouts.admin')

@section('title')

@endsection

@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/partner.edit_partner')</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-8 col-md-offset-2">
				<div class="box-body">
					<div class="form-group">
						<label for="name">@lang('admin/category.name') *</label>
						<input type="text" class="form-control" name="name" id="name" required="required" value="{{ $partner->name }}">
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="description">@lang('admin/partner.thumbnail')</label>
							<input type="file" id="thumbnail" name="thumbnail" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<img src="{{ asset($partner->thumbnail) }}" class="img img-thumbnail" id="preview-thumbnail" width="675px" height="auto"  @if (!$partner->thumbnail) style="display: none" @endif>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">@lang('admin/general.update')</button>
						<a href="{{ route('admin.partner') }}" class="btn btn-default">@lang('admin/general.back')</a>
					</div>
				</div>
				<!-- /.box-body -->
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