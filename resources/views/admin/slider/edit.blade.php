@extends('layouts.admin')

@section('title')

@endsection

@section('styles')
<link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/slider.edit')</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-8 col-md-offset-2">
				<div class="box-body">
					<div class="form-group">
						<label for="name">@lang('admin/slider.name') <span style="color: red">*</span></label>
						<input type="text" class="form-control" name="name" id="name" value="{{ $slider->name }}">
						@if($errors->has('name'))
                            <span class="help-block">
                                <strong style="color: red;">{{$errors->first('name')}}</strong>
                            </span>   
                        @endif
					</div>
                    <div class="form-group">
                        <label for="name">@lang('admin/slider.slug') <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="slug" id="slug" value="{{ $slider->slug }}">
                        @if($errors->has('slug'))
                            <span class="help-block">
                                <strong style="color: red;">{{$errors->first('slug')}}</strong>
                            </span>   
                        @endif
                    </div>
					<div class="form-group">
						<label for="name">@lang('admin/slider.image') <span style="color: red">*</span></label>
						<div class="dropzone" id="dz">
							<div class="fallback">
								<input name="file" type="file" multiple />
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
            <div class="clearfix"></div>
			<div class="box-footer">
				<div class="form-group col-md-8 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">@lang('admin/general.update')</button>
                    <a href="{{ route('admin.slider') }}" class="btn btn-default">@lang('admin/general.back')</a>
                </div>
			</div>
		</form>
	</div>
	<!-- /.box -->
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/dropzone.min.js') }}"></script>
<script type="text/javascript">
	$.ajaxSetup({
		headers : {
			'X-CSRF-TOKEN': "{{ csrf_token() }}",
		}
	});
</script>
<script type="text/javascript">
	Dropzone.options.dz = {
        url : '{{ route("admin.slider.uploadImage") }}',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        minFiles : 1,
        acceptedFiles : 'image/jpeg, images/jpg, image/png',
        init : function(){
            var fileList = new Array;
            var fileList_count = 0;
            var thisDropzone = this;

            this.on("removedfile", function(file) {
                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.slider.removeImage") }}',
                    data : {
                        _token: $('input[name = "_token"]').val(), 
                        name: file.serverFileName,
                        id : {{$slider->id}}
                    }
                }).done(function(data){

                    if(data == -1){//New Image
                        var index = fileList.indexOf(file);
                        delete fileList[index];
                        var img_info_id = "img_info"+index;
                        $("#"+img_info_id).remove();
                    }else{ //Old image
                        var img_info_id = "img_info"+fileList_count;
                        var hidden_data = '<input name = "img_info[]" type="hidden" value="1,' + file.serverFileName+'" id="'+img_info_id+'" />';
                        $('#form-edit').append(hidden_data);
                    }
                });
            } );
            this.on("success", function(file, serverFileName) {
                // Change the name of image
                var name = file.previewElement.querySelector("[data-dz-name]");
                name.dataset.dzName = serverFileName;
                name.innerHTML = serverFileName;
                file.serverFileName = serverFileName;
                // Add a image into list of images
                // fileList[fileList_count++] = file;
                fileList[++fileList_count] = file;
                // Append a div to save information for saving
                var img_info_id = "img_info"+fileList_count;
                var hidden_data = '<input name = "img_info[]" type="hidden" value="' + 0 +","+file.serverFileName+'" id="'+img_info_id+'" />';
                $('#form-edit').append(hidden_data);
            } );

            this.on("sending", function(file, xhr, formData){
                formData.append("_token", "{{ csrf_token() }}");
            });

            //Get images from databse
            $.ajax({
                url : '{{route("admin.slider.getImage")}}',
                data : {
                    id : {{$slider->id}},
                },
                type: 'GET',
            }).done(function(data){
                $.each(data,function(index,value){
                    var string = value.url.split('\\');
                    var img_folder = string[0];
                    var img_name = string[1];

                    var mockFile = { name: img_name, accepted: true, serverFileName:img_name };
                    thisDropzone.emit("addedfile", mockFile);
                    thisDropzone.emit("success", mockFile);
                    thisDropzone.emit("complete", mockFile);
                    thisDropzone.files.push(mockFile);
                    thisDropzone.createThumbnailFromUrl(mockFile, value.path);
                    var name = mockFile.previewElement.querySelector("[data-dz-name]");
                    name.dataset.dzName = img_name;
                    name.innerHTML = img_name;
                    mockFile.serverFileName = img_name;
                });
            });

        }//Init function
    };//Dropzoen
</script>
<script type="text/javascript">
    $('#name').keyup(function() {
        var name = $(this).val();
        var slug = getSlug(name);
        $('#slug').val(slug);
    });

    $('#name').on('change', function() {
        var name = $(this).val();
        var slug = getSlug(name);
        $('#slug').val(slug);
    });

    function getSlug(name) {
        var slug;

        //Đổi chữ hoa thành chữ thường
        slug = name.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        return slug;
    }
</script>
@endsection