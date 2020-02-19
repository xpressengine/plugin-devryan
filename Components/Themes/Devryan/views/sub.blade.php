<!--/ sub content area  -->
<!-- 컨텐츠 영역 (위젯 및 플로그인 적용 영역) -->
<div id="content" class="content-layout">
    <div class="xe-container">
        @if ($config->get('useSubHeader') != 'N')
        <!-- 위젯박스 들어가는 부분 (컨텐츠 들어가는 부분) -->
        <div>
            <div class="widgetbox-content">
                <!-- 서브 상단 이미지 타이틀 위젯 -->
                <div class="xe-row">
                    <div class="xe-col-md-12">
                        <!-- 서브 상단 이미지 타이틀 위젯 영역 -->
                        <section class="section-xe-eastern-top-image-title-widget">
                            <div class="xe-eastern-top-image-title-widget-info">
                                <div class="info-content">
                                    <div class="info-box">
                                        @if ($config->get('useSubHeader') == 'Y')
                                            {!! $data['currentSubHeaderDescription'] !!}
                                        @elseif ($config->get('useSubHeader') == 'Y-IMAGE')
                                            {!! xe_trans($config->get('subHeaderDescription', '')) !!}
                                        @endif
                                        {{--@if ($config->get('subHeaderTitle') != '')--}}
                                            {{--<h2 class="info-title">{!! xe_trans($config->get('subHeaderTitle', '')) !!}</h2>--}}
                                        {{--@endif--}}
                                        {{--<div class="xe-container">--}}
                                            {{--<div class="xe-row">--}}
                                                {{--<div class="xe-col-md-offset-3 xe-col-md-6">--}}
                                                    {{--@if ($config->get('useSubHeader') == 'Y')--}}
                                                        {{--<p class="info-text">{!! $data['currentSubHeaderDescription'] !!}</p>--}}
                                                    {{--@elseif ($config->get('useSubHeader') == 'Y-IMAGE')--}}
                                                        {{--<p class="info-text">{!! xe_trans($config->get('subHeaderDescription', '')) !!}</p>--}}
                                                    {{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                                <!-- [D] 등록된 이미지 적용  -->
                                @if ($config->get('useSubHeader') == 'Y')
                                    {{--$data['currentSubHeaderImage'] 경로는 EntradaTheme 에서 생성--}}
                                    <div class="info-bg" style="background-image: url({{$data['currentSubHeaderImage']}});"></div>
                                @elseif ($config->get('useSubHeader') == 'Y-IMAGE')
                                    <div class="info-bg" style="background-image: url({{$config->get('subHeaderImage.path', '')}});"></div>
                                @endif
                            </div>
                        </section>
                        <!-- //서브 상단 이미지 타이틀 위젯 영역 -->
                    </div>
                </div>
                <!-- //서브 상단 이미지 타이틀 위젯 위젯 -->
            </div>
        </div>
        @endif
    </div>

    <div class="xe-container">
        <div class="xe-row">
            {{-- 서브 페이지 사이드바 --}}
            @if ($config->get('useSubSidebar', 'Y') === 'Y')
                <div class="xe-col-md-3">
                    @include($_theme::view('sidebar'))
                </div>
            @endif


            <div class="xe-col-md-{{ $config->_subContainerCol }}">
                {!! $content !!}
            </div>
        </div>
    </div>
</div>
<!--/ sub content area  -->

<div class="top-button-box" style="margin-top: 40px;">
    <a href="#" class="top-button__link __top-button">
        <span class="top-button__link-text">맨 위로</span>
        <i class="xi-long-arrow-up"></i>
    </a>
</div>
