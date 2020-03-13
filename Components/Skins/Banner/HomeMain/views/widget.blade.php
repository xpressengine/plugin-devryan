{{ app('xe.frontend')->css('plugins/devryan/Components/Themes/Devryan/assets/css/widget.css')->load() }}
{{ app('xe.frontend')->js([
    'plugins/devryan/Components/Themes/Devryan/assets/js/slick.min.js',
    'plugins/devryan/Components/Themes/Devryan/assets/js/theme.js',
])->location('head.append')->load() }}

<!-- 메인 슬라이드 위젯 -->
<div class="xe-row">
    <div class="xe-col-md-12">
        <!-- main-spot 위젯 영역 -->

        <section class="widget-xe-eastern-spot-slide">
            <!-- slick 영역 -->
            <div class="widget-xe-eastern-spot-slide-slider __widget-xe-eastern-spot-slide-slide">
                @foreach($items as $item)
                    <!-- [D] 슬라이드 이미지 옵션으로 적용 -->
                    <div class="widget-xe-eastern-spot-slide-slider__item-box" style="background-image: url({{ $item->imageUrl() }});">
                        <div class="xe-container">
                            <div class="widget-xe-eastern-spot-slide-slider__item">
                                <div class="widget-xe-eastern-spot-slide-slider__item-content">
                                    @if ($item->etc['icon_path'] != '')
                                        <!-- [D] 아이콘 이미지 없을 경우 class="widget-xe-eastern-spot-slide-slider__item-content-image-box" 영역 미노출 -->
                                        <span class="widget-xe-eastern-spot-slide-slider__item-content-image-box">
                                            <!-- [D] 로고 심볼 아이콘 이미지 옵션으로 적용, 90x48 크기 비율로 이미지 등록 되어야 된다. -->
                                            <img src="{{$item->etc['icon_path']}}" class="widget-xe-eastern-spot-slide-slider__item-content-image">
                                        </span>
                                    @endif
                                    <h2 class="widget-xe-eastern-spot-slide-slider__item-content-title">{!! $item->title !!}</h2>
                                    <p class="widget-xe-eastern-spot-slide-slider__item-content-text">
                                        {!!  $item->content !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- //main-spot 위젯 영역 -->
    </div>
</div>
<!-- //메인 슬라이드 위젯 -->
