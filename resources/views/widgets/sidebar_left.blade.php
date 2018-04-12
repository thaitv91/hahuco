<div class="sidebar">
    <div class="block_sb">
        <h3 class="title_sb">
            <span>Danh mục sản phẩm</span>
        </h3><!-- End .title_sb -->
        <div class="main_sb">
            <ul class="ul_dmsp">
                @foreach($terms as $term)
                    <li><a href="{{ route('homepage.product.term',$term->slug) }}"><h2>{{ $term->name }}</h2></a></li>
                @endforeach
            </ul>
        </div><!-- End .main_sb -->
    </div><!-- End .block_sb -->
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
    <div class="block_sb">
        <h3 class="title_sb">
            <span>Video</span>
        </h3><!-- End .title_sb -->
        <script>
            $(document).ready(function() {
                if($("#video_show").length){
                    $("#video_show").html('<iframe width="100%" height="160" src="'+$("#a_video1").attr("val_link")+'" frameborder="0" allowfullscreen></iframe>');
                    $("#a_video1").addClass("active");
                    $(".a_video").click(function() {
                        var val_link=$(this).attr("val_link");
                        var val_id=$(this).attr("val_id");
                        $("#video_show").html('<iframe width="100%" height="160" src="'+val_link+'?autoplay=1" frameborder="0" allowfullscreen></iframe>');
                        $(".a_video").removeClass("active");
                        $("#a_video"+val_id).addClass("active");;
                    });
                }
            });
        </script>
        <div class="main_sb">
            <div class="video" id="video_show"></div>
            <div class="list_video">
                <ul>
                    <li class="a_video" id="a_video1" val_id="1" val_link="http://www.youtube.com/embed/zB4HksXlhAI">
                        <a href="JavaScript:void(0);">
                            1. Gia công chấn gấp cnc Intech Việt Nam                        </a>
                    </li>

                    <li class="a_video" id="a_video2" val_id="2" val_link="http://www.youtube.com/embed/ziXz_R54ijQ">
                        <a href="JavaScript:void(0);">
                            2. Gia công đột dập CNC                        </a>
                    </li>

                    <li class="a_video" id="a_video3" val_id="3" val_link="http://www.youtube.com/embed/6HAX73CLGKA">
                        <a href="JavaScript:void(0);">
                            3. Gia công chấn gấp CNC                        </a>
                    </li>

                    <li class="a_video" id="a_video4" val_id="4" val_link="http://www.youtube.com/embed/be38W5SB1Ek">
                        <a href="JavaScript:void(0);">
                            4. Gia công cắt Laser                        </a>
                    </li>

                    <li class="a_video" id="a_video5" val_id="5" val_link="http://www.youtube.com/embed/yydVXWIzZqQ">
                        <a href="JavaScript:void(0);">
                            5. Intech Việt Nam - 5 năm một chặng đường                        </a>
                    </li>

                    <li class="a_video" id="a_video6" val_id="6" val_link="http://www.youtube.com/embed/2JVKWMSs5h0">
                        <a href="JavaScript:void(0);">
                            6. Kỷ niệm 5 năm thành lập Intech Việt Nam!                        </a>
                    </li>

                    <li class="a_video" id="a_video7" val_id="7" val_link="http://www.youtube.com/embed/u7O9AinKhi0">
                        <a href="JavaScript:void(0);">
                            7. Gia công cắt Laser trên thép, inox                        </a>
                    </li>

                    <li class="a_video" id="a_video8" val_id="8" val_link="http://www.youtube.com/embed/HBelvkEZmg4">
                        <a href="JavaScript:void(0);">
                            8. Tiệc tất niên 2017 Intech Việt Nam                        </a>
                    </li>

                    <li class="a_video" id="a_video9" val_id="9" val_link="http://www.youtube.com/embed/gKPAk7EM8lg">
                        <a href="JavaScript:void(0);">
                            9. Gia công căt laser trên inox                        </a>
                    </li>

                    <li class="a_video" id="a_video10" val_id="10" val_link="http://www.youtube.com/embed/w-zQm74MR2U">
                        <a href="JavaScript:void(0);">
                            10. Gia công chấn gấp kim loại tấm                        </a>
                    </li>
                </ul>
            </div><!-- End .list_video -->
        </div><!-- End .main_sb -->
    </div><!-- End .block_sb -->
</div>