@if(count($data_city)!=0)
	<option>Chọn tỉnh/thành phố</option>
	  @foreach($data_city as $db_city)
	  <option value="{{$db_city->id}}" data-tokens="{{$db_city->name}}" >{{$db_city->name }} </option>
	  @endforeach
@endif
@if(count($db_city)==0)
	<option value=""><em>(Không có dữ liệu)</em></option>
@endif