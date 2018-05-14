<div class="sidebar">
	<h3 class="title_sb">
      <span>Danh mục sản phẩm</span>
  </h3><!-- End .title_sb -->
    <div class="nav-sidebar">
        <ul class="list-unstyled">
            @foreach($terms as $term)
                <li><a href="{{ route('homepage.product.term',$term->slug) }}">{{ $term->name }}</a></li>
            @endforeach
        </ul>
    </div><!-- /.nav-sidebar-->
</div>

<div class="block_sb">
    <h3 class="title_sb">
        <span>Hỗ trợ trực tuyến</span>
    </h3><!-- End .title_sb -->
    <div class="hotline">
        <ul>
            <li>
                <strong>Hotline 01</strong>
                <p style="color:#333;">{!! $hotline1 !!}</p>
            </li>
            <li>
                <strong>Hotline 02</strong>
                <p style="color:#333;">{!! $hotline2 !!}</p>
            </li>
            <li>
                <strong>Hotline 03</strong>
                <p style="color:#333;">{!! $hotline3 !!}</p>
            </li>
        </ul>
    </div><!-- End .hotline -->
</div><!-- End .block_sb -->