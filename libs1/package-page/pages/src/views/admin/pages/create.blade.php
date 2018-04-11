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
				<div class="col-md-8">
					<div class="box-body">
						<div class="form-group margin-bottom-30">
							<label  class="" for="name">Title</label>
							<input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
							@if($errors->has('title'))
							<span class="help-block">
								<strong class="text-danger">{{$errors->first('title')}}</strong>
							</span>
							@endif
						</div>
						<div class="form-group margin-bottom-30">
							<label  class="" for="content">Content</label>
							<textarea class="form-control my-editor" rows="15" id="content" name="content"></textarea>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box-body">
						<div class="form-group margin-bottom-30">
							<label  class="" for="name">Category</label>
							<select class="selectpicker form-control" id="page_categoryid" name="page_categoryid" title="Choose one of the following..." data-live-search="true" tabindex="-98">
								<option disabled selected></option>
								@if(count($page_category)!=0)
								@foreach($page_category as $db_page_category)
								<option value="{{$db_page_category->id}}" data-tokens="{{$db_page_category->name}}" >{{$db_page_category->name }} </option>
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
							<img id="previewHolder" alt="" width="170px" height="100px"/>
							@if($errors->has('thumbnail'))
							<span class="help-block">
								<strong class="text-danger">{{$errors->first('thumbnail')}}</strong>
							</span>
							@endif
						</div>
						<div class="form-group margin-bottom-30">
							<label  class="" for="name">Template</label>
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
						<div class="form-group margin-bottom-30">
							<button type="submit" class="btn btn-primary">Submit</button>
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