@php
    $config->_selectedMainMenu = null;
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

    // 서브 헤더
    // 기본 값
    $config->set('useSubHeader', $config->get('useSubHeader', 'Y'));
    if ($config->get('useSubSidebar', 'Y') === 'Y') {
        // 서브메뉴 여부에 따른 콘텐츠 폭 조정
        $config->_subContainerCol = 9;
    }

    foreach (menu_list($config->get('mainMenu')) as $menu) {
        // 선택된 메뉴
        if ($menu['selected']) {
            $config->_selectedMainMenu = $menu;
        }
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
    .list-group-item.active,
    .list-group-item:hover,
    .list-group-item:focus {
        background-color: {{ $config->get('colorPrimary', '') }} !important;
    }
@endif
</style>
