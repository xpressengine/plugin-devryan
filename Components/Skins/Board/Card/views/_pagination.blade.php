{{--한 페이지에 10개 씩 표현되는 페이지네이션--}}
<?php
$__pageCount = 10;
$__start = (intval(($paginator->currentPage() - 1) / $__pageCount) * $__pageCount) + 1;
?>

@if ($paginator->hasPages())
    <div class="board-paging">
        @if($paginator->currentPage() <= 1)
            <a class="paging-item paging-item--prev" title="이전"><i class="xi-angle-left-min"></i></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="paging-item paging-item--prev" title="이전"><i class="xi-angle-left-min"></i></a>
        @endif

        <div class="paging__box paging__box--normal">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="paging-item">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <a href="{{ htmlentities($url) }}" class="paging-item @if($page == $paginator->currentPage()) paging-item--active @endif">{{ $page }}</a>
                    @endforeach
                @endif
            @endforeach
        </div>

        <div class="paging__box paging__box--simple">
            <span class="paging__box-items"><strong class="paging-item paging-item--active">{{ $paginator->currentPage() }}</strong> / <span clas="paging-item">{{ $paginator->lastPage() }}</span></span>
        </div>

        @if(!$paginator->hasMorePages())
            <a class="paging-item paging-item--next paging-item--disabled" title="다음"><i class="xi-angle-right-min"></i></a>
        @else
            <a href="{{ $paginator->nextPageUrl() }}" class="paging-item paging-item--next" title="다음"><i class="xi-angle-right-min"></i></a>
        @endif
    </div>
@endif
