@extends('layouts.admin')
@section('title')
@endsection

@section('content')
<div class="col-md-12">
	<div class="page-title">
		<div class="title_left">
			<h3>Menu</h3>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="clearfix"></div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel box box-primary">
				<!-- X-title -->
				<div class="x_title box-header with-border">
					<div class="col-md-6">
						<h4>List</h4>
					</div>
					<div class="col-md-6">
						<a href="{{ route('menu_manager.create') }}" class="btn btn-primary pull-right">Create</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- X-title -->

				<!-- X-content -->
				<div class="x_content box-body">
					<div id="create-menu" class="col-md-12">
						<table class="table">
							<thead>
								<th>ID</th>
								<th>Name</th>
								<th></th>
							</thead>
							<tbody>
								@foreach($menus as $key => $menu)
								<tr>
									<td>{{ $key+1 }}</td>
									<td>{{ $menu->name }}</td>
									<td>
										<a href="{{ route('menu_manager.editMenu', ['menu_id'=>$menu->id]) }}" class="btn btn-info btn-xs">Edit Menu</a>
										<a href="{{ route('menu_manager.editMenuItem', ['menu_item_id'=>$menu->id]) }}" class="btn btn-warning btn-xs">Edit Item</a>
										<a href="#" class="btn btn-danger btn-xs btn-remove" onclick="showModalDelete('{{ route('menu_manager.removeMenu', ['id'=>$menu->id]) }}'); return false;">Remove</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- X-content -->
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	function showModalDelete(url) {
		$('#link-delete').attr('href', url);
		$('#modal-delete').modal('show');
	}

	$('#link-delete').on('click', function(e) {
		e.preventDefault();
		var url = $(this).attr('href');
		$.ajax({
			url : url,
			type : 'POST'
		}).done(function(status) {
			if (status == 1) {
				toastr.success('Remove item success');
			} else {
				toastr.error('Remove item error');
			}
			$('#modal-delete').modal('hide');
			location.reload();
		});
	});
</script>
@endsection
