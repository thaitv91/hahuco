@extends('layouts.admin')

@section('title')

@endsection

@section('content')
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<div class="col-md-12"><h3 class="box-title">@lang('admin/product_contact.contact')</h3> - <small>Show</small></div>
		</div>
		<!-- /.box-header -->
		<div class="col-md-12">
			<div class="box-body">
				<div class="row">
					<div class="form-group">
						<label class="label-control col-md-3">@lang('admin/product_contact.name')</label>
						<p class="label-control col-md-9">{{ $contact->name }}</p>
					</div>
					<div class="form-group">
						<label class="label-control col-md-3">@lang('admin/product_contact.email')</label>
						<p class="label-control col-md-9">{{ $contact->email }}</p>
					</div>
					<div class="form-group">
						<label class="label-control col-md-3">@lang('admin/product_contact.phone')</label>
						<p class="label-control col-md-9">{{ $contact->phone }}</p>
					</div>
					<div class="form-group">
						<label class="label-control col-md-3">@lang('admin/product_contact.content')</label>
						<p class="label-control col-md-9">{{ $contact->content }}</p>
					</div>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<div class="form-group">
				<div class="col-md-12">
					<a href="{{ route('admin.product.contact') }}" class="btn btn-default">@lang('admin/general.back')</a>
				</div>
			</div>
		</div>
		<!-- /.box-body -->
	</div>
</div>
<!-- /.box -->
<form method="POST" id="form-remove">
	{{ csrf_field() }}
	<div class="modal fade" id="modal-delete" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">@lang('admin/general.confirm_delete')</h4>
				</div>
				<div class="modal-body">
					<p>@lang('admin/general.are_you_sure')</p>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger">@lang('admin/general.remove')</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">@lang('admin/general.close')</button>
				</div>
			</div>

		</div>
	</div>
</form>
@endsection