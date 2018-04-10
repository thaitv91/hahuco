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
						<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/network.region')</label>
						<div class="col-md-8">
							<select class="selectpicker " id="region_id" name="region_id" title="@lang('admin/network.choose_one')" data-live-search="true" tabindex="-98">
                              <option disabled selected></option>
                              @if(count($region)!=0)
                                  @foreach($region as $db_region)
                                  <option value="{{$db_region->id}}" data-tokens="{{$db_region->name}}" >{{$db_region->name }} </option>
                                  @endforeach
                               @endif
                              @if(count($region)==0)
                              <option value=""><em>(@lang('admin/network.dont_have'))</em></option>
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
						<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/network.city')</label>
						<div class="col-md-8">
							<select class="selectpicker" id="city_id" name="city_id" title="@lang('admin/network.choose_one')" data-live-search="true" tabindex="-98">
                              
                           </select>
                           @if($errors->has('city_id'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{$errors->first('city_id')}}</strong>
	                            </span>   
	                        @endif
						</div>
					</div>

					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/network.district')</label>
						<div class="col-md-8">
							<select class="selectpicker " id="district_id" name="district_id" title="@lang('admin/network.choose_one')" data-live-search="true" tabindex="-98">
                              
                           </select>
                           @if($errors->has('district_id'))
	                            <span class="help-block">
	                                <strong class="text-danger">{{$errors->first('district_id')}}</strong>
	                            </span>   
	                        @endif
						</div>
					</div>

					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/network.name')</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="@lang('admin/network.enter_name')">
							@if($errors->has('name'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('name')}}</strong>
		                            </span>
		                    @endif
						</div>
					</div>

					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="phone">@lang('admin/network.phone')</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" placeholder="@lang('admin/network.enter_phone')">
							@if($errors->has('phone'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('phone')}}</strong>
		                            </span>
		                    @endif
						</div>
					</div>

					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="content">@lang('admin/network.content')</label>
						<div class="col-md-8">
							<textarea class="form-control " rows="5" id="content" name="content">{{ old('content') }}</textarea> 
							@if($errors->has('content'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('content')}}</strong>
		                            </span>
		                    @endif   
	                    </div>
					</div>

					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/network.type')</label>
						<div class="col-md-8">
							<select class="form-control typeSelect" id="type" name="type">
								<option value="">@lang('admin/network.choose_type')</option>
							    <option value="giaodich">@lang('admin/network.place_transaction')</option>
							    <option value="chinhanh">@lang('admin/network.agency')</option>
							    <option value="gara">@lang('admin/network.gara')</option>
							    <option value="benhvien">@lang('admin/network.hospital')</option>
							    <option value="nhathuoc">@lang('admin/network.nhathuoc')</option>
							  </select>
							  @if($errors->has('type'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('type')}}</strong>
		                            </span>
		                    @endif
	                    </div>
					</div>
					<div class="form-group row" id="select-scope">

					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="address">@lang('admin/network.address')</label>
						<div class="col-md-8">
		                    <input type="text" class="form-control" id="address" name="address" type="text" size="50" placeholder="@lang('admin/network.enter_address')" autocomplete="on" runat="server" value="{{ old('address') }}" />  
		                    @if($errors->has('address'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('address')}}</strong>
		                            </span>
		                    @endif 
						</div>
					</div>
					<br>
					<div class="form-group">
						<label  class="col-md-2 col-md-offset-1"></label>
						<label  class="col-md-8" for="" style="text-align: center; display : inline-block;">@lang('admin/network.oupper_location')</label>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="address">@lang('admin/network.location')</label>
						<div class="col-md-8">
		                    <input type="text" class="form-control" id="location" type="text" size="50" placeholder="@lang('admin/network.enter_location')" autocomplete="on" runat="server" value="{{ old('address') }}" /> 
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-2 col-md-offset-1"></label>
						<label  class="col-md-8" for="" style="text-align: center; display : inline-block;"><span>@lang('admin/network.or')</span> </label>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="lat">@lang('admin/network.lat')</label>
						<div class="col-md-8">
		                    <input type="text" class="form-control" id="cityLat" name="lat" type="text" size="50" placeholder="@lang('admin/network.enter_lat')" value="{{ old('lat') }}"/>  
		                    @if($errors->has('lat'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('lat')}}</strong>
		                            </span>
		                    @endif 
						</div>
					</div>

					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="long">@lang('admin/network.long')</label>
						<div class="col-md-8">
		                    <input type="text" class="form-control" id="cityLng" name="long" type="text" size="50" placeholder="@lang('admin/network.enter_long')" value="{{ old('long') }}"/>  
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
@section('scripts')
	<script type="text/javascript">
    function getLatLng() {
        var input = document.getElementById('location');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            // document.getElementById('city2').value = place.name;
            document.getElementById('cityLat').value = place.geometry.location.lat();
            document.getElementById('cityLng').value = place.geometry.location.lng();
            console.log(place.geometry.location.lat());
        });
    }
    google.maps.event.addDomListener(window, 'load', getLatLng); 
</script>
<script type="text/javascript">
	$('#region_id').on('change', function() {
        var region_id = $( "#region_id" ).val();
        var _token = $(this).attr('_token');
        $.ajax({
            // dataType: 'html',
            type: 'GET',
            url: '{{ route("admin.network.changeRegion") }}',
            data: {region_id: region_id, _token: _token},

            success: function (res) {
            	console.log(res);
                var html;
	                $.each(res.data_city, function(index, value) {
	               	html += '<option value="'+value.id+'" data-tokens="'+value.name+'">'+value.name+' </option>';
	                });
	                $('#city_id').empty();
	                $('#district_id').empty();
	                $("#city_id").append(html);
					$("#city_id").selectpicker("refresh");
					$("#district_id").selectpicker("refresh");               
    			}
    		});
       	});
</script>
<script type="text/javascript">
	$('#city_id').on('change', function() {
        var city_id = $( "#city_id" ).val();
        // console.log(city_id);
        var _token = $(this).attr('_token');
        $.ajax({
            type: 'GET',
            url: '{{ route("admin.network.changeCity") }}',
            data: {city_id: city_id, _token: _token},

            success: function (res) {
            	console.log(res);
                var html;
	                $.each(res.data_district, function(index, value) {
	                	console.log(value)
	               		html += '<option value="'+value.id+'" data-tokens="'+value.name+'">'+value.name+' </option>';
	                });
	                $('#district_id').empty();
	                $("#district_id").append(html);
					$("#district_id").selectpicker("refresh");
	                
    			}
    		});
       	});
</script>
<script type="text/javascript">
	$('#type').on('change', function() {
        var type = $( "#type" ).val();
        // console.log(type);
        if(type == "benhvien"){
        	$('#select-scope').empty();
        	var div = $('<label  class="col-md-2 col-md-offset-1" for="name">@lang('admin/network.scope')</label><div class="col-md-8"><select class="form-control typeSelect" id="scope" name="scope"><option value="">@lang('admin/network.choose_scope')</option><option value="@lang('admin/network.boarding')">@lang('admin/network.boarding')</option><option value="@lang('admin/network.boarding_outpatient')">@lang('admin/network.boarding_outpatient')</option><option value="@lang('admin/network.boarding_outpatient_dentistry')">@lang('admin/network.boarding_outpatient_dentistry')<option value="@lang('admin/network.outpatient_dentistry')">@lang('admin/network.outpatient_dentistry')</option><option value="@lang('admin/network.dentistry')">@lang('admin/network.dentistry')</option><option value="@lang('admin/network.outpatient')">@lang('admin/network.outpatient')</option></select></div>').appendTo('#select-scope');
        }else{
        	$('#select-scope').empty();
        }
    });
</script>

@endsection
