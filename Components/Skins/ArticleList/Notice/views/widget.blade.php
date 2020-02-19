@php
    use Xpressengine\Plugins\Devryan\Plugin;
    app('xe.frontend')->css([
        $_skin::asset('css/widget-xe-board-notice.css'),
        Plugin::asset()'plugins/devryan/Components/Themes/Devryan/assets/css/eastern-widget.css'
    ])->load()
@endphp
{{-- {{ app('xe.frontend')->css([
    $_skin::asset('css/widget-xe-board-notice.css'),
    'plugins/devryan/Components/Themes/Devryan/assets/css/eastern-widget.css'
])->load() }} --}}

<section class="xe-widget-board-notice">
    <div class="xe-widget-board-notice__info">
        <h2 class="xe-widget-board-notice__info-title">{{ $widgetConfig['@attributes']['title'] }}</h2>
        @if ($more)
            @php
                $instanceId = $menuItem->id;
                $urlMore = instance_route('index', [], $instanceId);
                if (starts_with($widgetConfig['board_id'], 'category.')) {
                    $categoryId = str_after($widgetConfig['board_id'], 'category.');
                    $urlMore = instance_route('index', ['category_item_id' => $categoryId], $instanceId);
                }
            @endphp
            <a href="{{ $urlMore }}" class="xe-widget-board-notice__info-more-link">전체보기</a>
        @endif
    </div>

    <ul class="list-notice-tfc reset-list">
        @foreach ($list as $idx => $item)
            <li class="item-notice">
                <a href="{{ $urlHandler->getShow($item) }}" class="link-notice">
                    <strong class="title-notice">{{ $item->title }}</strong>
                    <span class="text-notice-date">{{ $item->created_at->format('Y-m-d') }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</section>
