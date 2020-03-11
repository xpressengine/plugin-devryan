@if($config->_useSubSidemenu)
    <ul class="reset-list list-group theme-sidebar">
        @foreach ($config->_selectedMainMenu['children'] as $menu)
            <li class="list-group-item @if($menu['selected']) active @endif">
                <a href="{{ url($menu['url']) }}" class="list-group-item-action">
                    <span>{{ $menu['link'] }}</span>
                </a>

                @if(count($menu['children']))
                    @if($config->get('openSubSidebar', 'Y') || ($config->get('openSubSidebar', 'Y') === 'N' && $menu['selected']))
                        <ul class="reset-list list-group--sub">
                            @foreach ($menu['children'] as $menu3depth)
                                <li class="list-group-item @if($menu3depth['selected']) active @endif">
                                    <a href="{{ url($menu3depth['url']) }}" class="list-group-item-action">
                                        <span>{{ $menu3depth['link'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @endif
            </li>
        @endforeach
    </ul>
@endif
