@foreach($menuItems as $item)
	@if($item->hasChildren())
	<li class ="nav-item dropdown">
	    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	      {!! $item->name !!} <b class="caret"></b>
		    <ul class="dropdown-menu">
		        @include('menu-view::menu_render',array('menuItems' => $item->children, 'flag'=>1))
		    </ul>
	    </a>
	</li>
	@else
	<li class="{{ $li_class }}">
		<a class="{{ $a_class }}" href="{{ $item->link }}">
			<i class="{{ $icon }}"></i>
			{!! $item->name !!}
		</a>
	</li>
	@endif
@endforeach