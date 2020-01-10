<!-- 룸 상세 위젯 -->
<div class="xe-row">
    <div class="xe-col-md-12">
        <!-- 룸 상세 위젯 영역 -->
        <section class="widget-xe-eastern-image-slide">
            <!-- slick 영역 -->
            <div class="widget-xe-eastern-image-slide-slider __widget-xe-eastern-image-slide-slide">
                <!-- [D] 슬라이드 이미지 옵션으로 적용 -->
                @foreach($items as $item)
                <div class="widget-xe-eastern-image-slide-slider__item-box" style="background-image: url({{ $item->imageUrl() }});">
                    <div class="xe-container">
                        <div class="widget-xe-eastern-image-slide-slider__item">
                            <!-- [D] 슬라이드 설명 문구 넣어도 되고, 해당 영역 빼도 됩니다. -->
                            <h2 class="blind">{!! $item->title !!}</h2>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        <!-- //룸 상세 위젯 영역 -->
    </div>
</div>
<!-- //룸 상세 위젯 -->
