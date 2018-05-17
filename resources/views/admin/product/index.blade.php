@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/product.product')</h3>
			<a href="{{ route('admin.product.create') }}" class="pull-right btn btn-primary">@lang('admin/general.create')</a>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-12">
				<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<th>@lang('admin/product.id')</th>
							<th>@lang('admin/product.title')</th>
							<th>@lang('admin/product.category')</th>
							<th>@lang('admin/product.thumbnail')</th>
							<th width="15%"></th>
						</thead>
						<tbody>
							@foreach ($products as $key=>$product)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $product->title }}</td>
								<td>{{ $product->term? $product->term->name : '' }}</td>
								<td><img src="{{ asset($product->thumbnail) }}" class="img" height="75px"></td>
								<td>
									<a class="btn btn-info btn-xs" 
										href="{{ route('homepage.product.show',['term_slug'=>$product->term? $product->term->slug : 'default', 'product_slug'=>$product->slug]) }}">@lang('admin/general.view')
									</a>
									<a class="btn btn-warning btn-xs" 
										href="{{ route('admin.product.edit',['slug'=>$product->slug]) }}">@lang('admin/general.edit')
									</a>
									<a onclick="removeItem('{{ route('admin.product.remove', ['slug'=>$product->slug]) }}'); return false;" 
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
