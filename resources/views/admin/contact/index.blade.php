@extends('layouts.admin')

@section('title')

@endsection

@section('content')
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<div class="col-md-12"><h3 class="box-title">@lang('admin/contact.contact')</h3></div>
		</div>
		<!-- /.box-header -->
		<div class="col-md-12">
			<div class="box-body">
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>@lang('admin/contact.id')</th>
							<th>@lang('admin/contact.name')</th>
							<th>@lang('admin/contact.email')</th>
							<th>@lang('admin/contact.phone')</th>
							<th>@lang('admin/contact.content')</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($contacts as $key => $contact): ?>
							<tr>
								@if ($contact->status == 0)
								<td><b>{{ $key+1 }}</b></td>
								<td><b>{{ $contact->name }}</b></td>
								<td><b>{{ $contact->email }}</b></td>
								<td><b>{{ $contact->phone }}</b></td>
								<td><b>{{ $contact->content }}</b></td>
								@else
								<td>{{ $key+1 }}</td>
								<td>{{ $contact->name }}</td>
								<td>{{ $contact->email }}</td>
								<td>{{ $contact->phone }}</td>
								<td>{{ $contact->content }}</td>
								@endif
								<td>
									<a href="{{ route('admin.contact.show',['id'=>$contact->id]) }}" class="btn btn-xs btn-info">@lang('admin/general.view')</a>
									<a onclick="confirmDelete('{{ route('admin.contact.remove',['id'=>$contact->id]) }}')" class="btn btn-xs btn-danger">@lang('admin/general.remove')</a>
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