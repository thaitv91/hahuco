@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/term.term')</h3>
			<a href="{{ route('admin.product.term.create') }}" class="pull-right btn btn-primary">@lang('admin/general.create')</a>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-12">
				<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<th>@lang('admin/term.id')</th>
							<th>@lang('admin/term.name')</th>
							<th>@lang('admin/term.slug')</th>
							<th>@lang('admin/term.thumbnail')</th>
							<th></th>
						</thead>
						<tbody>
							@foreach ($terms as $key=>$term)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $term->name }}</td>
								<td>{{ $term->slug }}</td>
								<td><img src="{{ asset($term->thumbnail) }}" class="img" height="75px"></td>
								<td>
									<a class="btn btn-info btn-xs" 
										href="{{ route('admin.product.term.listProduct',['term_slug'=>$term->slug]) }}">@lang('admin/product.list_product')
									</a>
									@if ($term->slug != 'default')
									<a class="btn btn-warning btn-xs" 
										href="{{ route('admin.product.term.edit',['slug'=>$term->slug]) }}">@lang('admin/general.edit')
									</a>
									<a onclick="removeItem('{{ route('admin.product.term.remove', ['slug'=>$term->slug]) }}'); return false;" 
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
