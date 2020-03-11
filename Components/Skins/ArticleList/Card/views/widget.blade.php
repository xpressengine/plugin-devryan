{{
    XeFrontend::css(
        'plugins/devryan/Components/Themes/Devryan/assets/css/widget.css'
    )->load()
}}

{{-- <!-- 위젯 코드 영역 --> --}}
{{-- <!-- [D] 게시물 리스트 위젯, 링크 따로 있는 타입, (overview 페이지 리스트 타입과 다른 타입)  --> --}}
<section class="section-xe-eastern-board-post-list-tour-widget section-xe-eastern-board-post-list-tour-widget--gray">
    {{-- <!-- [D] 섹션 배경 컬러 적용 시 class="xe-eastern-board-post-list-tour-widget-item__bg" 영역에 background-color 적용 --> --}}
    <div class="xe-eastern-board-post-list-tour-widget-item__bg" style="background-color: #fafafa;"></div>
    <div class="xe-eastern-board-post-list-tour-widget__title-box">
        <h2 class="title">{{ $title }}</h2>
        @if ($more)
            @php
                $instanceId = $menuItem->id;
                $urlMore = instance_route('index', [], $instanceId);
                if (starts_with($widgetConfig['board_id'], 'category.')) {
                    $categoryId = str_after($widgetConfig['board_id'], 'category.');
                    $urlMore = instance_route('index', ['category_item_id' => $categoryId], $instanceId);
                }
            @endphp
            <a href="{{ $urlMore }}" class="title-link">전체보기</a>
        @endif
    </div>

    <div class="xe-row xe-eastern-board-post-list-tour-widget-row">
        @foreach($list as $item)
            <div class="xe-col-md-4 xe-eastern-board-post-list-tour-widget-item">
                <div class="xe-eastern-board-post-list-tour-widget-info">
                    <a href="{{ $urlHandler->getShow($item) }}" class="info-thumbnail-box">
                        <span class="info-thumbnail" @if($item->thumb != null && $item->thumb->board_thumbnail_path) style="background-image:url('{{ $item->thumb->board_thumbnail_path }}')" @endif></span>
                    </a>
                    <div class="info-content">
                        <a href="{{ $urlHandler->getShow($item) }}" class="info-content__title">{{$item->title}}</a>
                        <a href="{{ $urlHandler->getShow($item) }}" class="info-content__text">{!! mb_substr($item->pure_content, 0, 100) !!}</a>
                        <div class="info-meta-box">
                            <div class="info-meta-box__item-box info-meta-box__item-box--left">
                                <!-- 게시물 댓글 -->
                                <span class="info-meta__item info-meta__item--comment">댓글 {{number_format($item->comment_count)}}</span>
                                <!-- //게시물 댓글 -->
                            </div>
                            <div class="info-meta-box__item-box info-meta-box__item-box--right">
                                <!-- 게시물 좋아요 -->
                                <span class="info-meta__item info-meta__item--like"><i class="xi-thumbs-up" title="좋아요"></i> {{$item->assent_count}}</span>
                                <!-- //게시물 좋아요 -->
                                <!-- 게시물 조회수 -->
                                <span class="info-meta__item info-meta__item--view info-meta__item--last"><i class="xi-eye" title="조회수"></i> {{number_format($item->read_count)}}</span>
                                <!-- //게시물 조회수 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!-- //위젯 코드 영역 -->
