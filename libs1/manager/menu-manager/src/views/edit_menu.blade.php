@extends('layouts.admin')
@section('title')
@endsection
@section('content')
<form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Menu</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="clearfix"></div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel box box-primary">
					<!-- X-title -->
					<div class="x_title box-header with-border">
						<div class="col-md-12">
							<h4>Edit</h4>
							<div class="clearfix"></div>
						</div>
					</div>
					<!-- X-title -->
					
					<!-- X-content -->
					<div class="x_content box-body">
						<div id="create-menu" class="col-md-12">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="name" id="name" required="required" class="form-control col-md-7 col-xs-12" value="{{ $menu->name }}">
									@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu-class">Menu class</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="menu_class" id="menu-class" class="form-control col-md-7 col-xs-12" value="{{ $menu->class }}">
								</div>
							</div>
						</div>
					</div>
					<!-- X-content -->
					<div class="box-footer">
						<div class="col-md-3 col-sm-3 col-xs-12"></div>
						<div class="col-md-6 col-sm-6 col-xs-12 text-center">
							<a href="{{ route('menu_manager') }}" class="btn btn-default">Back</a>
							<button class="btn btn-primary" type="submit">Update</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
