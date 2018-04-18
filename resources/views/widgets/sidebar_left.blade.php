<div class="sidebar">
    <div class="nav-sidebar">
        <ul class="list-unstyled">
            @foreach($terms as $term)
                <li><a href="{{ route('homepage.product.term',$term->slug) }}">{{ $term->name }}</a></li>
            @endforeach
        </ul>
    </div><!-- /.nav-sidebar-->
</div>