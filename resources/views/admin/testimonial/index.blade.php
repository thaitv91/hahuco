@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/testimonial.testimonial')</h3>
			<a href="{{ route('admin.testimonial.create') }}" class="pull-right btn btn-primary">@lang('admin/general.create')</a>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-12">
				<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<th>@lang('admin/testimonial.id')</th>
							<th>@lang('admin/testimonial.name')</th>
							<th>@lang('admin/testimonial.job')</th>
							<th>@lang('admin/testimonial.thumbnail')</th>
							<th></th>
						</thead>
						<tbody>
							@foreach ($testimonials as $key=>$testimonial)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $testimonial->name }}</td>
								<td>{{ $testimonial->job }}</td>
								<td><img src="{{ asset($testimonial->thumbnail) }}" class="img" height="75px"></td>
								<td>
									<a class="btn btn-info btn-xs" 
										href="{{ route('homepage.testimonial.show',['id'=>$testimonial->id]) }}">@lang('admin/general.view')
									</a>
									<a class="btn btn-warning btn-xs" 
										href="{{ route('admin.testimonial.edit',['id'=>$testimonial->id]) }}">@lang('admin/general.edit')
									</a>
									<a onclick="removeItem('{{ route('admin.testimonial.remove', ['id'=>$testimonial->id]) }}'); return false;" 
										class="btn btn-danger btn-xs">@lang('admin/general.remove')</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
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
