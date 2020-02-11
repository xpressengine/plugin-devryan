<ul class="gnb__menu">
    @foreach (menu_list($config->get('mainMenu')) as $menu)
        <li>
            <a href="{{ url($menu['url']) }}" class="gnb__menu-link @if ($menu['target'] == '_blank') header-gnb-list__link--target-blank @endif " @if ($menu['target'] !== '_self') target="{{ $menu['target'] }}" @endif>
                <span class="gnb__menu-link-text">{{ $menu['link'] }}@if ($menu['target'] == '_blank') <i class="xi-external-link"></i>@endif</span>
            </a>

            @if (count($menu['children']))
                <ul class="gnb__submenu">
                    @foreach ($menu['children'] as $children)
                    <li>
                        <a href="{{ url($children['url']) }}"
                            class="gnb__submenu-link @if ($children['target'] == '_blank') header-gnb-list__link--target-blank @endif "
                            @if ($children['target'] && $children['target'] !== '_self')
                                target="{{ $children['target'] }}"
                            @endif
                            @if ($children['url'] === '#') onclick="return false;" @endif>
                            <span class="gnb__menu-link-text">{{ $children['link'] }} @if ($children['target'] === '_blank') <i class="xi-external-link"></i>@endif</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
