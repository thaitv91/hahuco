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
			@if($data_region)
			<div class="col-md-11"><h3 class="box-title">{{ $data_region->name}}-@lang('admin/city.city')</h3></div>
			@else
			<div class="col-md-11"><h3 class="box-title">@lang('admin/city.city')</h3></div>
			@endif
			<div class="col-md-1"><a href="{{ route('admin.city.create') }}" class="btn btn-xs btn-primary">@lang('admin/general.create')</a></div>	
		</div>

		<!-- /.box-header -->
		<div class="box-body">
			<table id="table" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>@lang('admin/city.id')</th>
						<th>@lang('admin/city.name')</th>
						<th>@lang('admin/city.region')</th>
						<th>@lang('admin/city.lat')</th>
						<th>@lang('admin/city.long')</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $key => $value): ?>
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->getRegion->name}}</td>
							<td>{{ $value->lat }}</td>
							<td>{{ $value->long }}</td>
							<td>
								<a href="{{ route('admin.city.listDistrict',['id'=>$value->id]) }}" class="btn btn-xs btn-info">@lang('admin/city.lis_district')</a>
								<a href="{{ route('admin.city.edit',['id'=>$value->id]) }}" class="btn btn-xs btn-warning">@lang('admin/general.edit')</a>	
								<a onclick="confirmDelete({{$value->id}})" class="btn btn-xs btn-danger">@lang('admin/general.remove')</a>
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
</div>
@endsection

@section('scripts')
<!-- DataTables -->
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">
	function confirmDelete(id) {
		$.ajax({
			url : '{{ route("admin.city.getUrlDelete") }}',
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