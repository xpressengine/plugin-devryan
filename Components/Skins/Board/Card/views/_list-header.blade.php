<div class="together-board-list__header">
    <div class="clearfix">
        <div class="pull-left">
            @if ($isManager === true)
                <div class="xe-form-inline">
                    {{-- <button type="button" class="xe-btn xe-btn-primary">게시글 관리</button> --}}
                    {{-- 카테고리 --}}
                    @php
                        $buttonTitle = 'xe::category';
                        $categoryItemId = Request::get('category_item_id');
                        if(!is_null($categoryItemId)) {
                            foreach ($categories as $item) {
                                if ($item['value'] == $categoryItemId) {
                                    $buttonTitle = $item['text'];
                                    break;
                                }
                            }
                        }
                    @endphp
                    <div class="list-header list-header-- xe-dropdown">
                        <button class="xe-btn __board-search-category-label" type="button" data-toggle="xe-dropdown" aria-expanded="false">{{ xe_trans($buttonTitle) }}</button>
                        <ul class="xe-dropdown-menu __board-search-category" data-name="category_item_id">
                            <li @if($categoryItemId) class="on" @endif><a href="#">{{ xe_trans('xe::category') }}</a></li>
                            @foreach ($categories as $item)
                            <li @if($categoryItemId == (string)$item['value']) class="on" @endif><a href="#" data-value="{{ $item['value'] }}">{{ xe_trans($item['text']) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- END:카테고리 --}}

                    {{-- 정렬 --}}
                    @php
                        $buttonTitle = 'xe::order';
                        $orderType = Request::get('order_type');
                        if(!is_null($orderType)) {
                            foreach ($handler->getOrders() as $item) {
                                if ($item['value'] == $orderType) {
                                    $buttonTitle = $item['text'];
                                    break;
                                }
                            }
                        }
                    @endphp

                    <div class="xe-dropdown">
                        <input type="hidden" name="order_type" value="{{ $orderType }}" data-valid-name="{{ xe_trans('xe::order') }}" />
                        <button class="xe-btn" type="button" data-toggle="xe-dropdown" aria-expanded="false">{{ xe_trans($buttonTitle) }}</button>
                        <ul class="xe-dropdown-menu __board-search-order" data-name="order_type">
                            <li @if($orderType) class="on" @endif><a href="#">{{ xe_trans('xe::order') }}</a></li>
                            @foreach ($handler->getOrders() as $item)
                            <li @if($orderType == (string)$item['value']) class="on" @endif><a href="#" data-value="{{ $item['value'] }}">{{ xe_trans($item['text']) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    {{-- END:정렬 --}}
                </div>
            @endif
        </div>

        <div class="tools xe-form-inline pull-right">
            <button type="button" class="tools__item __board-search-form--open" title="{{ xe_trans('xe::search') }}"><i class="xi-search"></i></button>



        </div>
    </div>

    @include($_skinPath.'/views/_list-search')
</div>
<!-- END:together-board__header -->
