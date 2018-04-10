<section id="testimonials" class="{{ $config['section_class'] }} text-white">
    <div class="container">
        <h2 class="text-center title text-white">@lang('frontend/home.testimonials')</h2>
        <div class="slider-testimonial arrows-white dots-white">
            @foreach($testimonials as $key => $testimonial)
            <div class="item">
                <div class="tile-testimonial d-flex">
                    <div class="img rounded-circle"><img class="rounded-circle" src="/{{ $testimonial->thumbnail }}" alt="" /></div>
                    <div class="text">
                        <h4>{{ $testimonial->name }}</h4>
                        <h6>{{ $testimonial->job }}</h6>
                        <div class="description typed-wrap">
                            <div class="typed-string" id="typed-string-{{$key}}">
                                {!! $testimonial->content  !!}
                            </div>
                            <div class="typed" id="typed-{{$key}}"></div>
                        </div>
                    </div>
                </div><!-- /.tile-testimonial -->
            </div>
            @endforeach
        </div>
    </div>
</section>

{{--<script type="text/javascript">--}}

    {{--document.addEventListener('DOMContentLoaded', function() {--}}
        {{--@foreach($testimonials as $key => $testimonial)--}}
            {{--var  typed{{$key}} = new Typed('#typed-{{$key}}', {--}}
                {{--stringsElement: '#typed-string-{{$key}}',--}}
                {{--typeSpeed: 50,--}}
                {{--loop: true--}}
            {{--});--}}
        {{--@endforeach--}}
    {{--});--}}
{{--</script>--}}