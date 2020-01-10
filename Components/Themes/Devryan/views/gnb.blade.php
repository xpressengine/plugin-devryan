{{ app('xe.frontend')->js([
    $_theme::asset('js/gnb.js')
])->load()}}

<nav class="header-gnb header-gnb--right">
    <ul class="header-gnb-list">
        @foreach (menu_list($config->get('mainMenu')) as $menu)
            <li>
                <a href="{{ url($menu['url']) }}" class="header-gnb-list__link @if ($menu['target'] == '_blank') header-gnb-list__link--target-blank @endif " @if ($menu['target'] == '_blank') title="외부링크 새창 이동" @endif target="{{ $menu['target'] }}" @if ($menu['url'] == '#') onclick="return false;" @endif>
                    <span class="header-gnb-list__link-text">{{ $menu['link'] }} <i class="xi-external-link"></i></span>
                </a>

                @if (count($menu['children']))
                    <ul class="header-gnb-list-depth">
                        @foreach ($menu['children'] as $menu1)
                            <li>
                                <a href="{{ url($menu1['url']) }}" class="header-gnb-list-depth__link @if ($menu1['target'] == '_blank') header-gnb-list__link--target-blank @endif " @if ($menu1['target'] == '_blank') title="외부링크 새창 이동" @endif target="{{ $menu1['target'] }}" @if ($menu1['url'] == '#') onclick="return false;" @endif>
                                    <span class="header-gnb-list__link-text">{{ $menu1['link'] }} <i class="xi-external-link"></i></span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</nav>

