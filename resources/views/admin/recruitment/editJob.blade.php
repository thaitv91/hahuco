@extends('layouts.admin')

@section('title')

@endsection

@section('content')
<div class="col-md-12">
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/general.edit') @lang('admin/recruitment.job')</h3>
		</div>
		<form role="form" id="form-create" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
				<div class="col-md-8">
					<div class="box-body">
						<div class="form-group margin-bottom-30">
							<label  class="" for="name">@lang('admin/recruitment.name')</label>
							<input type="text" class="form-control" name="name" id="name" value="{{ $job->name }}">
							@if($errors->has('name'))
							<span class="help-block">
								<strong class="text-danger">{{$errors->first('name')}}</strong>
							</span>
							@endif
						</div>
						<div class="form-group margin-bottom-30">
							<label  class="" for="content">@lang('admin/recruitment.description')</label>
							<textarea class="form-control my-editor" rows="5" id="description" name="description">
								{{ $job->description }}
							</textarea>
							@if($errors->has('description'))
							<span class="help-block">
								<strong class="text-danger">{{$errors->first('description')}}</strong>
							</span>
							@endif
						</div>
						<div class="form-group margin-bottom-30">
							<button type="submit" class="btn btn-primary">@lang('admin/general.update')</button>
							<a href="{{ route('admin.recruitment.job.index') }}" type="submit" class="btn btn-default">@lang('admin/general.back')</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box-body">
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
				</div>
		</form>
	</div>
	<!-- /.box -->
</div>
@endsection
@section('scripts')

@endsection