@if($config->_selectedMainMenu)
    <ul class="reset-list list-group theme-sidebar">
        @foreach ($config->_selectedMainMenu['children'] as $menu)
            <li class="list-group-item @if($menu['selected']) active @endif">
                <a href="{{ url($menu['url']) }}" class="list-group-item-action">
                    <span>{{ $menu['link'] }}</span>
                </a>

                @if($menu['selected'] && count($menu['children']))
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
            </li>
        @endforeach
    </ul>
@endif
