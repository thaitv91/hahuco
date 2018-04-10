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
		<div class="col-md-11"><h3 class="box-title">Template</h3></div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="table" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Template</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list_view as $key => $value): ?>
					<tr>
						<td>{{ $key+1 }}</td>
						<td>{{ substr($value, 0,-10) }}</td>
						<td>
							<a href="{{ route('admin.template.listField',['template'=>substr($value, 0,-10)]) }}"
								class="btn btn-success btn-xs" 
							>Fields</a>
							<a href="{{ route('admin.template.listPage',['template'=>substr($value, 0,-10)]) }}"
								class="btn btn-info btn-xs" 
							>List Page</a>
							<a href="{{ route('admin.template.edit',['template'=>substr($value, 0,-10)]) }}" class="btn btn-xs btn-warning">Edit</a>	
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

@endsection

@section('scripts')
<!-- DataTables -->
@endsection