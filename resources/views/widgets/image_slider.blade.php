<section class="banner-slider arrows-gray">
    @foreach($images as $image)
    <div class="item">
        <div class="i-want section-img" style="background-image: url('{{ str_replace('\\', '/', $image->url) }}')">
            <div class="container text-white">
                <div class="row">
                    
                </div>
            </div>
        </div><!-- /.i-want -->
    </div>
    @endforeach
</section>