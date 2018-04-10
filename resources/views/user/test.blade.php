@extends('layouts.admin')

@section('content')
	
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    {{-- <form class="form-horizontal" method="POST" action=""> --}}
                        {{-- {{ csrf_field() }} --}}
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Address</label>
                            <div class="col-md-6">
                                <input type="text" id="searchTextField" style="width: 250px" placeholder="Enter a location" />
                                <input type="hidden" id="city2" name="city2" />
							    <input type="hidden" id="cityLat" name="cityLat" />
								<input type="hidden" id="cityLng" name="cityLng" />  
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
	
@section('scripts') 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnH-WUxj82z2b78JlMdYnEa682htww6NA&libraries=places"></script>

   	<script type="text/javascript">
    function getLatLong() {
        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('city2').value = place.name;
            document.getElementById('cityLat').value = place.geometry.location.lat();
            document.getElementById('cityLng').value = place.geometry.location.lng();
           console.log('name:' ,place.name);
           console.log('lat: ', place.geometry.location.lat());
           console.log('long: ', place.geometry.location.lng());

        });
    }
    google.maps.event.addDomListener(window, 'load', getLatLong); 
</script>

@endsection