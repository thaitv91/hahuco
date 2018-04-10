<section class="care-customer section-img">
        <div class="container">
            <h2 class="text-center title">@lang('frontend/home.care_customer')</h2>
            <div class="slider-customer arrows-gray">
                @foreach ($pages as $page)
                <div class="item">
                    <div class="tile-care-customer">
                        <div class="img"><a href="{{ $page->slug }}"><img src="{{ asset($page->thumbnail) }}" alt=""/></a></div>
                        <h4 class="text-uppercase"><a href="{{ $page->slug }}">{{ $page->title }}</a></h4>
                    </div><!-- /.tile-care-customer -->
                </div>
                @endforeach
        </div>
    </section><!-- /.care-customer -->