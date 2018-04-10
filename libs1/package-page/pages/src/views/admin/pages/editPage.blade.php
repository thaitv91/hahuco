@extends('layouts.admin')

@section('title')

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