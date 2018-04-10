@extends('layouts.admin')

@section('title')

@endsection

@section('styles')
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/rowReorder.dataTables.min.css') }}">
@endsection

@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/partner.partner') @lang('admin/partner.order')</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<div class="col-md-12">
			<div class="box-body">
				<table class="table-bordered" id="table">
					<thead>
						<th>@lang('admin/partner.order')</th>
						<th>@lang('admin/partner.name')</th>
						<th class="hidden"></th>
					</thead>
					<tbody>
						@foreach ($partners as $key=>$partner)
						<tr>
							<td>{{ $partner->order }}</td>
							<td>{{ $partner->name }}</td>
							<td class="hidden">{{ $partner->id }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		<div class="box-footer">

		</div>
	</div>
	<!-- /.box -->
</div>
@endsection

@section('scripts')
<script src="{{ asset('plugins/datatables/dataTables.rowReorder.min.js') }}"></script>

<!-- DataTables -->
<script type="text/javascript">
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });
	// $('.table').dataTable().fnDestroy();
	var table = $('#table').DataTable( {
			paging: false,
            rowReorder: true
        } );
	
	table.on( 'row-reorder', function ( e, diff, edit ) {
		var order = [];
		var data = $('#table tbody tr');
		for (var i = 0; i < data.length; i++) {
			var item = $(data[i]).find('td')[2];
			order.push($(item).text());
		}            
		
		updateOrder(order);
	} );

    function updateOrder(order) {
    	$.ajax({
    		type : "POST",
    		url : "{{ route('admin.partner.updateOrder') }}",
    		data : {order : order}
    	});
    }
</script>
@endsection