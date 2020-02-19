@include($theme::view('_setup'))
@include($theme::view('_setup-custom'))

<link href="https://cdn.jsdelivr.net/npm/xeicon@2.3/xeicon.min.css" type="text/css" rel="stylesheet" media="all">
<link href="https://cdn.jsdelivr.net/gh/xpressengine/xpressengine-ui/dist/css/xe-ui.css" type="text/css" rel="stylesheet" media="all">

{{ app('xe.frontend')->js([
    $_theme::asset('js/eastern-theme.js'),
    $_theme::asset('js/slick.min.js'),
    $_theme::asset('js/gnb.js'),
])->load()}}

{{ app('xe.frontend')->css([
    $_theme::asset('css/xe-ui-without-base.css'),
    'assets/core/common/css/xe-common.css',
    'assets/core/xe-ui-component/xe-ui-component.css',
    'assets/core/user/setting.css',
    $_theme::asset('css/eastern-theme.css'),
    $_theme::asset('css/eastern-widget.css'),
    $_theme::asset('css/slick.css'),
    $_theme::asset('css/_custom.css'),
])->load() }}

{{XeFrontend::meta()->name('viewport')->content(
    'width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no'
)->load()}}

<div id="wrap" class="wrap-layout">
    <p class="skip"><a href="#content">메뉴 건너뛰기</a></p>

    <header id="header" class="header menu--open">
        <div class="header-inner-box">
            <h1 class="logo">
                @if($config->get('logoType', 'text') === 'text')
                <!-- [D] 로고 이미지 없을 때 텍스트 노출 -->
                <!-- <a href="/" class="header-info-logo__link">Entrada</a> -->
                <a href="/" class="header-info-logo__link">
                    <img src="{{ $config->get('logoImage.path', 'plugins/entrada_theme/src/Components/Themes/Entrada/assets/img/img-logo.png') }}" class="header-info-logo__image" alt="{{ xe_trans($config->get('logoText', 'Entrada')) }}">
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

    <main id="container" class="container-layout xeofficial-container">
        @include($theme::view($config->get('layoutType', 'main')))
    </main>

    <footer id="footer" class="footer-layout">
        {!! $config->get('footerMoreinfoHtml') !!}

        <div class="xe-container">
            @if ($config->get('footerSitemap') || $config->get('useSocialLinks', 'N') === 'Y')
                <div class="footer-box">
                    {!! $config->get('footerSitemap') !!}
                    @if ($config->get('useSocialLinks', 'N') === 'Y')
                        <div class="footer__link-box">
                            <ul class="footer__link-list" title="푸터 SNS 리스트">
                                @if ($config->get('socialFacebook') != '')
                                    <li><a href="{{$config->get('socialFacebook', 'https://www.facebook.com/xehub/')}}" class="footer__link footer__link--facebook" target="_blank"><span class="blind">페이스북</span></a></li>
                                @endif
                            </ul>
                        </div>
                    @endif
                </div>
            @endif

            <div class="footer-info">
                {!! $config->get('serviceInfo', '
                <ul class="footer-info-company-list" title="회사정보 리스트">
                    <li>엑스이패토리</li>
                    <li>서울특별시 강남구 논현로149길 67-10, SD빌딩 3층, 06039</li>
                    <li>사업자등록번호: 890-87-00869</li>
                    <li>통신판매업 신고번호: 제2019-서울강남-01664호</li>
                </ul>') !!}

                <div class="footer-info__more-info">
                    <span class="footer-info__company">{!! $config->get('copyrightContent', 'Copyright &copy; 엑스이허브 Co.') !!}</span>
                    <ul class="footer-info-terms-list">
                        @foreach (app('xe.terms')->fetchEnabled() as $term)
                        <li><a href="{{ route('terms', $term->id) }}" class="footer-info-terms__link" target="_blank">{{xe_trans($term->title)}}</a></li>
                        @endforeach
                    </ul>
                </div>

                @if($config->get('familySites'))
                <div class="footer-info__family-site-box">
                    <div class="xu-form-group footer-info__family-site">
                        <div class="xu-form-group__box xu-form-group__box--icon-right">
                            <select class="xu-form-group__control" title="패밀리 사이트" onchange="window.open(this.value);">
                                <option disabled="disabled" selected="selected">패밀리 사이트</option>
                                @foreach ($data['familySites'] as $familySiteItems)
                                <option value="{{$familySiteItems['url']}}">{{$familySiteItems['name']}}</option>
                                @endforeach
                            </select>
                            <span class="xu-form-group__icon">
                                <i class="xi-angle-down-min"></i>
                            </span>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </footer>
</div>

<script>
    $(function() {
        $('.__footer-menu-button').on('click', function() {
            $(this).closest('li').toggleClass('open')

            return false
        })
        $('.gnb__menu > li').mouseenter(function () {
            if ($(this).find('.gnb__submenu').length != 0) {
                $(this).addClass('gnb__submenu--on')
            }
        })

        $('.gnb__menu > li').mouseleave(function () {
            if ($(this).find('.gnb__submenu').length != 0) {
                $(this).removeClass('gnb__submenu--on')
            }
        })

        // ===== 모바일 햄버거 메뉴 =====
        $('.header__button-menu, .gnb__dimmed').click(function () {
            $('.gnb--mobile').addClass('open')
            $('.gnb__dimmed').addClass('open')

            var height = $(window).height()
            // scrollCheck(height)
            mobileScrollFlag = true
        })

        $('.gnb__button-menu, .gnb__dimmed').click(function () {
            $('.gnb--mobile').removeClass('open')
            $('.gnb__dimmed').removeClass('open')

            mobileScrollFlag = false
        })
        // ===== //모바일 햄버거 메뉴 =====

    })
</script>
