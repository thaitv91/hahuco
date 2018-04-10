@extends('layouts.admin')

@section('title')

@endsection

@section('content')
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<div class="col-md-12"><h3 class="box-title">@lang('admin/email.email')</h3></div>
		</div>
		<!-- /.box-header -->
		<div class="col-md-12">
			<div class="box-body">
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>@lang('admin/email.id')</th>
							<th>@lang('admin/email.email')</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($emails as $key => $email): ?>
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $email->email }}</td>
								<td>
									<a onclick="confirmDelete('{{ route('admin.email_registration.remove',['id'=>$email->id]) }}')" class="btn btn-xs btn-danger">@lang('admin/general.remove')</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="box-footer">

		</div>
		<!-- /.box-body -->
	</div>
</div>
<!-- /.box -->
<form method="POST" id="form-remove">
	{{ csrf_field() }}
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
					<button type="submit" class="btn btn-danger">@lang('admin/general.remove')</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin/general.close')</button>
				</div>
			</div>

		</div>
	</div>
</form>
@endsection

@section('scripts')

<!-- DataTables -->
<script type="text/javascript">
	function confirmDelete(url) {
		$('#form-remove').attr('action', url);
		$('#modal-delete').modal('show');
	}
</script>
@endsection