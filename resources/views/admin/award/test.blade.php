@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
	ul, li {
		list-style-type:none;
		color:#fff;
		/*border:1px solid #3f3f3f;*/
	}

	/*ul, #sTree2, #sTreePlus { padding:0; background-color:#151515; }*/
	/*.x_content ul, #sTree2, #sTreePlus { padding:0; background-color:#151515; }*/
	.x_content ul, #sTree2, #sTreePlus { padding:0; background-color:#ecf0f5; }

	#sTree2 li{
		padding-left:50px;
		margin:5px; border:1px solid #f3f3f3;
		/*margin:5px; border:1px solid #3f3f3f;*/
		/*background-color:#3f3f3f;*/
		background-color:#f3f3f3;
	}

	.x_content ul, .x_content li {
		/*border:1px solid #3f3f3f;*/
		border:1px solid #ecf0f5;
		color : #333;
		/*color : #fff;*/
	}

	li div {
		padding:7px;
		background-color:#f9f9f9;
		/*background-color:#555;*/
	}

	li, ul, div { border-radius: 3px; }

	#sTree2, #sTreePlus { margin:10px auto; }

	.btn-xs {
		margin-right: 5px;
	}

	#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
	#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
	#sortable li span { position: absolute; margin-left: -1.3em; }
</style>
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
						<h4>Award</h4>
					</div>
					<div class="col-md-6">
						<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-create">Create</button>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- X-title -->

				<!-- X-content -->
				<div class="x_content box-body">
					<div class="col-md-12">
						<ul class="sTree2 listsClass" id="sortable">
							<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li>
							<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>
							<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>
							<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</li>
							<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</li>
							<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</li>
							<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</li>
						</ul>
					</div>
				</div>
				<!-- X-content -->

				<!-- X-footer -->
				<div class="box-footer">
						<!-- <a href="{{ route('menu_manager') }}" class="btn btn-default">Back</a> -->
				</div>
				<!-- X-footer -->
			</div>
		</div>
	</div>
</div>
<!-- Modal create-->
<form id="form-create-menu-item">
<div id="modal-create" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Create</h4>
			</div>
			
				<input type="hidden" name="menu_id" value="">
				<div class="modal-body">
					<div class="row">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Name <span class="required">*</span>
							</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="name" id="name" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"> Li Class </label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="li_class" id="li_class" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"> Icon </label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="icon" id="icon" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="queue"> Link * </label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="link" id="link" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"> Link Class </label>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<input type="text" name="a_class" id="a_class" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
					</div>
				</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<!-- <button type="submit" class="btn btn-success hidden"></button> -->
				<!-- <a href="" id="create-menu-item"  class="btn btn-primary" >Accept</a> -->
				<button type="submit" class="btn btn-primary">Accept</button>
			</div>
		</div>
	</div>
</div>
</form>
<!-- Modal edit-->
<form id="form-edit-menu-item">
	<div id="modal-edit" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit</h4>
				</div>
					<input type="hidden" name="item_id" id="edit-menu-item-id">
					<div class="modal-body">
						<div class="row">
							<div class="form-group">
								<label for="status" class="control-label col-md-3 col-sm-3 col-xs-12"> Status <span class="required">*</span></label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select id="edit-menu-item-status" class="form-control col-md-7 col-xs-12" name="status" required>
										<option value="0">Hide</option>
										<option value="1">Show</option>
									</select>
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Name <span class="required">*</span>
								</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" name="name" id="edit-menu-item-name" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"> Li Class </label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" name="li_class" id="edit-menu-item-li-class" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"> Icon </label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" name="icon" id="edit-menu-item-icon" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"> Link * </label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" name="link" id="edit-menu-item-link" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<br><br>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"> Link Class </label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" name="a_class" id="edit-menu-item-a-class" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<!-- <a href="" id="update-menu-item"  class="btn btn-primary" >Update</a> -->
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection

@section('scripts')
<script src="/packages/menu-manager/js/jquery-sortable-lists.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$.ajaxSetup({
		 headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
	});

	$( "#sortable" ).sortable();
	$( "#sortable" ).disableSelection();

	$('#form-create-menu-item').on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url : '{{ route("menu_manager.createMenuItem") }}',
			data : $('#form-create-menu-item').serialize(),
			type : 'GET'
		}).done(function (item) {
			if (item == 0) {
				toastr.error('Name cannot be null');

				return false;
			}

			var li = $('<li>', {
				id : item.id,
			}).appendTo($('#sTree2'));

			var div = $('<div>').appendTo(li);

			var span_name = $('<span>', {
				text : item.name,
				class : 'item_name',
				id : 'item_name_'+item.id
			}).appendTo(div);

			if (item.status == 0) {
				$('<i>', {text:' (Hidden)'}).appendTo(span_name);
			}

			var span_link = $('<span>', {
				id : 'item_link_'+item.id,
				text : ' - ('+item.link + ')'
			}).appendTo(div);

			var a = $('<a>', {
				text : 'Remove',
				class : 'btn btn-danger btn-xs clickable pull-right remove-menu-item',
				href : item.detailMenuItemUrl
			}).appendTo(div);

			var a = $('<a>', {
				text : 'Edit',
				class : 'btn btn-warning btn-xs clickable pull-right edit-menu-item',
				href : item.detailMenuItemUrl
			}).appendTo(div);
		});
		// $('#form-create-menu-item')[0].reset();
		$('#modal-create').modal('hide');
		toastr.success('Create success');
	});

	$('#modal-create').on('hidden.bs.modal', function () {
		$('#form-create-menu-item')[0].reset();
	});

	$(document).on('click','.edit-menu-item', function(e) {
		e.preventDefault();
		var url = $(this).attr('href');
		$.ajax({
			url : url,
			type : 'GET'
		}).done(function (item) {
			if (item) {
				$('#edit-menu-item-status').val(item.status);
				$('#edit-menu-item-name').val(item.name);
				$('#edit-menu-item-li-class').val(item.li_class);
				$('#edit-menu-item-icon').val(item.icon);
				$('#edit-menu-item-link').val(item.link);
				$('#edit-menu-item-a-class').val(item.a_class);
				$('#edit-menu-item-id').val(item.id);
				$('#modal-edit').modal('show');
			} else {
				alert('Error');
			}
		});
	});

	$('#form-edit-menu-item').on('submit', function(e) {
		e.preventDefault();
		$.ajax({
			url : "{{ route('menu_manager.updateMenuItem') }}",
			data : $('#form-edit-menu-item').serialize() ,
			type : 'POST'
		}).done(function(item) {
			if (item == 0) {
				toastr.error('Name cannot be null');
				return false;
			}

			$('#item_name_'+item.id).find('i').remove();
			$('#item_name_'+item.id).text(item.name);
			$('#item_link_'+item.id).text(' - ('+item.link+')');
			if (item.status == 0) {
				$('<i>', {text:' (Hidden)'}).appendTo($('#item_name_'+item.id));
			}
			toastr.success('Update success');
		});
		$('#modal-edit').modal('hide');
	})

	$(document).on('click', '#update-menu-item' ,function(e) {
		e.preventDefault();
		$.ajax({
			url : "{{ route('menu_manager.updateMenuItem') }}",
			data : $('#form-edit-menu-item').serialize() ,
			type : 'POST'
		}).done(function(item) {
			if (item == 0) {
				toastr.error('Name cannot be null');
				return false;
			}

			$('#item_name_'+item.id).find('i').remove();
			$('#item_name_'+item.id).text(item.name);
			$('#item_link_'+item.id).text(' - ('+item.link+')');
			if (item.status == 0) {
				$('<i>', {text:' (Hidden)'}).appendTo($('#item_name_'+item.id));
			}
		});
		$('#modal-edit').modal('hide');
	});

	$(document).on('click', '.remove-menu-item' ,function(e) {
		e.preventDefault();
		var url = $(this).attr('href');
		$.ajax({
			url : url,
			type : 'GET'
		}).done(function (item) {
			if (item != 0) {
				$('#link-delete').attr('menu-item-id', item.id);
				$('#modal-delete').modal('show');
			} else {
				alert('Error');
			}
		});
	});

	$('#link-delete').on('click', function(e) {
		e.preventDefault();
		var menu_item_id = $(this).attr('menu-item-id');

		$.ajax({
			url : "{{ route('menu_manager.removeMenuItem') }}",
			data : {menu_item_id : menu_item_id},
			type : 'POST'
		}).done(function(status) {
			if (status == 0) {
				alert('Remove item error');
			} else {
				$('#'+menu_item_id).remove();
				toastr.success('Remove success');
			}
		});
		$('#modal-delete').modal('hide');
	});
</script>
@endsection
