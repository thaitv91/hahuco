@extends('layouts.admin')

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

	.x_content ul, #sTree2, #sTreePlus { padding:0; background-color:#ecf0f5; }
	/*.x_content ul, #sTree2, #sTreePlus { padding:0; background-color:#3c8dbc; }*/

	#sTree2 li{
		padding-left:50px;
		margin:5px; border:1px solid #f3f3f3;
		background-color:#f3f3f3;
	}

	.x_content ul, .x_content li {
		border:1px solid #f3f3f3;
		/*border:1px solid #3c8dbc;*/
		color : #333;
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
	#sortable li { margin: 3px 3px 3px 3px; padding: 0.4em; padding: 10px 1.5em; font-size: 1.4em; }
	#sortable li span { position: absolute; margin-left: -1.3em; }
</style>
@endsection

@section('content')
<div class="col-md-12">
	<div class="clearfix"></div>
	<div class="row">
		<div class="clearfix"></div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel box box-primary">
				<!-- X-title -->
				<div class="x_title box-header with-border">
					<div class="col-md-6">
						<h4>@lang('admin/award.award')</h4>
					</div>
					<div class="col-md-6"> 
						<a class="btn btn-primary pull-right" href="{{ route('admin.award.create') }}">@lang('admin/general.create')</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- X-title -->

				<!-- X-content -->
				<div class="x_content box-body">
					<div class="col-md-12">
						<ul class="sTree2 listsClass" id="sortable">
							@foreach ($awards as $key => $award)
							<li class="ui-state-default" data-id="{{ $award->id }}">
								<div class="row">
									<div class="col-md-5">
										<img src="{{ asset($award->image) }}" class="img" height="75px">
									</div>
									<div class="col-md-3">
										{{ $award->name }}
									</div>
									<div class="col-md-4">
										<a onclick="removeItem('{{ route('admin.award.remove', ['slug'=>$award->slug]) }}'); return false;" 
										class="btn btn-danger btn-xs pull-right">@lang('admin/general.remove')</a>
										<a class="btn btn-warning btn-xs pull-right"  
										href="{{ route('admin.award.edit',['slug'=>$award->slug]) }}">@lang('admin/general.edit')</a>
									</div>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<!-- X-content -->

				<!-- X-footer -->
				<div class="box-footer">
				</div>
				<!-- X-footer -->
			</div>
		</div>
	</div>
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
				order.push($(value).data('id'));
			});
			updateOrder(order);
		}
	});

	function updateOrder(order) {
		$.ajax({
			type : "POST",
			url : "{{ route('admin.award.updateOrder') }}",
			data : {order : order}
		});
	}
</script>
@endsection
