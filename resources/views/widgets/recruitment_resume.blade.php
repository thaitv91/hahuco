<section class="testimonials text-white download-form-recruitment">
    <div class="container">
        <h2 class="text-center title text-white">Tuyển dụng 24/7</h2>
        <div class="slider-download arrows-white">
            @foreach ($resumes as $resume)
            <div class="item">
                <a href="{{ asset($resume->url_download) }}" download><img src="{{ asset($resume->thumbnail) }}" alt="Image" /></a>
            </div>
            @endforeach
        </div>
    </div>
    </section><!-- /.testimonials -->