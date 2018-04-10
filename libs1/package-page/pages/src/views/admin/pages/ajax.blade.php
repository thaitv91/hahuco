@if($fields)
	@foreach ($fields as $key => $field)
		<?php 
		if($field->type == 'file')
			$name = $field->slug;
		$id = $field->id;
		?>
		{!! $field->renderTemplate() !!}
	@endforeach
@else($fields_page)
	@foreach ($fields_page as $key => $field_page)
		<?php 
		if($field_page->type == 'file')
			$name = $field_page->slug;
		$id = $field_page->id;
		?>
		{!! $field_page->renderPage() !!}
	@endforeach
@endif
