@extends('layouts.admin')

@section('title')

@endsection

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('plugins/datatables/dataTables.bootstrap.css') }}">
@endpush

@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">@lang('admin/user.user')</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="table" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>@lang('admin/user.id')</th>
						<th>@lang('admin/user.name')</th>
						<th>@lang('admin/user.email')</th>
						<th>@lang('admin/user.type')</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $key => $value): ?>
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $value->username }}</td>
							<td>{{ $value->email }}</td>
							<td>
								@if ($value->isadmin)
								<span class="label label-success">@lang('admin/user.admin')</span>
								@else
								<span class="label label-warning">@lang('admin/user.member')</span>
								@endif
							</td>
							<td>
								<a href="{{ route('admin.user.edit',['id'=>$value->id]) }}" class="btn btn-xs btn-warning">Edit</a>
								@if (Auth::user()->id != $value->id)
								<a onclick="confirmDelete({{$value->id}})" class="btn btn-xs btn-danger">Delete</a>
								@endif
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
				<h4 class="modal-title">@lang('admin/general.confirm_delete')</h4>
			</div>
			<div class="modal-body">
				<p>@lang('admin/general.are_you_sure')</p>
			</div>
			<div class="modal-footer">
				<a href="" class="btn btn-danger">@lang('admin/general.remove')</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin/general.close')</button>
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
			url : '{{ route("admin.user.getUrlDelete") }}',
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