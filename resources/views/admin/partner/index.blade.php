@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/partner.partner')</h3>
			<a href="{{ route('admin.partner.create') }}" class="pull-right btn btn-primary">@lang('admin/general.create')</a>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-12">
				<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<th>@lang('admin/partner.id')</th>
							<th>@lang('admin/partner.name')</th>
							<th>@lang('admin/partner.thumbnail')</th>
							<th width="15%"></th>
						</thead>
						<tbody>
							@foreach ($partners as $key=>$partner)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $partner->name }}</td>
								<td><img src="{{ asset($partner->thumbnail) }}" class="img" height="75px"></td>
								<td>
									<!-- <a class="btn btn-info btn-xs" 
										href="{{ route('homepage.partner.show',['id'=>$partner->id]) }}">@lang('admin/general.view')
									</a> -->
									<a class="btn btn-warning btn-xs" 
										href="{{ route('admin.partner.edit',['slug'=>$partner->id]) }}">@lang('admin/general.edit')
									</a>
									<a onclick="removeItem('{{ route('admin.partner.remove', ['id'=>$partner->id]) }}'); return false;" 
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
