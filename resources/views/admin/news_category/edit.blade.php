@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/category.edit_category')</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-8 col-md-offset-2">
				<div class="box-body">
					<div class="form-group">
						<label for="name">@lang('admin/category.name')</label>
						<input type="text" class="form-control" name="name" id="name" required="required" value="{{ $category->name }}">
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="description">@lang('admin/category.description')</label>
						<textarea type="text" class="form-control my-editor" name="description" id="description" rows="5">{{ $category->description }}</textarea>
						@if ($errors->has('description'))
						<span class="help-block">
							<strong>{{ $errors->first('description') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">@lang('admin/general.update')</button>
						<a href="{{ route('admin.news.category') }}" class="btn btn-default">@lang('admin/general.back')</a>
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
