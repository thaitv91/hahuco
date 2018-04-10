@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/recruitment.place')</h3>
			<a href="{{ route('admin.recruitment.place.create') }}" class="pull-right btn btn-primary">@lang('admin/general.create')</a>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-12">
				<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<th>@lang('admin/recruitment.id')</th>
							<th>@lang('admin/recruitment.name')</th>
							<th></th>
						</thead>
						<tbody>
							@foreach ($places as $key => $place)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $place->name }}</td>
								<td>
									<a class="btn btn-warning btn-xs" 
										href="{{ route('admin.recruitment.place.edit',['id'=>$place->id]) }}">@lang('admin/general.edit')
									</a>
									<a onclick="removeItem('{{ route('admin.recruitment.place.remove', ['id'=>$place->id]) }}'); return false;" 
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
