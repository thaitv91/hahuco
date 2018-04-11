@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/recruitment.recruitment')</h3>
			<a href="{{ route('admin.recruitment.create') }}" class="pull-right btn btn-primary">@lang('admin/general.create')</a>
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
							<th>@lang('admin/recruitment.title')</th>
							<th>@lang('admin/recruitment.thumbnail')</th>
							<th></th>
						</thead>
						<tbody>
							@foreach ($recruitments as $key => $recruitment)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $recruitment->title }}</td>
								<td>
									<img src="{{ asset($recruitment->thumbnail) }}" class="img" height="75px">
								</td>
								<td>
									<a class="btn btn-warning btn-xs" 
										href="{{ route('admin.recruitment.edit',['id'=>$recruitment->id]) }}">@lang('admin/general.edit')
									</a>
									<a onclick="removeItem('{{ route('admin.recruitment.remove', ['id'=>$recruitment->id]) }}'); return false;" 
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
