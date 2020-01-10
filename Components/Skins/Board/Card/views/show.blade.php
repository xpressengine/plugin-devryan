{{-- 기본 썸네일 --}}
@if($item->thumb == null || !$item->thumb->board_thumbnail_path || $item->display === $item::DISPLAY_SECRET)
    @php $articleImage = ''; @endphp
@else
    @php $articleImage = $item->thumb->board_thumbnail_path; @endphp
@endif

<div class="board-show">
    <article class="board-article">
        <header class="board-article__header clearfix">
            <div class="article-header__title">
                {{-- 카테고리 --}}
                @if ($item->boardCategory != null) <em class="article-meta article-meta__category">{!! xe_trans($item->boardCategory->categoryItem->word) !!}</em> @endif

                {{-- 제목 --}}
                <h2 class="board-article__title">
                    <span class="article-header__title-text">{!! $item->title !!}</span>
                    @if($item->isNew($config->get('newTime')))
                        <span class="article-header__new"><i class="xi-new"></i><span class="xe-sr-only">new</span></span>
                    @endif
                </h2>
            </div>

        <!-- <div class="board-article__header-meta-box">
                @if (($fieldType = XeDynamicField::get($config->get('documentGroup'), 'author')) != null)
            <div class="article-header__author">
                {!! $fieldType->getSkin()->output('author', $item->getAttributes()) !!}
                    </div>
                @endif

        {{-- meta --}}
                <dl class="article-header__meta-wrap">
                    @foreach ($skinConfig['listColumns'] as $columnName)
            {{-- $columnClassName: class 속성에 사용될 이름 --}}
            @php
                $columnClassName = 'article-meta article-meta__column-' . str_replace(['_at', '_'], ['', '-'], $columnName)
            @endphp

            @if ($columnName == 'title')
                {{-- 글 제목은 별도로 표시하므로 여기에는 표시하지 않음 --}}
            @elseif ($columnName == 'read_count' || $columnName == 'assent_count')
                <dt>{{ xe_trans('board::' . $columnName) }}</dt>
                            <dd class="{{ $columnClassName }}">{{ number_format($item->read_count) }}</dd>
                        @elseif (($fieldType = XeDynamicField::get($config->get('documentGroup'), $columnName)) != null)
                @if($columnName != 'author')
                    <dd class="{{ $columnClassName }}">{!! $fieldType->getSkin()->output($columnName, $item->getAttributes()) !!}</dd>
                            @endif
            @else
                {{-- 기타 지정되지 않은 항목 --}}
                        <dt>{{ xe_trans('board::' . $columnName) }}</dt>
                            <dd class="{{ $columnClassName }}">{{ $item->{$columnName} }}</dd>
                        @endif
        @endforeach
                </dl>
            </div> -->

            @if ($articleImage != '')
                <!-- [D] 등록된 이미지 적용 -->
                <div class="article-header__image article-header__image--cover" style="background-image: url({{$articleImage}})"></div>
            @endif
        </header>

        <section class="board-article__body">
            {!! compile($item->instance_id, $item->content, $item->format === Xpressengine\Plugins\Board\Models\Board::FORMAT_HTML) !!}
        </section>

        @if ($config->get('useTag') == true && false && count($item->files) > 0)
            <footer class="board-article__footer">
                @if ($config->get('useTag') == true)
                    <div class="board-article__tag">
                        @foreach ($item->tags->toArray() as $tag)
                            <a href="{{ $urlHandler->get('index', ['searchTag' => $tag['word']], $item->instanceId) }}" class="article-tag">#{{ $tag['word'] }}</a>
                        @endforeach
                    </div>
                @endif

                @if (false && count($item->files) > 0)
                    <div class="board-article__attached">
                        <div class="box-file">
                            <button type="button" class="btn-file"><i class="xi-paperclip"></i> {{ trans('board::fileAttachedList') }} {{ $item->data->file_count }}개</button>
                        </div>
                        <ul class="list-file reset-list" style="display: none;">
                            @foreach($item->files as $file)
                                <li class="item-file">
                                    <a href="{{ route('editor.file.download', ['instanceId' => $item->instance_id, 'id' => $file->id])}}" class="link-file"><i class="xi-download"></i> {{ $file->clientname }} <span class="file_size">({{ bytes($file->size) }})</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </footer>
        @endif

        <div class="board-article__function clearfix">
            <div class="tools xe-form-inline xe-pull-left">
                {{-- 추천 버튼 --}}
                <button type="button" data-url="{{ $urlHandler->get('vote', ['option' => 'assent', 'id' => $item->id]) }}" class="tools__item tool__assent __act-article-assent @if($handler->hasVote($item, Auth::user(), 'assent') === true) active @endif" title="{{ xe_trans('board::like') }}"><i class="xi-heart-o"></i></button>
                {{-- 추천 수 --}}
                <button type="button" data-url="{{ $urlHandler->get('votedUsers', ['option' => 'assent', 'id' => $item->id]) }}" class="tools__item tools__item--assent tool__assent-number" data-id="{{$item->id}}">{{ number_format($item->assent_count) }}</button>

                {{-- favorite --}}
                @if (Auth::check() === true)
                    <button type="button" data-url="{{$urlHandler->get('favorite', ['id' => $item->id])}}" data-favorite="{{ !!$item->favorite }}" class="tools__item tools__item--favorite tool__favorite __act-article-favorite @if($item->favorite !== null) tool__favorite--active @endif" title="{{ trans('board::favorite') }}"><i class="xi-star-o"></i></button>
                @endif

                {{-- 공유 --}}
                {!! uio('share', [ 'item' => $item, 'url' => Request::url(), 'className' => 'tools__item tools__item--favorite' ]) !!}
            </div>

            <div class="tools xe-form-inline xe-pull-right">
                @if($isManager == true || $item->user_id == Auth::user()->getId() || $item->user_type === $item::USER_TYPE_GUEST)
                    <a href="{{ $urlHandler->get('edit', array_merge(Request::all(), ['id' => $item->id])) }}" class="tools__item">
                        <i class="xi-eraser"></i><span class="xe-sr-only">{{ xe_trans('xe::update') }}</span>
                    </a>
                    <a href="#" class="bd_ico bd_delete tools__item" data-url="{{ $urlHandler->get('destroy', array_merge(Request::all(), ['id' => $item->id])) }}" title="{{ xe_trans('xe::delete') }}"><i class="xi-trash"></i></a>
                @endif
                <a href="{{ $urlHandler->get('index', array_merge(Request::all())) }}" class="tools__item"><i class="xi-list"></i><span class="blind">목록 보기</span></a>

                <button type="button" class="tools__item" data-toggle="xe-page-toggle-menu" data-url="{{route('toggleMenuPage')}}" data-data='{!! json_encode(['id'=>$item->id,'type'=>'module/board@board','instanceId'=>$item->instance_id]) !!}' data-side="dropdown-menu-right"><i class="xi-ellipsis-v"></i><span class="blind">{{ xe_trans('xe::more') }}</span></button>
            </div>
        </div>

        <aside class="board-article__aside">
            <!-- 댓글 -->
            @if ($config->get('comment') === true && $item->boardData->allow_comment === 1)
                <section class="board-article__comment">
                    <div class="__xe_comment board_comment">
                        {!! uio('comment', ['target' => $item]) !!}
                    </div>
                </section>
        @endif
        <!-- // 댓글 -->
        </aside>
    </article>
</div>

@if (isset($withoutList) === false || $withoutList === false)
    <!-- 리스트 -->
    @include($_skinPath.'/views/index')
@endif