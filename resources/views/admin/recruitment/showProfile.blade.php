@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/general.detail') @lang('admin/recruitment.profile')</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="col-md-8 col-md-offset-1">
			<div class="box-body">
				<div class="row form-group">
					<div class="col-md-4">
						<label class="label-control">@lang('admin/recruitment.name'): </label>
					</div>
					<div class="col-md-8"><p>{{ $profile->name }}</p></div>
				</div>
				<div class="row form-group">
					<div class="col-md-4">
						<label class="label-control">@lang('admin/recruitment.email'): </label>
					</div>
					<div class="col-md-8"><p>{{ $profile->email }}</p></div>
				</div>
				<div class="row form-group">
					<div class="col-md-4">
						<label class="label-control">@lang('admin/recruitment.phone'): </label>
					</div>
					<div class="col-md-8"><p>{{ $profile->phone }}</p></div>
				</div>
				<div class="row form-group">
					<div class="col-md-4">
						<label class="label-control">@lang('admin/recruitment.profile'): </label>
					</div>
					<div class="col-md-8"><a download href="{{ asset($profile->profile) }}">@lang('admin/general.download')</a></div>
				</div>
				<div class="row form-group">
					<div class="col-md-4">
						<label class="label-control">@lang('admin/recruitment.created_at'): </label>
					</div>
					<div class="col-md-8"><p>{{ $profile->created_at->format('d/m/Y H:i') }}</p></div>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<div class="clearfix"></div>
		<div class="box-footer">
			<div class="row">
				<div class="col-md-8 col-md-offset-1">
					<a href="{{ route('admin.recruitment.profile.index') }}" class="btn btn-default">Back</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /.box -->
</div>
@endsection

@section('scripts')
<script type="text/javascript">
</script>
@endsection