{{ app('xe.frontend')->js([
    'plugins/devryan_theme/src/Components/Themes/Devryan/assets/js/gnb.js',
])->load()}}

<nav class="gnb gnb--pc @if (Auth::check() == true) gnb--login-on @endif">
    <ul class="gnb__menu">
        @foreach (menu_list($config->get('gnb')) as $menu)
            <li class="@if ($menu['selected']) on @endif">
                <a href="{{ url($menu['url']) }}" class="gnb__menu-link @if ($menu['target'] == '_blank')  gnb__menu-link--target-blank @endif " target="{{ $menu['target'] }}" @if ($menu['url'] == '#') onclick="return false;" @endif>
                    <span class="gnb__menu-link-text">{{ $menu['link'] }} <i class="xi-external-link"></i></span>
                </a>

                @if (count($menu['children']))
                    <ul class="gnb__submenu">
                        @foreach ($menu['children'] as $menu1)
                            <li class="@if ($menu1['selected']) on @endif">
                                <a href="{{ url($menu1['url']) }}" class="gnb__submenu-link @if ($menu1['target'] == '_blank')  gnb__menu-link--target-blank @endif " target="{{ $menu1['target'] }}">
                                    <span class="gnb__menu-link-text">{{ $menu1['link'] }} <i class="xi-external-link"></i></span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>

    @if (Auth::check() == true)
        <!-- class="gnb__login-thumb", class="gnb__login-nick" 클릭 시 class="open" 추가 -->
        <div class="gnb__login-info">
            <div class="gnb__login-thumb-box">
                <!-- 로그인 썸네일 이미지 적용 -->
                <button type="button" class="gnb__login-thumb" tabindex=0 style="background-image: url({{ Auth::user()->getProfileImage() }})"></button>
            </div>

            <div class="gnb__login-info-content">
                <div class="gnb__login-info-user">
                    <!-- [D] class="gnb__login-info-user-link" 영역 프로필 링크 적용 -->
                    <a href="{{ route('user.profile', ['user' => auth()->id()]) }}" class="gnb__login-info-user-link">
                        <span class="gnb__login-info-user-thumb" style="background-image: url({{ Auth::user()->getProfileImage() }})"></span>
                        <span class="gnb__login-info-user-nick-box">
                            <span class="gnb__login-info-user-nick">{{ Auth::user()->getDisplayName() }}</span>
                        </span>
                    </a>
                    @if (Auth::user()->isAdmin() == true)
                    <!-- 관리자 일 때만 노출 -->
                    <a href="{{ route('settings') }}" class="gnb__login-info-user-admin-link">관리자 설정</a>
                    <!-- //관리자 일 때만 노출 -->
                    @endif
                </div>
                <ul class="gnb__login-link-list">
                    {!! $config->get('gnbPcMyBtn') !!}
                    <li>
                        <a href="{{ route('user.settings') }}" class="gnb__login-link">
                            <i class="xi-user-o"></i>
                            내 정보
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="gnb__login-link">
                            <i class="xi-power-off"></i>
                            로그아웃
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    @else
        <div class="header-button-box" style="display: block;">
            <a href="{{ route('login') }}" class="header-button-login">로그인</a>
            <a href="{{ route('auth.register') }}" class="header-button-login">회원가입</a>
        </div>
    @endif
</nav>

<nav class="gnb gnb--mobile @if (Auth::check() == true) gnb--login-on @endif">
    <div class="gnb-inner">
        <!-- 로그인 되었을 때 노출 -->
        @if (Auth::check() == true)
            <div class="gnb__login-info">
                <div class="gnb__login-info-content">
                    <div class="gnb__login-info-user">
                        <!-- [D] class="gnb__login-info-user-link" 영역 프로필 링크 적용 -->
                        <a href="{{ route('user.profile', ['user' => auth()->id()]) }}" class="gnb__login-info-user-link">
                            <span class="gnb__login-info-user-thumb" style="background-image: url({{ Auth::user()->getProfileImage() }})"></span>
                            <span class="gnb__login-info-user-nick-box">
                                <span class="gnb__login-info-user-nick">{{ Auth::user()->getDisplayName() }}</span>
                            </span>
                        </a>
                        @if (Auth::user()->isAdmin())
                        <!-- 관리자 일 때만 노출 -->
                        <a href="{{ route('settings') }}" class="gnb__login-info-user-admin-link">관리자 설정</a>
                        <!-- //관리자 일 때만 노출 -->
                        @endif
                    </div>
                    <ul class="gnb__login-link-list">
                        {!! $config->get('gnbMobileMyBtn') !!}
                        <li>
                            <a href="{{ route('user.settings') }}" class="gnb__login-link">
                                <i class="xi-user-o"></i>
                                내 정보
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="gnb__login-link">
                                <i class="xi-power-off"></i>
                                로그아웃
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        @endif

        @if (Auth::check() == false)
            <!-- 로그인 되지 않았을 때 노출 -->
            <div class="header-button-mobile-box">
                <a href="{{ route('login') }}" class="header-button-login">로그인</a>
                <a href="{{ route('auth.register') }}" class="header-button-login">회원가입</a>
            </div>
            <!-- //로그인 되지 않았을 때 노출 -->
        @endif

        <ul class="gnb__menu">
            @foreach (menu_list($config->get('gnb')) as $menu)
                <li class="@if ($menu['selected']) on @endif">
                    <a href="{{ url($menu['url']) }}" class="gnb__menu-link @if ($menu['target'] == '_blank')  gnb__menu-link--target-blank @endif " target="{{ $menu['target'] }}">
                        <span class="gnb__menu-link-text">{{ $menu['link'] }} <i class="xi-external-link"></i></span>
                    </a>

                    @if (count($menu['children']))
                        <ul class="gnb__submenu">
                            @foreach ($menu['children'] as $menu1)
                                <li class="@if ($menu1['selected']) on @endif">
                                    <a href="{{ url($menu1['url']) }}" class="gnb__submenu-link @if ($menu1['target'] == '_blank')  gnb__menu-link--target-blank @endif " target="{{ $menu1['target'] }}">
                                        <span class="gnb__menu-link-text">{{ $menu1['link'] }} <i class="xi-external-link"></i></span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>

        <!-- 2019/12/02 - 페이지 개편 시 GNB 메뉴 닫기 제거 됨 (우선 스타일로 display: none 적용해 놓았음), LJH -->
        <button type="button" class="gnb__button-menu"><span class="blind">GNB 메뉴 닫기</span></button>
    </div>
</nav>
