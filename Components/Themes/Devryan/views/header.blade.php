<header id="header" class="xe-theme__header header menu--open">
    <div class="header-inner-box {{ $config->_mainMenuContainerClass }}">
        <h1 class="header__logo logo">
            <a href="{{ $config->get('logoLink', '/') }}" class="header__logo-link "header-info-logo__link">
                @if($config->get('logoType', 'text') === 'text')
                    {{ xe_trans($config->get('logoText', 'asefasef')) }}
                @else
                    <img src="{{ $config->get('logoImage.path', asset('assets/core/settings/img/logo.png')) }}" class="header-info-logo__image" alt="{{ xe_trans($config->get('logoText', '')) }}">
                @endif
            </a>
        </h1>
        <button type="button" class="header__button-menu" style="font-size: 30px;"><i class="xi-bars"></i><span class="blind">모바일 메뉴버튼</span></button>

        <nav class="xe-theme__gnb gnb gnb--pc">
            <div class="gnb-inner">
                @include($theme::view('gnb'))

                <div class="header-button-box">
                    @if (Auth::check() == false)
                        <a href="{{ route('login') }}" class="header-button-login">{{ xe_trans('xe::login') }}</a>
                        <a href="{{ route('auth.register') }}" class="header-button-login">{{ xe_trans('xe::signUp') }}</a>
                    @else
                        <a href="{{ route('user.profile', ['user' => auth()->id()]) }}" class="header-button-login">
                            {{ Auth::user()->getDisplayName() }}
                        </a>
                        @if (Auth::user()->isAdmin() == true)
                            <a href="{{ route('settings') }}" class="header-button-login" target="_blank">{{ xe_trans('xe::management') }}</a>
                        @endif
                        <a href="{{ route('user.settings') }}" class="header-button-login">내 정보</a>
                        <a href="{{ route('logout') }}" class="header-button-login">{{ xe_trans('xe::logout') }}</a>
                    @endif
                </div>
            </div>
        </nav>

        <nav class="xe-theme__gnb gnb gnb--mobile">
            <div class="gnb-inner">
                <div class="header-button-mobile-box">
                    @if (Auth::check() == false)
                        <a href="{{ route('login') }}" class="header-button-login">{{ xe_trans('xe::login') }}</a>
                        <a href="{{ route('auth.register') }}" class="header-button-login">{{ xe_trans('xe::signUp') }}</a>
                    @else
                        <a href="{{ route('user.profile', ['user' => auth()->id()]) }}" class="header-button-login">
                            {{ Auth::user()->getDisplayName() }}
                        </a>
                        @if (Auth::user()->isAdmin() == true)
                            <a href="{{ route('settings') }}" class="header-button-login" target="_blank">{{ xe_trans('xe::management') }}</a>
                        @endif
                        <br>
                        <a href="{{ route('user.settings') }}" class="header-button-login">내 정보</a>
                        <a href="{{ route('logout') }}" class="header-button-login">{{ xe_trans('xe::logout') }}</a>
                    @endif
                </div>

                @include($theme::view('gnb'))

                <!-- 2019/12/02 - 페이지 개편 시 GNB 메뉴 닫기 제거 됨 (우선 스타일로 display: none 적용해 놓았음), LJH -->
                <button type="button" class="gnb__button-menu"><span class="blind">GNB 메뉴 닫기</span><i class="xi-close"></i></button>
            </div>
        </nav>

        <!-- 모바일 메뉴 오픈 시 class="gnb__dimmed" 영역에 class="open" 추가 -->
        <div class="gnb__dimmed"></div>
    </div>
</header>
