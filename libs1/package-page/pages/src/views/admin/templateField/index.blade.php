@extends('layouts.admin')

@section('title')

@endsection

@section('styles')
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables/rowReorder.dataTables.min.css') }}">
@endsection

@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<div class="col-md-11"><h3 class="box-title">Template Field</h3></div>
			<div class="col-md-1"><a href="{{ route('admin.templateField.create') }}" class="btn btn-xs btn-primary">Create</a></div>	
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="table" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>slug</th>
						<th>Content</th>
						<th>Type</th>
						<th>Template</th>
						<th width="10%"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $key => $value): ?>
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $value->title }}</td>
							<td>{{ $value->slug }}</td>
							<td>{!! str_limit($value->content , $limit = 100, $end = '...') !!}</td>
							<td>{{ $value->type }}</td>
							<td>{{ $value->template }}</td>
							<td>
								<a href="{{ route('admin.templateField.edit',['id'=>$value->id]) }}" class="btn btn-xs btn-warning">Edit</a>	
								<a onclick="confirmDelete({{$value->id}})" class="btn btn-xs btn-danger">Delete</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
	</div>
</div>
<!-- /.box -->
{{-- Modal delete --}}

<div class="modal fade" id="modal-delete" role="dialog">
	<div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Confirm delete</h4>
			</div>
			<div class="modal-body">
				<p>Are you sure to do this action?</p>
			</div>
			<div class="modal-footer">
				<a href="" class="btn btn-danger">Delete</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('plugins/datatables/dataTables.rowReorder.min.js') }}"></script>

<!-- DataTables -->
<script type="text/javascript">
	function confirmDelete(id) {
		$.ajax({
			url : '{{ route("admin.templateField.getUrlDelete") }}',
			data : {id:id},
		}).done(function(data) {
			if (data == -1) {
				alert('Opp! Please try again. Error!');
			} else {
				$('#modal-delete a').attr('href',data);
				$('#modal-delete').modal('show');
			}
		})
	}

	@if (isset($template))
	$('.table').dataTable().fnDestroy();
	var table = $('#table').DataTable( {
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
    		url : "{{ route('admin.template.updateOrder') }}",
    		data : {order : order}
    	});
    }
    @endif
</script>
@endsection