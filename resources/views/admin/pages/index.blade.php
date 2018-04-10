@extends('layouts.admin')

@section('title')

@endsection

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('plugins/datatables/dataTables.bootstrap.css') }}">
@endpush

@section('content')
<div class="box">
	<div class="box-header">
		<div class="col-md-11"><h3 class="box-title">Pages</h3></div>
		<div class="col-md-1"><a href="{{ route('admin.pages.create') }}" class="btn btn-xs btn-primary">Create</a></div>	
	</div>

	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="table" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Page Category</th>
					<th>Title</th>
					<th>Thumbnail</th>
					<th>Template</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $key => $value): ?>
					<tr>
						<td>{{ $key+1 }}</td>
						<td>{{ $value->pageCategory->name }}</td>
						<td>{{ $value->title }}</td>
						<td><img src="{{ asset($value->thumbnail) }}" alt="" width="90px" height="50px"/></td>
						<td>{{ $value->template }}</td>
						<td>
							<a href="{{ route('admin.pages.edit',['id'=>$value->id]) }}" class="btn btn-xs btn-warning">Edit</a>	
							<a onclick="confirmDelete({{$value->id}})" class="btn btn-xs btn-danger">Delete</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<!-- /.box-body -->
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
<!-- DataTables -->
<script type="text/javascript">
	function confirmDelete(id) {
		$.ajax({
			url : '{{ route("admin.pages.getUrlDelete") }}',
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
</script>
@endsection