@php
    $categoryItemId = Request::get('category_item_id');
    $orderType = Request::get('order_type');
@endphp

<div class="board-search __board-search-container clearfix">
    <form method="get" class="board-search__form __board-search-form" action="{{ $urlHandler->get('index') }}">
        <div class="search-form search-form__simple">
            <input type="text" name="title_pure_content" class="search-form__subject" title="게시판 검색" placeholder="검색어를 입력하세요" value="{{ Request::get('title_pure_content') }}">
            <button type="submit" class="search-form__button search-form__button--icon" title="검색"><i class="xi-search"></i></button>
            <button type="button" class="search-form__button search-form__button--detail __board-search-form--detail">상세 검색 <span class="caret"></span></button>
        </div>

        <div class="search-form search-form__detail">
            <div class="">
                @if ($isManager === true)
                    <div class="xe-row search-form__row">
                        <div class="xe-col-sm-6">
                            <div class="xe-row">
                                <div class="xe-col-sm-3">
                                    <label class="xe-control-label">분류</label>
                                </div>
                                <div class="xe-col-sm-9">
                                    <select name="category_item_id" class="xe-form-control">
                                        <option value="">분류</option>
                                        @foreach ($categories as $category)
                                            <option @if($categoryItemId == (string)$category['value']) selected @endif value="{{ $category['value'] }}">{{ xe_trans($category['text']) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="xe-col-sm-6">
                            <div class="xe-row">
                                <div class="xe-col-sm-3">
                                    <label class="xe-control-label">정렬</label>
                                </div>
                                <div class="xe-col-sm-9">
                                    <select name="order_type" class="xe-form-control">
                                        <option value="">정렬</option>
                                        @foreach($handler->getOrders() as $item)
                                            <option @if($orderType == (string)$item['value']) selected @endif value="{{ $item['value'] }}">{{ xe_trans($item['text']) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- 확장 필드 검색 --}}
                @if(isset($fieldTypes))
                    <div class="xe-row search-form__row">
                        @foreach($fieldTypes as $field)
                            @if($field->get('searchable') === true)
                                <div class="xe-col-md-6">
                                    <div class="xe-row">
                                        <div class="xe-col-sm-3">
                                            <label class="xe-control-label">{{ xe_trans($field->get('label')) }}</label>
                                        </div>
                                        <div class="xe-col-sm-9">
                                            {!! XeDynamicField::get($config->get('documentGroup'), $field->get('id'))->getSkin()->search(Request::all()) !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="search-form__control clearfix">
                <div class="xe-pull-right">
                    <button type="submit" class="xe-btn xe-btn-primary">검색</button>
                    <button type="button" class="xe-btn xe-btn-secondary __board-search-form--reset">취소</button>
                </div>
            </div>
        </div>
    </form>
</div>
