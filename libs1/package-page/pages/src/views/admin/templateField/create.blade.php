@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">Create</h3>
		</div>
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">Title</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
							@if($errors->has('title'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('title')}}</strong>
		                            </span>
		                    @endif
						</div>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">Type</label>
						<div class="col-md-8">
							<select class="form-control typeSelect" id="type" name="type">
								<option value=""></option>
							    <option value="text">Text</option>
							    <option value="textarea">Textarea</option>
							    <option value="checkbox">Checkbox</option>
							    <option value="select">Select</option>
							    <option value="radio">Radio</option>
							    <option value="file">File</option>
							    <option value="object">Object</option>
							    <option value="widget">Widget</option>
							  </select>
							  @if($errors->has('type'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('type')}}</strong>
		                            </span>
		                    @endif
	                    </div>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="content">Content</label>
						<div class="col-md-8">
							<div id="default" class="hide">
								<textarea class="form-control" rows="5" id="content" name="content" disabled></textarea>  
							</div>
							<div id="selectBox" class="hide">
								<input type="file" name="content" value="" id="content-select" class="required" disabled>
							</div>
							<div id="file_div" class="hide">
									<input type="file" name="content" value="" id="content-file" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg" disabled>
			                          <img id="previewHolder" alt="" width="170px" height="100px"/>
							</div>
							<div id="object-field"></div>
							<div id="widget-field"></div>
							@if($errors->has('content'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('content')}}</strong>
		                            </span>
		                    @endif
						</div>  
					</div>
					
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">Template</label>
						<div class="col-md-8">
							<select class="form-control " id="template" name="template">
                              @if(count($list_view)!=0)
                                  @foreach($list_view as $db_list_view)
                                  <option @if($db_list_view == 'default.blade.php') selected @endif value="{{substr($db_list_view, 0,-10)}}" data-tokens="{{$db_list_view}}" >{{ substr($db_list_view, 0,-10)}} </option>
                                  @endforeach
                               @endif
                              @if(count($list_view)==0)
                              <option value=""><em>(Don't have)</em></option>
                             @endif
                           </select>
						</div>
					</div>

				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="{{ route('admin.templateField.index') }}" type="submit" class="btn btn-default">Back</a>
					</div>
				</div>
		</form>
	</div>
	<!-- /.box -->
</div>
@endsection
@section('scripts')
	<script type="text/javascript">

		$('.typeSelect').on('change', function() {
		// $(document).on('change', $('.typeSelecte'), function() {	
			// $('.data-edit').addClass('hide');
			var type = $('#type').val();
			if(type == 'select' || type == 'checkbox' || type == 'radio'){
				$('#default').addClass('hide');
				$('#file_div').addClass('hide');
				$('#selectBox').removeClass('hide');
				$('#content').prop("disabled", true)
				$('#content-file').prop("disabled", true);
				$('#content-select').prop("disabled", false);
				$('#object-field').empty();
				$('#widget-field').empty();
			}else if(type == 'file'){
				$('#selectBox').addClass('hide');
				$('#default').addClass('hide');
				$('#file_div').removeClass('hide');
				$('#content-select').prop("disabled", true);
				$('#content').prop("disabled", true);
				$('#content-file').prop("disabled", false);
				$('#object-field').empty();
				$('#widget-field').empty();
			}else if(type == 'object'){
				$('#default').addClass('hide');
				$('#selectBox').addClass('hide');
				$('#content-file').prop("disabled", true);
				$('#file_div').addClass('hide');
				$('#content-select').prop("disabled", true);
				$('#content').prop("disabled", false);
				$('#object-field').empty();
				$('#widget-field').empty();
				var div = $('<div>', {
					class : 'form-group'
				}).appendTo('#object-field');
				$('<select>', {
					class : 'form-control',
					name : 'model_name',
					id : 'model-name',
					required : true
				}).appendTo(div);
				$('<option>', {
					value : '',
					// disabled : true;
					text : 'Select a model'
				}).appendTo('#model-name');

				var div = $('<div>', {
					class : 'form-group'
				}).appendTo('#object-field');
				$('<select>', {
					class : 'form-control',
					name : 'order_by',
					id : 'order-by',
					// required : true
				}).appendTo(div);
				$('<option>', {
					value : '',
					text : 'Select a field to order by'
				}).appendTo('#order-by');

				var div = $('<div>', {
					class : 'form-group'
				}).appendTo('#object-field');
				$('<input>', {
					class : 'form-control',
					name : 'limit',
					id : 'limit',
					type : 'number', 
					placeholder : 'Limit'
				}).appendTo(div);

				$.ajax({
					url : '{{ route("admin.templateField.getModels") }}',
					type : 'GET'
				}).done(function(data) {
					$.each(data, function(index, value) {

						$('<option>', {
							value : value,
							text : value,
						}).appendTo('#model-name');
					});
				});

				$('#model-name').on('change', function() {
					var modelName = $(this).val();
					$('#order-by').empty();
					$('<option>', {
						value : '',
						// disabled : true,
						selected : true,
						text : 'Select a field to order by'
					}).appendTo('#order-by');
					$.ajax({
						url : '{{ route("admin.templateField.getColumns") }}',
						type : 'GET',
						data : {modelName : modelName}
					}).done(function(data) {
						$.each(data, function(index, value) {
							$('<option>', {
								value : value,
								text : value
							}).appendTo('#order-by');
						});
					});
				});
			} else if(type == 'widget'){
				$('#default').addClass('hide');
				$('#selectBox').addClass('hide');
				$('#content-file').prop("disabled", true);
				$('#file_div').addClass('hide');
				$('#content-select').prop("disabled", true);
				$('#content').prop("disabled", false);
				$('#object-field').empty();
				$('#widget-field').empty();

				var div = $('<div>', {
					class : 'form-group'
				}).appendTo('#widget-field');
				$('<select>', {
					class : 'form-control',
					name : 'widget_name',
					id : 'widget-name',
					required : true
				}).appendTo(div);
				$('<option>', {
					value : '',
					disabled : true,
					text : 'Select a widget',
					selected: true
				}).appendTo('#widget-name');

				$.ajax({
					url : '{{ route("admin.templateField.getWidgets") }}',
					type : 'GET'
				}).done(function(data) {
					$.each(data, function(index, value) {
						$('<option>', {
							value : value,
							text : value,
						}).appendTo('#widget-name');
					});
				});
			} else {
				$('#selectBox').addClass('hide');
				$('#default').removeClass('hide');
				$('#content-file').prop("disabled", true);
				$('#file_div').addClass('hide');
				$('#content-select').prop("disabled", true);
				$('#content').prop("disabled", false);
				$('#object-field').empty();
				$('#widget-field').empty();
			}
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
		    console.log(reader);
  		}
	}
 	$("#content-file").change(function() {
  	readURL(this);
	});
</script>
@endsection