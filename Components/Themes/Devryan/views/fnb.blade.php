@if($config->get('useFooterMenu', 'Y') === 'Y')
    <nav>
        <ul class="footer-menu-list">
            @foreach (menu_list($config->get('footerMenu')) as $menu)
                <li>
                    <a href="{{ url($menu['url']) }}" class="gnb__menu-link @if ($menu['target'] == '_blank') header-gnb-list__link--target-blank @endif " @if ($menu['target'] !== '_self') target="{{ $menu['target'] }}" @endif>
                        <span class="gnb__menu-link-text">{{ $menu['link'] }}@if ($menu['target'] == '_blank') <i class="xi-external-link"></i>@endif</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endif
