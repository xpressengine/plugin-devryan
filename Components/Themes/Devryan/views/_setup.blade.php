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

    if (!$config->get('logoText') || !xe_trans($config->get('logoText'))) {
        $config->set('logoText', app('xe.site')->getSiteConfigValue('site_title'));
    }

    if ($config->get('useSubSidebar', 'Y') === 'Y') {
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
