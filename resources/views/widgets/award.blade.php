<section class="{{ $config['section_class'] }} section-img">
    <div class="container">
        <h2 class="text-center title">Giải thưởng và danh hiệu</h2>
        <div class="slider-awards">
            @foreach ($awards as $award)
            <div class="item">
                <div class="tile-vingroup" title=""><img  data-html="true" data-toggle="tooltip" data-placement="top" data-container=".awards" data-original-title="<div class='tooltip-awards'>{{ $award->tooltip }}</div>" src="{{ asset($award->image) }}" alt="" ></div>
            </div>
            @endforeach
        </div>
    </div>
</section><!-- /.award -->