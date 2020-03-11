{{-- note: 게시판 영역 전체를 감싸는 section --}}
{{ XeFrontend::css('plugins/devryan/src/Components/Skins/Board/Card/assets/css/devryan-board.css')->load() }}
{{ XeFrontend::js('plugins/devryan/src/Components/Skins/Board/Card/assets/js/skin.archive.js')->load() }}

<section class="section-board section-board-eastern-skin">
    @section('content')
        {{-- 게시판 콘텐츠 출력 --}}
        {!! isset($content) ? $content : '' !!}
    @show
</section>
