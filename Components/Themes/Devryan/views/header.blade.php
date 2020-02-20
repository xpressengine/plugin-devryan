<header id="header" class="header menu--open">
    <div class="header-inner-box">
        <h1 class="logo">
            @if($config->get('logoType', 'text') === 'text')
                <!-- [D] 로고 이미지 없을 때 텍스트 노출 -->
                <!-- <a href="/" class="header-info-logo__link">Entrada</a> -->
                <a href="/" class="header-info-logo__link">
                    {{ xe_trans($config->get('logoText', 'asefasef')) }}
                </a>
            @else
                <!-- [D] 로고 이미지 있을 때 노출 -->
                <a href="/" class="header-info-logo__link">
                    <img src="{{ $config->get('logoImage.path', 'plugins/entrada_theme/src/Components/Themes/Entrada/assets/img/img-logo.png') }}" class="header-info-logo__image" alt="{{ xe_trans($config->get('logoText', 'Entrada')) }}">
                </a>
            @endif
        </h1>
        <button type="button" class="header__button-menu" style="font-size: 30px;"><i class="xi-bars"></i><span class="blind">모바일 메뉴버튼</span></button>

        <nav class="gnb gnb--pc ">
            @include($theme::view('gnb'))

            <div class="header-button-box">
                @if (Auth::check() == false)
                <a href="{{ route('login') }}" class="header-button-login">로그인</a>
                <a href="{{ route('auth.register') }}" class="header-button-login">회원가입</a>
                @else
                <a href="{{ route('user.profile', ['user' => auth()->id()]) }}" class="header-button-login">
                    {{ Auth::user()->getDisplayName() }}
                </a>
                @if (Auth::user()->isAdmin() == true)
                <a href="{{ route('settings') }}" class="header-button-login">관리자 설정</a>
                @endif
                <a href="{{ route('user.settings') }}" class="header-button-login">내 정보</a>
                <a href="{{ route('logout') }}" class="header-button-login">로그아웃</a>
                @endif
            </div>
        </nav>

        <nav class="gnb gnb--mobile ">
            <div class="gnb-inner">
                <!-- 로그인 되었을 때 노출 -->

                <!-- 로그인 되지 않았을 때 노출 -->
                <div class="header-button-mobile-box">
                    @if (Auth::check() == false)
                    <a href="{{ route('login') }}" class="header-button-login">로그인</a>
                    <a href="{{ route('auth.register') }}" class="header-button-login">회원가입</a>
                    @else
                    <a href="{{ route('user.profile', ['user' => auth()->id()]) }}" class="header-button-login">
                        {{ Auth::user()->getDisplayName() }}
                    </a>
                    @if (Auth::user()->isAdmin() == true)
                    <a href="{{ route('settings') }}" class="header-button-login">관리자 설정</a>
                    @endif
                    <br>
                    <a href="{{ route('user.settings') }}" class="header-button-login">내 정보</a>
                    <a href="{{ route('logout') }}" class="header-button-login">로그아웃</a>
                    @endif
                </div>
                <!-- //로그인 되지 않았을 때 노출 -->

                @include($theme::view('gnb'))

                <!-- 2019/12/02 - 페이지 개편 시 GNB 메뉴 닫기 제거 됨 (우선 스타일로 display: none 적용해 놓았음), LJH -->
                <button type="button" class="gnb__button-menu"><span class="blind">GNB 메뉴 닫기</span><i class="xi-close"></i></button>
            </div>
        </nav>

        <!-- 모바일 메뉴 오픈 시 class="gnb__dimmed" 영역에 class="open" 추가 -->
        <div class="gnb__dimmed"></div>
    </div>
</header>
