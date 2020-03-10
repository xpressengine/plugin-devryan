<!-- 컨텐츠 영역 (위젯 및 플로그인 적용 영역) -->
<div id="content" class="content-layout">
    @if ($config->get('useSubHeader') != 'N')
        <div class="xe-container">
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
        </div>
    @endif

    <div class="xe-container">
        <div class="xe-row">
            {{-- 서브 페이지 사이드바 --}}
            @if ($config->get('useSubSidebar', 'Y') === 'Y')
                <div class="xe-col-md-3 xe-hidden-xs">
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
