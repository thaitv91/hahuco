@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/general.edit')</h3>
		</div>
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/city.region')</label>
						<div class="col-md-8">
							<select class="selectpicker " id="region_id" name="region_id" title="@lang('admin/city.choose_one')" data-live-search="true" tabindex="-98">
                              <option disabled selected></option>
                              @if(count($region)!=0)
                                  @foreach($region as $db_region)
                                  <option @if($db_region->id == $data['region_id']) selected @endif  value="{{$db_region->id}}" data-tokens="{{$db_region->name}}" >{{$db_region->name }} </option>
                                  @endforeach
                               @endif
                              @if(count($region)==0)
                              <option value=""><em>(@lang('admin/city.dont_have'))</em></option>
                             @endif
                           </select>
                           @if($errors->has('region_id'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{$errors->first('region_id')}}</strong>
	                            </span>   
	                        @endif
						</div>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/city.name')</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}"placeholder="@lang('admin/city.enter_name')">
							@if($errors->has('name'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('name')}}</strong>
		                            </span>
		                    @endif
						</div>
					</div>
					
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="lat">@lang('admin/city.lat')</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="lat" id="lat" value="{{ $data->lat }}" placeholder="@lang('admin/city.enter_lat')">
						@if($errors->has('lat'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{$errors->first('lat')}}</strong>
	                            </span>   
	                        @endif	
						</div>
					</div>
		
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/city.long')</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="long" id="long" value="{{ $data->long }}" placeholder="@lang('admin/city.enter_long')">
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
						<button type="submit" class="btn btn-primary">@lang('admin/general.update')</button>
						<a href="{{ URL::previous() }}" type="submit" class="btn btn-default">@lang('admin/general.back')</a>
					</div>
				</div>
		</form>
	</div>
	<!-- /.box -->
</div>
@endsection