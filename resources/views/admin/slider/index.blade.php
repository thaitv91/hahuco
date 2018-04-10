@extends('layouts.admin')

@section('title')

@endsection

@section('content')
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
			<div class="col-md-11"><h3 class="box-title">@lang('admin/slider.slider')</h3></div>
			<div class="col-md-1"><a href="{{ route('admin.slider.create') }}" class="btn btn-xs btn-primary">@lang('admin/general.create')</a></div>	
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="example2" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>@lang('admin/slider.id')</th>
						<th>@lang('admin/slider.name')</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($sliders as $key => $slider): ?>
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $slider->name }}</td>
							<td>
								<a href="{{ route('admin.slider.edit',['slug'=>$slider->slug]) }}" class="btn btn-xs btn-warning">@lang('admin/general.edit')</a>
								<a onclick="confirmDelete('{{ route('admin.slider.delete',['slug'=>$slider->slug]) }}')" class="btn btn-xs btn-danger">@lang('admin/general.remove')</a>
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
<!-- <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script> -->
<!-- <script src="{{ url('plugins/datatables/dataTables.bootstrap.min.js') }}"></script> -->
<script type="text/javascript">
	function confirmDelete(url) {
		$('#modal-delete a').attr('href',url);
		$('#modal-delete').modal('show');
	}
</script>
@endsection