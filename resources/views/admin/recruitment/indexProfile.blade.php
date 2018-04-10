@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/recruitment.profile')</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-12">
				<div class="box-body">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>@lang('admin/recruitment.id')</th>
								<th>@lang('admin/recruitment.name')</th>
								<th>@lang('admin/recruitment.email')</th>
								<th>@lang('admin/recruitment.phone')</th>
								<th>@lang('admin/recruitment.created_at')</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($profiles as $key => $profile)
							<tr>
								@if ($profile->status == 0)
								<td><b>{{ $key+1 }}</b></td>
								<td><b>{{ $profile->name }}</b></td>
								<td><b>{{ $profile->email }}</b></td>
								<td><b>{{ $profile->phone }}</b></td>
								<td><b>{{ $profile->created_at->format('d/m/Y') }}</b></td>
								@else
								<td>{{ $key+1 }}</td>
								<td>{{ $profile->name }}</td>
								<td>{{ $profile->email }}</td>
								<td>{{ $profile->phone }}</td>
								<td>{{ $profile->created_at->format('d/m/Y') }}</td>
								@endif
								<td><a href="{{ route('admin.recruitment.profile.show', ['id' => $profile->id]) }}" class="btn btn-success btn-xs">@lang('admin/general.detail')</a>
									<a href="#" class="btn btn-danger btn-xs" onclick="removeItem('{{ route('admin.recruitment.profile.remove', ['id' => $profile->id]) }}')">@lang('admin/general.remove')</a></td>
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
