<ul class="gnb__menu">
    @foreach (menu_list($config->get('mainMenu')) as $menu)
        @php
            // 선택된 메뉴
            if ($menu['selected']) {
                $config->_selectedMainMenu = $menu;
            }
        @endphp

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

                        @if (count($children['children']))
                            <ul class="gnb__submenu">
                                @foreach ($children['children'] as $menu3depth)
                                <li>
                                    <a href="{{ url($menu3depth['url']) }}"
                                        class="gnb__submenu-link @if ($menu3depth['target'] == '_blank') header-gnb-list__link--target-blank @endif "
                                        @if ($menu3depth['target'] && $menu3depth['target'] !== '_self')
                                            target="{{ $menu3depth['target'] }}"
                                        @endif
                                        @if ($menu3depth['url'] === '#') onclick="return false;" @endif>
                                        <span class="gnb__menu-link-text">{{ $menu3depth['link'] }} @if ($menu3depth['target'] === '_blank') <i class="xi-external-link"></i>@endif</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
