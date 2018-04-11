@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/product.create_product')</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-create" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-9">
				<div class="box-body">
					<div class="form-group margin-bottom-30">
						<label for="title">@lang('admin/product.title')</label>
						<input type="text" class="form-control" name="title" id="title" required="required">
						@if ($errors->has('title'))
						<span class="help-block">
							<strong>{{ $errors->first('title') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group margin-bottom-30">
						<label for="short_description">@lang('admin/product.short_description')</label>
						<textarea type="text" class="form-control" name="short_description" id="short_description" rows="5"></textarea>
						@if ($errors->has('short_description'))
							<span class="help-block">
							<strong>{{ $errors->first('short_description') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group margin-bottom-30">
						<label for="description">@lang('admin/product.description')</label>
						<textarea type="text" class="form-control my-editor" name="mo_ta_san_pham" id="description" rows="15"></textarea>
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
						<label for="term">@lang('admin/product.term')</label>
						<select class="form-control" name="term" id="term" required="required">
							<option selected disabled value>@lang('admin/product.select_term')</option>
							@foreach ($terms as $term)
								<option value="{{ $term->id }}">{{ $term->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('term'))
						<span class="help-block">
							<strong>{{ $errors->first('term') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group margin-bottom-30">
						<label for="thumbnail">@lang('admin/product.thumbnail')</label>
						<input type="file" name="thumbnail" id="thumbnail">
						<img src="" style="display: none" class="img img-thumbnail" id="preview-thumbnail" width="675px" height="auto">
						@if ($errors->has('thumbnail'))
						<span class="help-block">
							<strong>{{ $errors->first('thumbnail') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group row margin-bottom-30">
						<label  class="col-sm-8 col-form-label" for="noibat">Sản phẩm nổi bật:</label>
						<div class="col-sm-4 col-sx-10">
							<input id="noibat" type="checkbox" name="noi_bat" value="noi_bat" data-toggle="toggle">
						</div>
					</div>

                    <div class="form-group row margin-bottom-30">
                        <label  class="col-sm-12 col-sx-12" for="tags">Tags</label>
                        <div class="col-sm-12 col-sx-12">
                            <input id="tags" class="form-control" name="tags" type="text" value="" data-role="tagsinput">

                        </div>
                    </div>

					<div class="form-group margin-bottom-30">
						<button type="submit" class="btn btn-primary">@lang('admin/general.create')</button>
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

    {{--$('#tags').tagsinput({--}}
        {{--typeaheadjs: {--}}
            {{--name: 'citynames',--}}
            {{--displayKey: 'name',--}}
            {{--valueKey: 'name',--}}
            {{--source: "{!! json_decode($tags) !!}"--}}
        {{--}--}}
    {{--});--}}
</script>
@endsection