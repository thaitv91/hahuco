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
				<div class="box-body">
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">Title</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="title" id="title" value="{{ $data->title }}">
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
							    <option @if($data->type == 'text') selected @endif value="text">Text</option>
							    <option  @if($data->type == 'textarea') selected @endif value="textarea">Textarea</option>
							    <option  @if($data->type == 'checkbox') selected @endif value="checkbox">Checkbox</option>
							    <option @if($data->type == 'select') selected @endif value="select">Select</option>
							    <option  @if($data->type == 'radio') selected @endif value="radio">Radio</option>
							    <option  @if($data->type == 'file') selected @endif value="file">File</option>
							    <option  @if($data->type == 'object') selected @endif value="object">Object</option>
							    <option  @if($data->type == 'widget') selected @endif value="widget">Widget</option>
							  </select>
	                    </div>
					</div>
               		<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="content">Content</label>
						<div class="col-md-8">
							<div class="data-edit">
								@if($data->type == 'select' || $data->type == 'radio' || $data->type == 'checkbox')
										<input type="file" onchange="changeFile()" name="content" value="" id="content-select1">
										@foreach(json_decode($data['content']) as $key => $value)
									    <p><div class="data-file">
									    	<label>Value: {{ $key }}</label>
									    	<input type="text" value="{{ $value }}" class="form-control" id="content" value="" size="20" />
									    </div>
										</p>
									    @endforeach
									
								@elseif($data->type == 'file')
										<input type="file" name="content" value="" id="content-file1" borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
				                         <img id="previewHolder" alt="" width="170px" height="100px" src="{{ asset($data->content) }}" />
				                   
				                @elseif($data->type == 'object')
			                		<div id="object-field">
										<div class="form-group">
											<select id="model-name" name="model_name" class="form-control">
												{{-- <option>Select a field to order by</option> --}}
												@foreach ($models as $key => $model)
													<option @if($model == $data_content->model_name) selected @endif value="{{ $model }}">{{ $model }}</option>
												@endforeach 
											</select>
										</div>

										<div class="form-group">
											<select id="order-by" name="order_by" class="form-control">
												<option value="">Select a field to order by</option>
												@foreach ($columns as $key => $column)
													<option @if($column == $data_content->order_by) selected @endif value="{{ $column }}">{{ $column }}</option>
												@endforeach 
											</select>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="limit" id="limit" value="{{ $data_content->limit }}">
										</div>
									</div>
								@elseif ($data->type == 'widget')
									<div id="widget-field">
										<div class="form-group">
											<select id="widget-name" name="widget_name" class="form-control">
												@foreach ($widgets as $key => $widget)
													<option @if($widget == $data->content) selected @endif value="{{ $widget }}">{{ $widget }}</option>
												@endforeach 
											</select>
										</div>
									</div>
								@else
									<textarea class="form-control" rows="5" id="content1" name="content">{!! $data->content !!}</textarea> 
								@endif
							</div>
							<div id="default" class="hide">
									<textarea class="form-control" rows="5" id="content" name="content" disabled></textarea>  
							</div>
							<div id="selectBox" class="hide">
								<input type="file" name="content" value="" id="content-select"  disabled>
							</div>
							<div id="file_div" class="hide">
									<input type="file" name="content" value="" id="content-file" borrowerImageFile" data-errormsg="PhotoUploadErrorMsg" disabled>
			                          <img id="previewHolder" alt="" width="170px" height="100px"/>
							</div>
							<div id="object-field">
							</div>
							<div id="widget-field">
							</div>
						</div>
					</div>
					
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">Template</label>
						<div class="col-md-8">
							<select class="form-control " id="template" name="template">
                              @if(count($list_view)!=0)
                                  @foreach($list_view as $db_list_view)
                                  <option @if(substr($db_list_view, 0,-10) == $data['template']) selected @endif value="{{substr($db_list_view, 0,-10)}}" data-tokens="{{$db_list_view}}" >{{ substr($db_list_view, 0,-10)}} </option>
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
		function changeFile(){
			$('.data-file').addClass('hide');
		};
		
		$('.typeSelect').on('change', function() {
			$('.data-edit').empty();
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
				$('#content').prop("disabled", true);
				$('#object-field').empty();
				$('#widget-field').empty();

				var div = $('<div>', {
					class : 'form-group'
				}).appendTo('#object-field');
				$('<select>', {
					class : 'form-control',
					name : 'model_name',
					id : 'model-name'
				}).appendTo(div);
				$('<option>', {
					value : '',
					selected : true,
					text : 'Select a model'
				}).appendTo('#model-name');

				var div = $('<div>', {
					class : 'form-group'
				}).appendTo('#object-field');
				$('<select>', {
					class : 'form-control',
					name : 'order_by',
					id : 'order-by'
				}).appendTo(div);
				$('<option>', {
					value : '',
					selected : true,
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
				fillColumn();
				
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

		fillColumn();

		function fillColumn() {
			$('#model-name').on('change', function() {
					var modelName = $(this).val();
					$('#order-by').empty();
					$('<option>', {
						value : '',
						disabled : true,
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
								text : value,
							}).appendTo('#order-by');
						});
					});
				});
		}
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