@php
    $config->_selectedMainMenu = null;
    $config->_useSubSidemenu = false;
    $config->_subContainerCol = 12;
    $config->_useFooterLink = false;

    // 레이아웃 타입
    if ($config->get('layoutType', 'auto')) {
        if ($_theme::isHome()) {
            $config->set('layoutType', 'main');
        } else if(!$_theme::isModule()) {
            $config->set('layoutType', 'sub-no-header');
        } else {
            $config->set('layoutType', 'sub');
        }
    }

    // 로고 링크
    if (!$config->get('logoLink', false)) {
        $config->set('logoLink', url('/'));
    }

    // GNB 너비
    $config->_mainMenuContainerClass = ($config->get('mainMenuWidth', 'wide') === 'wide') ? 'xe-container-fluid' : 'xe-container';

    if (!$config->get('logoText') || !xe_trans($config->get('logoText'))) {
        $config->set('logoText', app('xe.site')->getSiteConfigValue('site_title'));
    }
    if ($config->get('copyrightContent', null) === null) {
        $config->set('copyrightContent', 'Powered by <a href="https://www.xpressengine.com/" target="_blank">XE</a>.');
    }

    // 메뉴
    foreach (menu_list($config->get('mainMenu')) as $menu) {
        // 선택된 메뉴
        if ($menu['selected']) {
            $config->_selectedMainMenu = $menu;
            $config->_useSubSidemenu = isset($menu['children']) && count($menu['children']);
        }
    }

    // 서브 헤더
    // 기본 값
    $config->set('useSubHeader', $config->get('useSubHeader', 'Y'));
    if ($config->get('useSubSidebar', 'Y') === 'Y' && $config->_useSubSidemenu) {
        // 서브메뉴 여부에 따른 콘텐츠 폭 조정
        $config->_subContainerCol = 9;
    }



    // SNS 링크
    if (!$config->get('socialFacebook')
        && !$config->get('socialMedium')
        && !$config->get('socialGithub')
    ) {
        $config->set('useSocialLinks', 'N');
    }

    // 푸터 링크 영역
    if ($config->get('footerLink1Subject', null)) {
        $config->_useFooterLink = true;
    }
    if ($config->get('footerLink2Subject', null)) {
        $config->_useFooterLink = true;
    }
    if ($config->get('footerLink3Subject', null)) {
        $config->_useFooterLink = true;
    }
    if ($config->get('footerLinkPolicyServiceUrl', null)) {
        $config->_useFooterLink = true;
    }
    if ($config->get('footerLinkPolicyPrivateUrl', null)) {
        $config->_useFooterLink = true;
    }
@endphp

<style>
.color-primary {
    color: {{ $config->get('colorPrimary', '#2684ff') }} !important;
}

@if ($config->get('colorPrimary', null))
    .xe-theme--devryan .theme-sidebar.list-group > .list-group-item.active > .list-group-item-action,
    .xe-theme--devryan .theme-sidebar.list-group > .list-group-item > .list-group-item-action:hover,
    .xe-theme--devryan .theme-sidebar.list-group > .list-group-item > .list-group-item-action:focus {
        background-color: {{ $config->get('colorPrimary', '') }} !important;
    }

    .board_header .bd_btn_area .on, .board_header .bd_btn_area li a:hover {
        color: {{ $config->get('active', '') }} !important;
    }

    .bd_paginate > strong, .bd_paginate > a:hover {
        border-color: {{ $config->get('active', '') }} !important;
        background-color: {{ $config->get('active', '') }} !important;
    }

    .read_header .category {
        color: {{ $config->get('colorPrimary', '') }};
    }

    .write_footer .write_form_btn .btn_submit:hover, .write_footer .write_form_btn .btn_submit:focus {
        border-color: {{ $config->get('active', '') }};
        background-color: {{ $config->get('active', '') }};
    }

    .board_list .reply_num {
        color: {{ $config->get('colorPrimary', '') }};
    }

    .board_list a:hover {
        color: {{ $config->get('colorPrimary', '') }};
    }

    // 로그인 및 공통
    .user .user-login .user-login-link {
        color: {{ $config->get('colorPrimary', '') }};
    }

    .user .auth-user__text a {
        color: {{ $config->get('colorPrimary', '') }};
    }

    .xe-dropdown-menu li.on>a, .xe-dropdown-menu li>a:hover {
        color: {{ $config->get('active', '') }};
    }

    .xe-btn-primary-outline {
        color: {{ $config->get('colorPrimary', '') }};
        border-color: {{ $config->get('colorPrimary', '') }};
    }

    .xe-btn-primary-outline:hover {
        border-color: {{ $config->get('active', '') }};
        background-color: {{ $config->get('active', '') }};
    }

    .xe-label>input[type="checkbox"]:checked+.xe-input-helper {
        background-color: {{ $config->get('colorPrimary', '') }};
    }

    .xe-label>input[type="checkbox"]:hover+.xe-input-helper, .xe-label>input[type="radio"]:hover+.xe-input-helper {
        border-color: {{ $config->get('active', '') }};
    }

    .xe-badge.xe-primary {
        background-color: {{ $config->get('colorPrimary', '') }} !important;
    }

    .xu-button--primary:hover:not([disabled]), .xu-button--primary.xu-button--hover:not([disabled]) {
        background-color: {{ $config->get('active', '') }} !important;
    }

    .xu-form-group input.xu-form-group__control:focus {
        border-color: {{ $config->get('active', '') }} !important;
    }

    .xu-label-checkradio:hover input[type="checkbox"] + .xu-label-checkradio__helper, .xu-label-checkradio.xu-label-checkradio--hover input[type="checkbox"] + .xu-label-checkradio__helper {
        border-color: {{ $config->get('active', '') }} !important;
    }

    .xu-label-checkradio:hover input[type="checkbox"]:checked + .xu-label-checkradio__helper, .xu-label-checkradio.xu-label-checkradio--hover input[type="checkbox"]:checked + .xu-label-checkradio__helper {
        border-color: {{ $config->get('active', '') }} !important;
        background-color: {{ $config->get('active', '') }} !important;
    }
@endif

@if ($config->get('colorActive', null))
    .xe-theme--devryan .gnb__menu > li.on .gnb__menu-link,
    .xe-theme--devryan .gnb__menu > li.gnb__submenu--on .gnb__menu-link,
    .xe-theme--devryan .gnb__menu-link:hover {
        color: {{ $config->get('colorActive') }};
    }
@endif
</style>
