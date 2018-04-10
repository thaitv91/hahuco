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
						<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/district.city')</label>
						<div class="col-md-8">
							<select class="selectpicker " id="city_id" name="city_id" title="@lang('admin/district.choose_one')" data-live-search="true" tabindex="-98">
                              <option disabled selected></option>
                              @if(count($city)!=0)
                                  @foreach($city as $db_city)
                                  <option @if($db_city->id == $data['city_id']) selected @endif value="{{$db_city->id}}" data-tokens="{{$db_city->name}}" >{{$db_city->name }} </option>
                                  @endforeach
                               @endif
                              @if(count($city)==0)
                              <option value=""><em>(@lang('admin/district.dont_have'))</em></option>
                             @endif
                           </select>
                           @if($errors->has('city_id'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{$errors->first('city_id')}}</strong>
	                            </span>   
	                        @endif
						</div>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/district.name')</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}" placeholder="@lang('admin/district.enter_name')">
							@if($errors->has('name'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('name')}}</strong>
		                            </span>
		                    @endif
						</div>
					</div>
					
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="lat">@lang('admin/district.lat')</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="lat" id="lat" value="{{ $data->lat }}" placeholder="@lang('admin/district.enter_lat')">
						@if($errors->has('lat'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{$errors->first('lat')}}</strong>
	                            </span>   
	                        @endif	
						</div>
					</div>
		
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/district.long')</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="long" id="long" value="{{ $data->long }}" placeholder="@lang('admin/district.enter_long')">
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