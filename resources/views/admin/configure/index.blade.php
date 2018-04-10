@extends('layouts.admin')

@section('title')

@endsection

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('plugins/datatables/dataTables.bootstrap.css') }}">
@endpush

@section('content')
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
			<div class="col-md-11"><h3 class="box-title">@lang('admin/configure.configure')</h3></div>
			<div class="col-md-1"><a href="{{ route('admin.configure.create') }}" class="btn btn-xs btn-primary">@lang('admin/general.create')</a></div>	
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="table" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>@lang('admin/configure.logo')</th>
						<th>@lang('admin/configure.site_name')</th>
						<th>@lang('admin/configure.facebook')</th>
						<th>@lang('admin/configure.twitter')</th>
						<th>@lang('admin/configure.google')</th>
						<th>@lang('admin/configure.instagram')</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $key => $value): ?>
						<tr>
							<td>{{ $key+1 }}</td>
							<td><img src="{{ asset($value->logo) }}" alt="" width="90px" height="50px"/></td>
							<td>{{ $value->sitename }}</td>
							<td>{{ $value->facebook }}</td>
							<td>{{ $value->twitter }}</td>
							<td>{{ $value->google }}</td>
							<td>{{ $value->instagram }}</td>
							<td>
								<a href="{{ route('admin.configure.edit',['id'=>$value->id]) }}" class="btn btn-xs btn-warning">@lang('admin/general.edit')</a>	
								<a onclick="confirmDelete({{$value->id}})" class="btn btn-xs btn-danger">@lang('admin/general.remove')</a>
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
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
	function confirmDelete(id) {
		$.ajax({
			url : '{{ route("admin.configure.getUrlDelete") }}',
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