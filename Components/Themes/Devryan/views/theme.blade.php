@include($theme::view('_setup'))
@include($theme::view('_setup-custom'))

<link href="https://cdn.jsdelivr.net/npm/xeicon@2.3/xeicon.min.css" type="text/css" rel="stylesheet" media="all">
<link href="https://cdn.jsdelivr.net/gh/xpressengine/xpressengine-ui/dist/css/xe-ui.css" type="text/css" rel="stylesheet" media="all">

{{ app('xe.frontend')->js([
    $_theme::asset('js/devryan-theme.js'),
    $_theme::asset('js/slick.min.js'),
    $_theme::asset('js/gnb.js'),
])->load()}}

{{ app('xe.frontend')->css([
    $_theme::asset('css/xe-ui-without-base.css'),
    'assets/core/common/css/xe-common.css',
    'assets/core/xe-ui-component/xe-ui-component.css',
    'assets/core/user/setting.css',
    $_theme::asset('css/devryan-theme.css'),
    $_theme::asset('css/devryan-widget.css'),
    $_theme::asset('css/slick.css'),
    $_theme::asset('css/_custom.css'),
])->load() }}

{{XeFrontend::meta()->name('viewport')->content(
    'width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no'
)->load()}}

<div id="wrap" class="wrap-layout">
    <p class="skip"><a href="#content">메뉴 건너뛰기</a></p>

    @include($theme::view('header'))

    <main id="container" class="container-layout xeofficial-container">
        @include($theme::view($config->get('layoutType', 'main')))
    </main>


    @include($theme::view('footer'))
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
