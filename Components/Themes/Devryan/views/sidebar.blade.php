@if($config->_selectedMainMenu)
    <ul class="reset-list list-group">
        @foreach ($config->_selectedMainMenu['children'] as $menu)
            <li class="list-group-item @if($menu['selected']) active @endif">
                <a href="{{ url($menu['url']) }}" class="list-group-item-action">
                    <span>{{ $menu['link'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
@endif

{{ uio('widgetbox', ['id'=>'dashboard']) }}
