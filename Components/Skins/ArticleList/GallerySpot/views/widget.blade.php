<!-- 게시물 이미지 리스트 위젯 -->
<div class="xe-row">
    <div class="xe-col-md-12">
        <!-- 게시물 이미지 리스트 위젯 시작 -->
        <section class="section-widget-xe-eastern-board-image">
            <div class="xe-container">
                <div class="widget-xe-eastern-board-image__info">
                    <h2 class="widget-xe-eastern-board-image__info-title">
                        {{ $title }}
                        @if ($more)
                            @php
                                $instanceId = $menuItem->id;
                                $urlMore = instance_route('index', [], $instanceId);
                                if (starts_with($widgetConfig['board_id'], 'category.')) {
                                    $categoryId = str_after($widgetConfig['board_id'], 'category.');
                                    $urlMore = instance_route('index', ['category_item_id' => $categoryId], $instanceId);
                                }
                            @endphp

                            <a href="{{ $urlMore }}" class="widget-xe-eastern-board-image__info-title-link" title="게시물 전체보기 페이지 이동">
                                <span class="widget-xe-eastern-board-image__icon-round-arrow"></span>
                                <span class="blind">전체보기</span>
                            </a>
                        @endif
                    </h2>
                    <!-- <p class="widget-xe-eastern-board-image__info-text">XE3로 만들어진 놀라운 사이트들을 보세요. 블로그, 홈페이지, 쇼핑몰, 채용, 예약 사이트 등 무엇이든지 제작 가능합니다. 호스팅 서비스로 바로 엑스프레스엔진을 시작하여, 직접 웹사이트를 만들어 볼 수 있습니다. 고급 기능과 디자인을 추가하고 싶다면 XE Store도 확인해보세요. 브랜딩, 홈페이지 제작, 교육, 유지보수 서비스로 더욱 강력한 홈페이지를 만드세요. XEHub가 도와드리겠습니다.</p> -->
                </div>
                <ul class="widget-xe-eastern-board-image-list">
                    @foreach($list as $item)
                    <li>
                        <div class="widget-xe-eastern-board-image-list__item">
                            <a href="{{ $urlHandler->getShow($item) }}" class="widget-xe-eastern-board-image-list__item-link" title="게시물 상세 페이지 이동">
                                <span class="widget-xe-eastern-board-image-list__item-image-box">
                                    <!-- [D] 이미지 적용 -->
                                    <span class="widget-xe-eastern-board-image-list__item-image" @if($item->thumb != null && $item->thumb->board_thumbnail_path) style="background-image:url('{{ $item->thumb->board_thumbnail_path }}')" @endif>
                                        <span class="blind">배경이미지</span>
                                    </span>
                                </span>
                                <span class="widget-xe-eastern-board-image-list__item-text-box">
                                    <!-- [D] 이미지 아이콘 추가 -->
                                    <span class="widget-xe-eastern-board-image-list__item-icon">
                                        <span class="widget-xe-eastern-board-image__icon-round-arrow"></span>
                                    </span>
                                    <!-- [D] 제목, 카테고리 적용 -->
                                    <span class="widget-xe-eastern-board-image-list__item-title">{{$item->title}}</span>
                                    <span class="widget-xe-eastern-board-image-list__item-category">{!! $item->boardCategory !== null ? xe_trans($item->boardCategory->categoryItem->word) : '' !!}</span>
                                </span>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>
        <!-- //게시물 이미지 리스트 위젯 -->
    </div>
</div>
<!-- //게시물 이미지 리스트 위젯 -->
