{{ app('xe.frontend')->css('plugins/devryan/Components/Themes/Devryan/assets/css/widget.css')->load() }}
{{ app('xe.frontend')->js([
    'plugins/devryan/Components/Themes/Devryan/assets/js/slick.min.js',
    'plugins/devryan/Components/Themes/Devryan/assets/js/theme.js',
])->location('head.append')->load() }}

<!-- special rooms 슬라이드 위젯 -->
<div class="xe-row">
    <div class="xe-col-md-12">
        <section class="section-widget-xe-eastern-specialroom-slide">
            <h2 class="widget-xe-eastern-specialroom-slide__title">{{$title}}</h2>
            <!-- area-room-slide -->
            <div class="widget-xe-eastern-specialroom-slide-box">
                <div class="widget-xe-eastern-specialroom-slide __widget-xe-eastern-specialroom-slide">
                    @foreach($items as $item)
                    <div class="widget-xe-eastern-specialroom-slide__item-slide" style="background-image:url({{ $item->imageUrl() }});">
                        <!-- [D] 슬라이드 타이틀 텍스트 적용 -->
                        <span class="blind">{!! $item->title !!}</span>
                    </div>
                    @endforeach
                </div>

                <ul class="widget-xe-eastern-specialroom-slide-content-list">
                    @foreach($items as $item)
                    <li>
                        <div class="widget-xe-eastern-specialroom-slide-content__content">
                            <strong class="widget-xe-eastern-specialroom-slide-content__content-title">{!! $item->title !!}</strong>
                            <p class="widget-xe-eastern-specialroom-slide-content__content-text">{!! $item->content !!}</p>
                            <div class="widget-xe-eastern-specialroom-slide-content__link-box">
                                <a href="{{ url($item->link) }}" target="{{ $item->link_target }}" class="widget-xe-eastern-specialroom-slide-content__link">{!! $item->etc['button_html'] ? $item->etc['button_html'] : '자세히 보기' !!}</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- // area-room-slide -->
        </section>
    </div>
</div>
<!-- //special rooms 슬라이드 위젯 -->

