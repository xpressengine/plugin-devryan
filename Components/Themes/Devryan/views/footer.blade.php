<footer id="footer" class="footer-layout">
    {!! $config->get('footerMoreinfoHtml') !!}

    <div class="xe-container">
        @if ($config->get('footerSitemap') || $config->get('useSocialLinks', 'N') === 'Y')
            <div class="footer-box">
                {!! $config->get('footerSitemap') !!}
                @if ($config->get('useSocialLinks', 'N') === 'Y')
                    <div class="footer__link-box">
                        <ul class="footer__link-list" title="푸터 SNS 리스트">
                            @if ($config->get('socialFacebook') != '')
                                <li><a href="{{$config->get('socialFacebook', 'https://www.facebook.com/xehub/')}}" class="footer__link footer__link--facebook" target="_blank"><span class="blind">페이스북</span></a></li>
                            @endif
                        </ul>
                    </div>
                @endif
            </div>
        @endif

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
