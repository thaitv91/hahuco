@foreach($menuItems as $item)
	@if($item->hasChildren())
		<li class ="nav-item dropdown">
			<a class="{{ $a_class }} dropdown-toggle {{ \Request::is(substr($item->link, 1)) ? 'active' : '' }}" href="{{ $item->link }}">{!! $item->name !!} <b class="caret"></b></a>
			<ul class="dropdown-menu">
				@include('menu-view::menu_render',array('menuItems' => $item->children, 'flag'=>1))
			</ul>
		</li>
	@else
		<li class="{{ $li_class }}">
			<a class="{{ isset($flag) ? 'dropdown-item' : $a_class }} {{ \Request::is(substr($item->link, 1)) ? 'active' : '' }}" href="{{ $item->link }}">
				{!! $item->name !!}
			</a>
		</li>
	@endif
@endforeach