<link href="https://cdn.jsdelivr.net/npm/xeicon@2.3/xeicon.min.css" type="text/css" rel="stylesheet" media="all">

{{ app('xe.frontend')->js([
    'plugins/devryan_theme/src/Components/Themes/Devryan/assets/js/theme.js',
	'plugins/devryan_theme/src/Components/Themes/Devryan/assets/js/slick.min.js',
])->load()}}

{{ app('xe.frontend')->css([
    'plugins/devryan_theme/src/Components/Themes/Devryan/assets/css/xe-ui.css',
    'assets/core/common/css/xe-common.css',
    'assets/core/xe-ui-component/xe-ui-component.css',
    'assets/core/user/setting.css',
    'plugins/devryan_theme/src/Components/Themes/Devryan/assets/css/theme.css',
	'plugins/devryan_theme/src/Components/Themes/Devryan/assets/css/slick.css',
])->load() }}

{{XeFrontend::meta()->name('viewport')->content(
'width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no'
)->load()}}

<link href="https://cdn.jsdelivr.net/gh/xpressengine/xpressengine-ui/dist/css/xe-ui.css" type="text/css" rel="stylesheet" media="all">

<div id="wrap" class="wrap-layout">
    <p class="skip"><a href="#content">메뉴 건너뛰기</a></p>
    <header id="header" class="header">
        <div class="header-inner-box">
            <h1 class="logo">
                @if($config->get('logoType', 'text') === 'text')
                    <a href="{{ url('/') }}" class="logo__link"><span class="logo-text">{{ xe_trans($config->get('logoText', '')) }}</span></a>
                @else
                    <a href="{{ url('/') }}" class="logo__link"><span><img src="{{ $config->get('logoImage.path') }}" alt="{{ xe_trans($config->get('logoText', '')) }}" width="50"></span></a>
                @endif
            </h1>
            <button type="button" class="header__button-menu"><span class="blind">모바일 메뉴버튼</span></button>

            @include($theme::view('gnb'))

            <!-- 모바일 메뉴 오픈 시 class="gnb__dimmed" 영역에 class="open" 추가 -->
            <div class="gnb__dimmed"></div>
        </div>
    </header>

    <main id="container" class="container-layout xeofficial-container">
        @include($theme::view($config->get('layout', 'main')))
    </main>

    <footer id="footer" class="footer-layout">

        <div class="xe-container">
            <div class="footer-box">
                <ul class="footer-menu-list" title="푸터 메뉴 리스트">
                    <!-- 푸터 메뉴 커스텀 -->
                    {!! $config->get('footerSitemap') !!}
                </ul>
                <div class="footer__link-box">
                    <ul class="footer__link-list" title="푸터 SNS 리스트">
                        @if ($config->get('socialFacebook') == null | $config->get('socialFacebook') != '')
                            <li><a href="{{$config->get('socialFacebook', 'https://www.facebook.com/xehub/')}}" class="footer__link footer__link--facebook" target="_blank"><span class="blind">페이스북</span></a></li>
                        @endif
                        {{--@if ($config->get('socialYoutube', ''))--}}
                            {{--<li><a href="{{$config->get('socialYoutube')}}" class="footer__link footer__link--youtube" target="_blank"><span class="blind">유투브</span></a></li>--}}
                        {{--@endif--}}

                        {{--@if ($config->get('socialInstagram', ''))--}}
                            {{--<li><a href="{{$config->get('socialInstagram')}}" class="footer__link footer__link--instagram" target="_blank"><span class="blind">인스타그램</span></a></li>--}}
                        {{--@endif--}}
                        {{--@if ($config->get('socialTwitter', ''))--}}
                            {{--<li><a href="{{$config->get('socialTwitter')}}" class="footer__link footer__link--twitter" target="_blank"><span class="blind">인스타그램</span></a></li>--}}
                        {{--@endif--}}
                    </ul>
                </div>
            </div>
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
