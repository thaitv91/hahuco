<section class="testimonials space-global">
    <div class="container">
        <div class="header-box text-center">
            <div class="group">Hahuco</div>
            <h2>Khách hàng nói về chúng tôi</h2>
        </div>
        <div class="dots-link slider-testimonials">
            @foreach($testimonials as $key => $testimonial)
            <div class="testimonial-item">
                <div class="text">{!! $testimonial->content  !!}<span><i class="ico-quote"></i></span></div>
                <div class="author"><img src="/{{ $testimonial->thumbnail }}" alt="{{ $testimonial->name }}" class="img-fluid">
                    <h4 class="title-mon-b">{{ $testimonial->name }}</h4>
                    <p>{{ $testimonial->job }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>