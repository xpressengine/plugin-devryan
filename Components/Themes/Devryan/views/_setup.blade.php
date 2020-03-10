@php
    $config->_selectedMainMenu = null;
    $config->_subContainerCol = 12;

    if ($config->get('layoutType', 'auto')) {
        if ($_theme::isHome()) {
            $config->set('layoutType', 'main');
        } else if(!$_theme::isModule()) {
            $config->set('layoutType', 'sub-no-header');
        } else {
            $config->set('layoutType', 'sub');
        }
    }

    if (!$config->get('logoLink', false)) {
        $config->set('logoLink', url('/'));
    }

    $config->set('_mainMenuContainerClass', ($config->get('mainMenuWidth', 'wide') === 'wide') ? 'xe-container-fluid' : 'xe-container');

    if (!$config->get('logoText') || !xe_trans($config->get('logoText'))) {
        $config->set('logoText', app('xe.site')->getSiteConfigValue('site_title'));
    }


    // 서브 헤더
    // 기본 값
    $config->set('useSubHeader', $config->get('useSubHeader', 'Y'));
    if ($config->get('useSubSidebar', 'Y') === 'Y') {
        // 서브메뉴 여부에 따른 콘텐츠 폭 조정
        $config->_subContainerCol = 9;
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
