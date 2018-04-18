@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/term.edit_term')</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-8">
				<div class="box-body">
					<div class="form-group margin-bottom-30">
						<label for="name">@lang('admin/term.name')</label>
						<input type="text" class="form-control" name="name" id="name" required="required" value="{{ $term->name }}">
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group margin-bottom-30">
						<label for="excerpt">@lang('admin/news.excerpt')</label>
						<textarea type="text" class="form-control" name="excerpt" id="excerpt" rows="5">{{ $term->excerpt }}</textarea>
						@if ($errors->has('excerpt'))
							<span class="help-block">
							<strong>{{ $errors->first('excerpt') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group margin-bottom-30">
						<label for="description">@lang('admin/term.description')</label>
						<textarea type="text" class="form-control my-editor" name="description" id="description" rows="15">{{ $term->description }}</textarea>
						@if ($errors->has('description'))
						<span class="help-block">
							<strong>{{ $errors->first('description') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<div class="col-md-4">
				<div class="box-body">
					<div class="form-group margin-bottom-30">
						<label for="description">@lang('admin/term.thumbnail')</label>
						<input type="file" id="thumbnail" name="thumbnail">
						<img src="{{ asset($term->thumbnail) }}" class="img img-thumbnail" id="preview-thumbnail" width="675px" height="auto"  @if (!$term->thumbnail) style="display: none" @endif>
					</div>

					<div class="form-group margin-bottom-30">
						<button type="submit" class="btn btn-primary">@lang('admin/general.update')</button>
						<a href="{{ route('admin.product.term') }}" class="btn btn-default">@lang('admin/general.back')</a>
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