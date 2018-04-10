@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/category.category')</h3>
			<a href="{{ route('admin.product.category.create') }}" class="pull-right btn btn-primary">@lang('admin/general.create')</a>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-12">
				<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<th>@lang('admin/category.id')</th>
							<th>@lang('admin/category.name')</th>
							<th>@lang('admin/category.slug')</th>
							<th>@lang('admin/category.thumbnail')</th>
							<th>@lang('admin/category.description')</th>
							<th></th>
						</thead>
						<tbody>
							@foreach ($categories as $key=>$category)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $category->name }}</td>
								<td>{{ $category->slug }}</td>
								<td><img src="{{ asset($category->thumbnail) }}" class="img" height="75px"></td>
								<td>@php echo $category->description @endphp</td>
								<td>
									<a class="btn btn-info btn-xs" 
										href="{{ route('admin.product.category.listProduct',['slug'=>$category->slug]) }}">@lang('admin/product.list_product')
									</a>
									@if ($category->slug != 'default')
									<a class="btn btn-warning btn-xs" 
										href="{{ route('admin.product.category.edit',['slug'=>$category->slug]) }}">@lang('admin/general.edit')
									</a>
									<a onclick="removeItem('{{ route('admin.product.category.remove', ['slug'=>$category->slug]) }}'); return false;" 
										class="btn btn-danger btn-xs">@lang('admin/general.remove')</a>
									@endif
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
