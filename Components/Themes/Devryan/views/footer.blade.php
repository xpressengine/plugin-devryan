<footer id="footer" class="xe-theme__footer footer-layout">
    @if($config->get('footerSitename', null))
        <div class="xe-container">
            <p class="sitename">{{ $config->get('footerSitename', '') }}</p>
        </div>
    @endif

    <div class="xe-container">
        @include($_theme::view('fnb'))

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
            <div class="service-info">
                {!! $config->get('serviceInfo', '') !!}
            </div>

            <div class="footer-info__more-info">
                <span class="footer-info__company">{!! $config->get('copyrightContent', 'Copyright &copy; 엑스이허브 Co.') !!}</span>
                {{-- 약관 --}}
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
