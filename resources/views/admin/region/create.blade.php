@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/general.create')</h3>
		</div>
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
				<div class="box-body">

					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/region.name')</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="@lang('admin/region.enter_name')">
							@if($errors->has('name'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('name')}}</strong>
		                            </span>
		                    @endif
						</div>
					</div>
					
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="lat">@lang('admin/region.lat')</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="lat" id="lat" value="{{ old('lat') }}" placeholder="@lang('admin/region.enter_lat')">
						@if($errors->has('lat'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{$errors->first('lat')}}</strong>
	                            </span>   
	                        @endif	
						</div>
					</div>
		
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/region.long')</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="long" id="long" value="{{ old('long') }}" placeholder="@lang('admin/region.enter_long')">
						@if($errors->has('long'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{$errors->first('long')}}</strong>
	                            </span>   
	                        @endif	
						</div>
					</div>
				
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">@lang('admin/general.create')</button>
						<a href="{{ URL::previous() }}" type="submit" class="btn btn-default">@lang('admin/general.back')</a>
					</div>
				</div>
		</form>
	</div>
	<!-- /.box -->
</div>
@endsection