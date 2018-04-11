@extends('layouts.admin')

@section('title')

@endsection

@section('content')
<div class="col-md-12">
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">Edit</h3>
		</div>
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="col-md-8">
				<div class="box-body">
					<div class="form-group margin-bottom-30">
						<label  class="" for="name">Title</label>
						<input type="text" class="form-control" name="title" id="title" value="{{ $data->title }}">
						@if($errors->has('title'))
						<span class="help-block">
							<strong class="text-danger">{{$errors->first('title')}}</strong>
						</span>
						@endif
					</div>
               		<div class="form-group margin-bottom-30">
               			<label  class="" for="content">Content</label>
               			<textarea class="form-control my-editor" rows="15" id="content" name="content">{!! $data->content !!}</textarea>
					</div>
					<div id = "template-ajax" class="">
						@if($fields)
						@foreach ($fields as $key => $field)
						<?php 
						if($field->type == 'file')
							$name = $field->slug;
						$id = $field->id;
						?>
						{!! $field->renderPage() !!}
						@endforeach	
						@endif	
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box-body">
					<div class="form-group margin-bottom-30">
						<label  class="" for="name">Category</label>
						<select class="selectpicker " id="page_categoryid" name="page_categoryid" title="Choose one of the following..." data-live-search="true" tabindex="-98">
							<option disabled selected></option>
							@if(count($page_category)!=0)
							@foreach($page_category as $db_page_category)
							<option @if($db_page_category->id == $data['page_categoryid']) selected @endif value="{{$db_page_category->id}}" data-tokens="{{$db_page_category->name}}" >{{$db_page_category->name }} </option>
							@endforeach 
							@endif
							@if(count($page_category)==0)
							<option value=""><em>(Don't have)</em></option>
							@endif
						</select>
						@if($errors->has('page_categoryid'))
						<span class="help-block">
							<strong class="text-danger">{{$errors->first('page_categoryid')}}</strong>
						</span>   
						@endif
					</div>
					<div class="form-group margin-bottom-30">
						<label class="">Thumbnail</label>
						<input type="file" name="thumbnail" value="" id="thumbnail" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
						<img id="previewHolder" alt="" width="170px" height="100px" src="{{ asset($data->thumbnail) }}" />
						<div class="col-md-8">
							@if($errors->has('thumbnail'))
							<span class="help-block">
								<strong class="text-danger">{{$errors->first('thumbnail')}}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group margin-bottom-30">
						<label  class="" for="name">Template</label>
						<select class="form-control " id="template" name="template">
							@if(count($list_view)!=0)
							@foreach($list_view as $db_list_view)
							<option @if(substr($db_list_view, 0,-10) == $data['template']) selected @endif value="{{substr($db_list_view, 0,-10)}}" >{{ substr($db_list_view, 0,-10)}} </option>
							@endforeach
							@endif
							@if(count($list_view)==0)
							<option value=""><em>(Don't have)</em></option>
							@endif
						</select>
					</div>
					<div class="form-group margin-bottom-30">
						<button type="submit" class="btn btn-primary">Update</button>
						<a href="{{ route('admin.pages.index') }}" type="submit" class="btn btn-default">Back</a>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
			</div>
		</form>
	</div>
	<!-- /.box -->
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$.ajaxSetup({
		 headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')}
	});
</script>
<script type="text/javascript">
   	function readURL(input) {
  		if (input.files && input.files[0]) {
		    var reader = new FileReader();
		    reader.onload = function(e) {
		      $('#previewHolder').attr('src', e.target.result);
		    }

		    reader.readAsDataURL(input.files[0]);
  		}
	}
 	$("#thumbnail").change(function() {
  	readURL(this);
	});
</script>

<script type="text/javascript">
	$('#template').on('change', function() {
            var data_select = $( "#template option:selected" ).val();
            var _token = $(this).attr('_token');
            var id = {{ $data['id']}};
            $.ajax({
                dataType: 'html',
                type: 'GET',
                url: '{{ route("admin.pages.changeTemplate") }}',
                data: {data_select: data_select, _token: _token, id :id},

                success: function (data) {
                    $('#template-ajax').empty();
                    $('#template-ajax').append(data);
                    filterOrderBy();
                }
            });
        });
</script>

<script type="text/javascript">
	filterOrderBy();
	function filterOrderBy() {
		$('.model-name').on('change', function() {
			var page_field_id = $(this).data('page-field-id');
			var order_by_field = $('#order-by-'+page_field_id);
			var modelName = $(this).val();
			order_by_field.empty();
			$('<option>', {
				value : '',
				disabled : true,
				selected : true,
				text : 'Select a field to order by'
			}).appendTo(order_by_field);
			$.ajax({
				url : '{{ route("admin.templateField.getColumns") }}',
				type : 'GET',
				data : {modelName : modelName}
			}).done(function(data) {
				$.each(data, function(index, value) {
					$('<option>', {
						value : value,
						text : value,
					}).appendTo(order_by_field);
				});
			});
		});
	}
</script>
@endsection