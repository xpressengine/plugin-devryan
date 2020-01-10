{{--한 페이지에 10개 씩 표현되는 페이지네이션--}}
<?php
$__pageCount = 10;
$__start = (intval(($paginator->currentPage() - 1) / $__pageCount) * $__pageCount) + 1;
?>

@if ($paginator->hasPages())
    <div class="board-paging">
        <a href="{{ $paginator->url($__start - 1) }}" class="paging-item paging-item--prev" title="이전"><i class="xi-angle-left-min"></i></a>
        <div class="paging__box paging__box--normal">
            @for($__i = $__start; $__i < $__start + $__pageCount; ++$__i)
                @if ($__i > $paginator->lastPage())
                    @break;
                @endif
                @if ($__i == $paginator->currentPage())
                    <a href="{{ $paginator->url($__i) }}" class="paging-item  paging-item--active ">{{ $__i }}</a>
                @else
                    <a href="{{ $paginator->url($__i) }}" class="paging-item ">{{ $__i }}</a>
                @endif
            @endfor
        </div>

        <div class="paging__box paging__box--simple">
            <span class="paging__box-items">
                @for($__i = $__start; $__i < $__start + $__pageCount; ++$__i)
                    @if ($__i > $paginator->lastPage())
                        @break;
                    @endif
                        @if ($__i == $paginator->currentPage())
                            <strong class="paging-item paging-item--active">{{ $__i }}</strong>
                            <a href="{{ $paginator->url($__i) }}" class="paging-item  paging-item--active ">{{ $__i }}</a>
                        @else
                            <span class="paging-item">{{ $__i }}</span>
                        @endif
                @endfor
            </span>
        </div>
        <a href="{{ $paginator->url(min($__start + $__pageCount,$paginator->lastPage())) }}" class="paging-item paging-item--next" title="다음"><i class="xi-angle-right-min"></i></a>
    </div>
@endif

