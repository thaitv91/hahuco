@extends('layouts.admin')

@section('title')

@endsection


@section('content')
<div class="col-md-12">	
	<!-- general form elements -->
	<div class="box box-primary">

		<div class="box-header with-border">
			<h3 class="box-title">@lang('admin/news.news')</h3>
			<a href="{{ route('admin.news.create') }}" class="pull-right btn btn-primary">@lang('admin/general.create')</a>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" id="form-edit" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="col-md-12">
				<div class="box-body">
					<table class="table table-bordered">
						<thead>
							<th>@lang('admin/news.id')</th>
							<th>@lang('admin/news.name')</th>
							<th>@lang('admin/news.slug')</th>
							<th>@lang('admin/news.thumbnail')</th>
							<th width="10%">@lang('admin/news.category')</th>
							<th width="15%"></th>
						</thead>
						<tbody>
							@foreach ($news as $key=>$post)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $post->name }}</td>
								<td>{{ $post->slug }}</td>
								<td><img src="{{ asset($post->thumbnail) }}" class="img" height="75px"></td>
								<td>{{ $post->category->name }}</td>
								<td>
									<a class="btn btn-info btn-xs" 
										href="{{ route('homepage.news.show',['news_slug'=>$post->slug]) }}">@lang('admin/general.view')
									</a>
									<a class="btn btn-warning btn-xs" 
										href="{{ route('admin.news.edit',['slug'=>$post->slug]) }}">@lang('admin/general.edit')
									</a>
									<a onclick="removeItem('{{ route('admin.news.remove', ['slug'=>$post->slug]) }}'); return false;" 
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

@section('scripts')
@endsection
