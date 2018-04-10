@extends('layouts.admin')

@section('styles')
<style type="text/css">
	p { margin-top:0; font-size:0.97em; }

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
						<h4>{{ $menu->name }}</h4>
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
						<ul class="sTree2 listsClass" id="sTree2">
							<?php echo $html ;?>
						</ul>
					</div>
				</div>
				<!-- X-content -->

				<!-- X-footer -->
				<div class="box-footer">
						<a href="{{ route('menu_manager') }}" class="btn btn-default">Back</a>
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
			
				<input type="hidden" name="menu_id" value="{{ $menu->id }}">
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
<script type="text/javascript">
	$.ajaxSetup({
		 headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
	});

	var options = {

		onChange: function( cEl )
		{
			$.ajax({
				url : '{{ route("menu_manager.updateOrder") }}',
				data : { items : $('#sTree2').sortableListsToArray() }
			}).done(function (data) {
				if (!data) {
					toastr.error('Oops! Error, please refresh page and try again');
				} 
			});
		},
		complete: function( cEl )
		{
	            // console.log( $('#sTree2').sortableListsToArray());
	        },
	        isAllowed: function( cEl, hint, target )
	        {
				// Be carefull if you test some ul/ol elements here.
				// Sometimes ul/ols are dynamically generated and so they have not some attributes as natural ul/ols.
				// Be careful also if the hint is not visible. It has only display none so it is at the previouse place where it was before(excluding first moves before showing).
				if( target.data('module') === 'c' && cEl.data('module') !== 'c' )
				{
					hint.css('background-color', '#3c8dbc');
					// hint.css('background-color', '#ff9999');
					return false;
				}
				else
				{
					hint.css('background-color', '#3c8dbc');
					return true;
				}
			},
			opener: {
				active: true,
	            as: 'html',  // if as is not set plugin uses background image
	            close: '<i class="fa fa-minus c3"></i>',  // or 'fa-minus c3',  // or './imgs/Remove2.png',
	            open: '<i class="fa fa-plus"></i>',  // or 'fa-plus',  // or'./imgs/Add2.png',
	            openerCss: {
	            	'display': 'inline-block',
	                //'width': '18px', 'height': '18px',
	                'float': 'left',
	                'margin-left': '-35px',
	                'margin-right': '5px',
	                //'background-position': 'center center', 'background-repeat': 'no-repeat',
	                'font-size': '1.1em'
	            }
	        },
	        ignoreClass: 'clickable'
	    };

	// $('.sortableLists').sortableLists( options );
	$('#sTree2').sortableLists( options );

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
