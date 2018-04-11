@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">Dịch Vụ</h3>
			<a href="{{ route('admin.dichvu.create') }}" class="pull-right btn btn-primary">@lang('admin/general.create')</a>
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
							<th width="15%"></th>
						</thead>
						<tbody>
							@foreach ($dichvu as $key => $dv)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $dv->name }}</td>
								<td>
									<a class="btn btn-warning btn-xs" 
										href="{{ route('admin.dichvu.edit',['slug'=>$dv->slug]) }}">@lang('admin/general.edit')
									</a>
									<a onclick="removeItem('{{ route('admin.dichvu.remove', ['id'=>$dv->slug]) }}'); return false;"
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
