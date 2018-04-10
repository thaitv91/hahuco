@extends('layouts.admin')

@section('title')
@endsection

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
	p { margin-top:0; font-size:0.97em; }

	ul, li {
		list-style-type:none;
		color:#fff;
	}

	#sortable li:hover {
		cursor: pointer;
		background: #bce8f1;
	}

	li div {
		padding:7px;
		background-color:#f9f9f9;
	}

	li, ul, div { border-radius: 3px; }

	#sTree2, #sTreePlus { margin:10px auto; }

	.btn-xs {
		margin-right: 5px;
		color: white !important;
	}

	#sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
	#sortable li { margin: 3px 3px 3px 3px; padding: 0.4em; padding: 10px 1.5em;}
	#sortable li span { position: absolute; margin-left: -1.3em; }
</style>
@endsection

@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">Edit</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="col-md-12">
				<div class="box-body">
					<ul class="listsClass" id="sortable">
						@if($fields)
						@foreach ($fields as $key => $field)
						<li class="ui-state-default" data-slug="{{ $field->slug }}">
							<?php 
							 	if($field->type == 'file')
								$name = $field->slug;
								$id = $field->id;
							 ?>
							{!! $field->render() !!}
						</li>
						@endforeach	
						@endif	
					</ul>	
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<div class="box-footer">
			</div>
		</form>
	</div>
	<!-- /.box -->
</div>

@endsection
@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$.ajaxSetup({
		 headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
	});

	$( "#sortable" ).sortable({
		stop : function( event, ui ) {
			//Get order of children
			var sortedIDs = $( "#sortable" ).sortable( "toArray" , {attribute: 'data-order'});
			var items = $('#sortable').children();
			var order = [];
			
			$.each(items, function(index, value) {
				order.push($(value).data('slug'));
			});

			updateOrder(order);
		}
	});

	function updateOrder(order) {
		$.ajax({
			type : "POST",
			url : "{{ route('admin.template.updateOrder') }}",
			data : {order : order}
		});
	}
</script>
<script type="text/javascript">
   	function readURL(input) {
  		if (input.files && input.files[0]) {
		    var reader = new FileReader();
		    reader.onload = function(e) {
		      var id = {{isset($id)?'-'.$id:''}};
		      $('#previewHolder'+id).attr('src', e.target.result);
		    }

		    reader.readAsDataURL(input.files[0]);
		    console.log(reader);
  		}
	}
 	$("#<?php if(isset($field) && $field->type == 'file'){ echo $name;} ?>").change(function() {
  	readURL(this);
	});
  </script>
  @endsection