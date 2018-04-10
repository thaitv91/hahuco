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
			{{ method_field('PUT') }}
				<div class="box-body">
					<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">Page</label>
						<div class="col-md-8">
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
					</div>
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
                        <label class="col-md-2 col-md-offset-1">Thumbnail</label>
						<div class="col-md-8">
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
               		</div>
               		<div class="form-group row">
						<label  class="col-md-2 col-md-offset-1" for="name">Template</label>
						<div class="col-md-8">
							<input type="text" class="form-control" name="template" id="template" value="{{ $data->template }}">
							@if($errors->has('template'))
		                            <span class="help-block">
		                                <strong class="text-danger">{{$errors->first('template')}}</strong>
		                            </span>
		                    @endif
						</div>
					</div>
	
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="{{ route('admin.pageCategory.index') }}" type="submit" class="btn btn-default">Back</a>
					</div>
				</div>
		</form>
	</div>
	<!-- /.box -->
</div>
@endsection
@section('scripts')
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
 	$("#thumbnail").change(function() {
  	readURL(this);
	});
</script>
@endsection