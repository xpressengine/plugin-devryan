{{ XeFrontend::css('plugins/devryan/src/Components/Skins/Board/Card/assets/css/devryan-board.css')->load() }}

<div class="xe-container">
    <!-- 게시판 스킨 카드형 리스트 -->
    <section class="section-board section-board-eastern-skin">
        <div class="board-eastern-skin-list-wrap">

            {{--@include($_skinPath.'/views/_list-header')--}}

            <!-- 리스트 헤더(이전 inc/list-header 에 들어갈 내용) -->
            <div class="board-eastern-skin-list-header">
                <h2 class="blind">게시물 리스트</h2>
                <div class="board-eastern-skin-category">
                    @if (count($categories) > 0)
                    <ul class="category-list">
                        {{--<li @if(Request::get('category_item_id', '') == '') class="on" @endif >--}}
                            {{--<a href="{{$urlHandler->get('index')}}" class="category-list__link">전체</a>--}}
                        {{--</li>--}}
                        @foreach ($categories as $categoryItem)
                        <li @if(Request::get('category_item_id') == $categoryItem['value']) class="on" @endif >
                            <a href="{{$urlHandler->get('index', ['category_item_id' => $categoryItem['value']])}}" class="category-list__link">{{xe_trans($categoryItem['text'])}}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            <!-- //리스트 헤더 -->

            <!-- 리스트 영역(이전 inc/list-article 에 들어갈 내용) -->
            <div class="board-eastern-skin-list-body">
                <div class="xe-row board-eastern-skin-row">
                    @foreach($notices as $item)
                        <div class="xe-col-md-4 board-eastern-skin-item">
                            <!-- [D] 메타 영역 때문에 리스트 아이템 전체 영역 링크 적용하는것 대신 이미지, 제목, 내용 세군데에 링크 적용하는것으로 변경 (세군데 모두 동일한 링크 적용(게시물 상세)) -->
                            <div class="board-eastern-skin-info">
                                <a href="{{$urlHandler->getShow($item, Request::all())}}" title="게시물 상세 이동" class="info-thumbnail-box">
                                    <span class="info-thumbnail" @if($item->board_thumbnail_path) style="background-image: url('{{ $item->board_thumbnail_path }}')" @endif></span>
                                </a>
                                <span class="info-content">
                                    @if ($item->status == $item::STATUS_NOTICE)
                                        <span class="xe-badge xe-primary">{{ xe_trans('xe::notice') }}</span>
                                    @endif
                                    @if ($config->get('category') == true && $item->boardCategory !== null)
                                        <span class="category">{!! xe_trans($item->boardCategory->categoryItem->word) !!}</span>
                                    @endif
                                    <a href="{{$urlHandler->getShow($item, Request::all())}}" class="info-content__title" title="게시물 상세 이동">{!! $item->title !!}</a>
                                    <a href="{{$urlHandler->getShow($item, Request::all())}}" class="info-content__text" title="게시물 상세 이동">{!! mb_substr($item->pure_content, 0, 100) !!}</a>
                                    <span class="info-meta-box">
                                        <div class="info-meta-box__item-box info-meta-box__item-box--left">
                                            @if ($isManager === true)
                                                <!-- 관리자 일때 게시물 삭제 및 관리를 위한 체크박스  -->
                                                    <span class="info-meta__item info-meta__item--manage">
                                                    <label class="xe-label info-meta__item-label">
                                                        <input type="checkbox" title="선택" class="bd_manage_check" value="{{ $item->id }}">
                                                        <span class="xe-input-helper"></span>
                                                        <span class="xe-label-text xe-sr-only">선택</span>
                                                    </label>
                                                </span>
                                                    <!-- //관리자 일때 게시물 삭제 및 관리를 위한 체크박스  -->
                                            @endif
                                            <!-- 리스트 댓글 -->
                                                <span class="info-meta__item info-meta__item--comment">댓글 {{ number_format($item->comment_count) }}</span>
                                                <!-- //리스트 댓글 -->
                                        </div>
                                        <div class="info-meta-box__item-box info-meta-box__item-box--right">
                                            <!-- 리스트 좋아요 -->
                                            <span class="info-meta__item info-meta__item--like"><i class="xi-thumbs-up" title="좋아요"></i> {{ number_format($item->accent_count) }}</span>
                                            <!-- //리스트 좋아요 -->
                                            <!-- 리스트 조회수 -->
                                            <span class="info-meta__item info-meta__item--view info-meta__item--last"><i class="xi-eye" title="조회수"></i> {{ number_format($item->read_count) }}</span>
                                            <!-- //리스트 조회수 -->
                                        </div>
                                        <!-- 리스트 추가 메타 내용들, 상황에 맞춰 노출 -->
                                        <div class="info-meta-box__item-box info-meta-box__item-box--other" style="display: none;">
                                            @if ($item->display == $item::DISPLAY_SECRET)
                                                <span class="info-meta__item"><i class="xi-lock" title="비밀글"></i> 비밀글</span>
                                            @endif
                                            @if ($item->data->file_count > 0)
                                                <span class="info-meta__item"><i class="xi-paperclip" title="첨부파일"></i> 첨부파일</span>
                                            @endif
                                            @if (Auth::check() === true)
                                                <a href="{{$urlHandler->get('favorite', ['id' => $item->id])}}" class="info-meta__item info-meta__item--favorite __xe-bd-favorite @if($item->favorite !== null) on @endif"><i class="xi-star-o" title="스크랩"></i> 스크랩</a>
                                            @endif
                                            <span class="info-meta__item">{!! $item->writer !!}</span>
                                                <span class="info-meta__item"><i class="xi-time" title="글작성 시간"></i> <span @if($item->created_at->getTimestamp() > strtotime('-1 month')) data-xe-timeago="{{ $item->created_at }}" @endif>{{ $item->created_at->toDateString() }}</span></span>
                                            <span class="info-meta__item">수정 {{ $item->updated_at->toDateString() }}</span>
                                            {{--<span class="info-meta__item">사용자 추가 항목</span>--}}
                                        </div>
                                        <!-- //리스트 추가 메타 내용들, 상황에 맞춰 노출 -->
                                    </span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                    @foreach($paginate as $item)
                        <div class="xe-col-md-4 board-eastern-skin-item">
                            <!-- [D] 메타 영역 때문에 리스트 아이템 전체 영역 링크 적용하는것 대신 이미지, 제목, 내용 세군데에 링크 적용하는것으로 변경 (세군데 모두 동일한 링크 적용(게시물 상세)) -->
                            <div class="board-eastern-skin-info">
                                <a href="{{$urlHandler->getShow($item, Request::all())}}" title="게시물 상세 이동" class="info-thumbnail-box">
                                    <span class="info-thumbnail" @if($item->board_thumbnail_path) style="background-image: url('{{ $item->board_thumbnail_path }}')" @endif></span>
                                </a>
                                <span class="info-content">
                                    @if ($item->status == $item::STATUS_NOTICE)
                                        <span class="xe-badge xe-primary">{{ xe_trans('xe::notice') }}</span>
                                    @endif
                                    @if ($config->get('category') == true && $item->boardCategory !== null)
                                        <span class="category">{!! xe_trans($item->boardCategory->categoryItem->word) !!}</span>
                                    @endif
                                    <a href="{{$urlHandler->getShow($item, Request::all())}}" class="info-content__title" title="게시물 상세 이동">{!! $item->title !!}</a>
                                    <a href="{{$urlHandler->getShow($item, Request::all())}}" class="info-content__text" title="게시물 상세 이동">{!! mb_substr($item->pure_content, 0, 100) !!}</a>
                                    <span class="info-meta-box">
                                        <div class="info-meta-box__item-box info-meta-box__item-box--left">
                                            @if ($isManager === true)
                                            <!-- 관리자 일때 게시물 삭제 및 관리를 위한 체크박스  -->
                                                <span class="info-meta__item info-meta__item--manage">
                                                    <label class="xe-label info-meta__item-label">
                                                        <input type="checkbox" title="선택" class="bd_manage_check" value="{{ $item->id }}">
                                                        <span class="xe-input-helper"></span>
                                                        <span class="xe-label-text xe-sr-only">선택</span>
                                                    </label>
                                                </span>
                                                <!-- //관리자 일때 게시물 삭제 및 관리를 위한 체크박스  -->
                                            @endif
                                            <!-- 리스트 댓글 -->
                                            <span class="info-meta__item info-meta__item--comment">댓글 {{ number_format($item->comment_count) }}</span>
                                            <!-- //리스트 댓글 -->
                                        </div>
                                        <div class="info-meta-box__item-box info-meta-box__item-box--right">
                                            <!-- 리스트 좋아요 -->
                                            <span class="info-meta__item info-meta__item--like"><i class="xi-thumbs-up" title="좋아요"></i> {{ number_format($item->accent_count) }}</span>
                                            <!-- //리스트 좋아요 -->
                                            <!-- 리스트 조회수 -->
                                            <span class="info-meta__item info-meta__item--view info-meta__item--last"><i class="xi-eye" title="조회수"></i> {{ number_format($item->read_count) }}</span>
                                            <!-- //리스트 조회수 -->
                                        </div>
                                        <!-- 리스트 추가 메타 내용들, 상황에 맞춰 노출 -->
                                        <div class="info-meta-box__item-box info-meta-box__item-box--other" style="display: none;">
                                            @if ($item->display == $item::DISPLAY_SECRET)
                                                <span class="info-meta__item"><i class="xi-lock" title="비밀글"></i> 비밀글</span>
                                            @endif
                                            @if ($item->data->file_count > 0)
                                                <span class="info-meta__item"><i class="xi-paperclip" title="첨부파일"></i> 첨부파일</span>
                                            @endif
                                            @if (Auth::check() === true)
                                                <a href="{{$urlHandler->get('favorite', ['id' => $item->id])}}" class="info-meta__item info-meta__item--favorite __xe-bd-favorite @if($item->favorite !== null) on @endif"><i class="xi-star-o" title="스크랩"></i> 스크랩</a>
                                            @endif
                                            <span class="info-meta__item">{!! $item->writer !!}</span>
                                                <span class="info-meta__item"><i class="xi-time" title="글작성 시간"></i> <span @if($item->created_at->getTimestamp() > strtotime('-1 month')) data-xe-timeago="{{ $item->created_at }}" @endif>{{ $item->created_at->toDateString() }}</span></span>
                                            <span class="info-meta__item">수정 {{ $item->updated_at->toDateString() }}</span>
                                            {{--<span class="info-meta__item">사용자 추가 항목</span>--}}
                                        </div>
                                        <!-- //리스트 추가 메타 내용들, 상황에 맞춰 노출 -->
                                    </span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- //리스트 영역(이전 list-article) -->

            <!-- PAGINATAION PC-->
            {!! $paginate->render('board::components.Skins.Board.Common.views.default-pagination') !!}
            <!-- /PAGINATION PC-->

                <!-- PAGINATAION Mobile -->
            {!! $paginate->render('board::components.Skins.Board.Common.views.simple-pagination') !!}
            <!-- /PAGINATION Mobile -->
        </div>
    </section>
    <!-- //게시판 스킨 카드형 리스트 -->

    @if ($isManager === true)
        <a class="xe-btn xe-btn-primary" href="{{ $urlHandler->get('create') }}">글쓰기</a>
        <a class="xe-btn xe-btn-default" href="{{ $urlHandler->managerUrl('config', ['boardId'=>$instanceId]) }}">관리하기</a>
    @endif


</div>
