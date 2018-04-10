@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/product.edit_product')</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-create" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-9">
				<div class="box-body">
					<div class="form-group margin-bottom-30">
						<label for="title">@lang('admin/product.title')</label>
						<input type="text" class="form-control" name="title" id="title" required="required" value="{{ $product->title }}">
						@if ($errors->has('title'))
						<span class="help-block">
							<strong>{{ $errors->first('title') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group margin-bottom-30">
						<label for="short_description">@lang('admin/product.short_description')</label>
						<textarea type="text" class="form-control" name="short_description" id="short_description" rows="5">{{ $product->short_description }}</textarea>
						@if ($errors->has('short_description'))
							<span class="help-block">
							<strong>{{ $errors->first('short_description') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group margin-bottom-30">
						<label for="description">@lang('admin/product.description')</label>
						<textarea type="text" class="form-control my-editor" name="mo_ta_san_pham" id="description" rows="15">{{ $product->mo_ta_san_pham }}</textarea>
						@if ($errors->has('description'))
						<span class="help-block">
							<strong>{{ $errors->first('description') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<div class="col-md-3">
				<div class="box-body">
					<div class="form-group margin-bottom-30">
						<label for="name">@lang('admin/product.term')</label>
						<select class="form-control" name="term" id="term" required="required">
							@foreach ($terms as $term)
							<option value="{{ $term->id }}" @if($product->product_term_id==$term->id) selected @endif>{{ $term->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('category'))
						<span class="help-block">
							<strong>{{ $errors->first('category') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group margin-bottom-30">
						<label for="thumbnail">@lang('admin/product.thumbnail')</label>
						<input type="file" name="thumbnail" id="thumbnail">
						<img src="{{ asset($product->thumbnail) }}" class="img img-thumbnail" id="preview-thumbnail" width="675px" height="auto" @if(!$product->thumbnail) style="display: none" @endif>
						@if ($errors->has('thumbnail'))
						<span class="help-block">
							<strong>{{ $errors->first('thumbnail') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group row margin-bottom-30">
						<label  class="col-sm-8 col-form-label" for="noibat">Sản phẩm nổi bật:</label>
						<div class="col-sm-4">
							<input id="noibat" type="checkbox" name="noi_bat" value="noi_bat" {{ $product->noi_bat ? 'checked' : '' }} data-toggle="toggle">
						</div>
					</div>
					<div class="form-group margin-bottom-30">
						<button type="submit" class="btn btn-primary">@lang('admin/general.update')</button>
						<a href="{{ route('admin.product') }}" class="btn btn-default">@lang('admin/general.back')</a>
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