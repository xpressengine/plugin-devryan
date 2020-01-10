@if($config->get('plugin_store')==='Y')
@include('store::views.header')
@endif

<!-- sub content area  -->
<div id="content" class="content-layout sub-content">
    <div class="xe-container">
        {!! $content !!}
    </div>
</div>
<!--/ sub content area  -->
