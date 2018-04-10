@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/user.edit_user')</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-8 col-md-offset-2">
				<div class="box-body">
					<div class="form-group">
						<label for="username">@lang('admin/user.name')</label>
						<input type="text" class="form-control" name="username" id="username" required="required" value="{{ $user->username }}">
						@if ($errors->has('username'))
						<span class="help-block">
							<strong>{{ $errors->first('username') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="firstname">@lang('admin/user.firstname')</label>
						<input type="text" class="form-control" name="firstname" id="firstname" required="required" value="{{ $user->getUserInfo->firstname }}">
						@if ($errors->has('firstname'))
						<span class="help-block">
							<strong>{{ $errors->first('firstname') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="lastname">@lang('admin/user.lastname')</label>
						<input type="text" class="form-control" name="lastname" id="lastname" required="required" value="{{ $user->getUserInfo->lastname }}">
						@if ($errors->has('lastname'))
						<span class="help-block">
							<strong>{{ $errors->first('lastname') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group">
						<label for="email">@lang('admin/user.email')</label>
						<input type="email" class="form-control" name="email" id="email" required="required" value="{{ $user->email }}">
						@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
						@endif
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">@lang('admin/general.update')</button>
						<a class="btn btn-default" href="{{ route('admin.user') }}">@lang('admin/general.back')</a>
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
