@extends('layouts.admin')

@section('title')

@endsection

@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/news.edit_news')</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-8">
				<div class="box-body">
					<div class="form-group margin-bottom-30">
						<label for="name">@lang('admin/news.name')</label>
						<input type="text" class="form-control" name="name" id="name" required="required" value="{{ $news->name }}">
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group margin-bottom-30">
						<label for="excerpt">@lang('admin/news.excerpt')</label>
						<textarea type="text" class="form-control my-editor" name="excerpt" id="excerpt" rows="5">{{ $news->excerpt }}</textarea>
						@if ($errors->has('excerpt'))
							<span class="help-block">
							<strong>{{ $errors->first('excerpt') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group margin-bottom-30">
						<label for="content">@lang('admin/news.content')</label>
						<textarea type="text" class="form-control my-editor" name="content" id="content" rows="20">{{ $news->content }}</textarea>
						@if ($errors->has('content'))
						<span class="help-block">
							<strong>{{ $errors->first('content') }}</strong>
						</span>
						@endif
					</div>

					@include('admin.include.seo')
				</div>
				<!-- /.box-body -->
			</div>
			<div class="col-md-4">
				<div class="box-body">
					<div class="form-group margin-bottom-30">
						<label for="name">@lang('admin/category.category')</label>
						<select class="form-control" name="category" id="category" required="required">
							@foreach ($categories as $category)
							<option value="{{ $category->id }}" @if($category->id == $news->category->id) selected @endif>{{ $category->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('category'))
						<span class="help-block">
							<strong>{{ $errors->first('category') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group margin-bottom-30">
						<label for="thumbnail">@lang('admin/news.thumbnail')</label>
						<input type="file" id="thumbnail" name="thumbnail" class="">
						<img src="{{ asset($news->thumbnail) }}" class="img img-thumbnail" id="preview-thumbnail" width="675px" height="auto"  @if (!$news->thumbnail) style="display: none" @endif>
					</div>

					@include('admin.include.tag')

					<div class="form-group margin-bottom-30">
						<button type="submit" class="btn btn-primary">@lang('admin/general.update')</button>
						<a href="{{ route('admin.news') }}" class="btn btn-default">@lang('admin/general.back')</a>
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