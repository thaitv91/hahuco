<section class="banner-slider">
    @foreach($images as $image)
    <div class="item">
        <div class="i-want section-img" style="background-image: url('{{ str_replace('\\', '/', $image->url) }}')">
            <div class="container text-white">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="slogan text-center text-uppercase">
                            @if ($page->getContentofField('homepage-banner-slogan-1') != '' && $page->getContentofField('homepage-banner-slogan-1') !== null)
                            <h4>{{ $page->getContentofField('homepage-banner-slogan-1') }}</h4>
                            @endif

                            @if ($page->getContentofField('homepage-banner-slogan-2') != '' && $page->getContentofField('homepage-banner-slogan-2') !== null)
                            <h3>{{ $page->getContentofField('homepage-banner-slogan-2') }}</h3>
                            @endif
                        </div>
                        <div class="text-center d-flex flex-wrap align-items-center justify-content-center">
                            @if ($page->getContentofField('homepage-banner-slogan-3') != '' && $page->getContentofField('homepage-banner-slogan-3') !== null)
                            <h2 class="title-i-want">{{ $page->getContentofField('homepage-banner-slogan-3') }}</h2>
                            @endif

                            @if ($page->getContentofField('homepage-banner-button-text-1') != '' && $page->getContentofField('homepage-banner-button-text-1') !== null)
                            <a href="/san-pham" class="btn-vbi fz-24 btn-blue text-uppercase">{{ $page->getContentofField('homepage-banner-button-text-1') }}</a>
                            @endif

                            @if ($page->getContentofField('homepage-banner-button-text-2') != '' && $page->getContentofField('homepage-banner-button-text-2') !== null)
                            <a href="/boi-thuong" class="btn-vbi fz-24 btn-pink text-uppercase">{{ $page->getContentofField('homepage-banner-button-text-2') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.i-want -->
    </div>
    @endforeach
</section>