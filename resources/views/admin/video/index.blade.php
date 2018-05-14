@extends('layouts.admin')

@section('title')

@endsection

@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('plugins/datatables/dataTables.bootstrap.css') }}">
@endpush

@section('content')
<div class="col-md-12">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">@lang('admin/user.user')</h3>
			<a href="{{ route('admin.video.create') }}" class="pull-right btn btn-primary">Tạo mới</a>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="table" class="table table-bordered table-hover">
				<thead>
				<tr>
					<th>id</th>
					<th>Title</th>
					<th>Video URL</th>
					<th>Thumbnail</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				@if($videos)
				@foreach ($videos as $key => $video)
					<tr>
						<td>{{ $key+1 }}</td>
						<td>{{ $video->title }}</td>
						<td>{{ $video->video }}</td>
						<td><img style="width: 100px; height: auto" src="/{{ $video->thumbnail }}" /></td>

						<td>
							<a href="{{ route('admin.video.edit',['id'=> $video->id]) }}" class="btn btn-xs btn-warning">Edit</a>
							<a data-toggle="modal" data-target="#delete-{{ $video->id }}" class="btn btn-xs btn-danger">Delete</a>
							<div class="modal fade" id="delete-{{ $video->id }}" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">@lang('admin/general.confirm_delete')</h4>
										</div>
										<form action="{{ route('admin.video.delete') }}" method="post">
											<div class="modal-body">
												<p>Bạn muốn xóa video: <b>{{ $video->title }}</b></p>
												{{ csrf_field() }}
												<input type="hidden" name="id" value="{{ $video->id }}">
												<button href="" class="btn btn-danger">@lang('admin/general.remove')</button>
											</div>
										</form>
									</div>

								</div>
							</div>
						</td>
					</tr>
				@endforeach
				@endif
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
	</div>
</div>
<!-- /.box -->
@endsection

@section('scripts')
<!-- DataTables -->
{{--<script type="text/javascript">--}}
    {{--function confirmDelete(id) {--}}
        {{--$.ajax({--}}
            {{--url : '{{ route("admin.video.delete") }}',--}}
            {{--data : {id:id},--}}
        {{--}).done(function(data) {--}}
            {{--if (data == -1) {--}}
                {{--alert('Opp! Please try again. Error!');--}}
            {{--} else {--}}
                {{--$('#modal-delete a').attr('href',data);--}}
                {{--$('#modal-delete').modal('show');--}}
            {{--}--}}
        {{--})--}}
    {{--}--}}
{{--</script>--}}
@endsection