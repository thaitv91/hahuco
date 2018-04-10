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
			<div class="col-md-11"><h3 class="box-title">@lang('admin/region.region')</h3></div>
			<div class="col-md-1"><a href="{{ route('admin.region.create') }}" class="btn btn-xs btn-primary">@lang('admin/general.create')</a></div>	
		</div>

		<!-- /.box-header -->
		<div class="box-body">
			<table id="table" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>@lang('admin/region.id')</th>
						<th>@lang('admin/region.name')</th>
						<th>@lang('admin/region.lat')</th>
						<th>@lang('admin/region.long')</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $key => $value): ?>
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->lat }}</td>
							<td>{{ $value->long }}</td>
							<td>
								<a href="{{ route('admin.region.listCity',['id'=>$value->id]) }}" class="btn btn-xs btn-info">@lang('admin/region.list_city')</a>
								<a href="{{ route('admin.region.edit',['id'=>$value->id]) }}" class="btn btn-xs btn-warning">@lang('admin/general.edit')</a>	
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
			url : '{{ route("admin.region.getUrlDelete") }}',
			data : {id:id},
		}).done(function(data) {
			if (data == -1) {
				alert('@lang('admin/general.bug_error')');
			} else {
				$('#modal-delete a').attr('href',data);
				$('#modal-delete').modal('show');
			}
		})
	}
</script>
@endsection