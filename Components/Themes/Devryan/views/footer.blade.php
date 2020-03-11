<footer id="footer" class="xe-theme__footer footer-layout">
    <div class="xe-container">
        @if($config->get('footerSitename'))
            <p class="sitename">{{ $config->get('footerSitename', '') }}</p>
        @endif

        @include($_theme::view('fnb'))

        @if ($config->get('useSocialLinks') === 'Y')
            <div class="footer-box">
                @if ($config->get('useSocialLinks') === 'Y')
                    <div class="footer__link-box">
                        <ul class="footer__link-list" title="푸터 SNS 리스트">
                            @if($config->get('socialFacebook', true))
                                <li><a href="{{$config->get('socialFacebook', 'https://www.facebook.com/xehub')}}" class="footer__link footer__link--facebook" target="_blank"><span class="blind">Facebok</span></a></li>
                            @endif

                            @if($config->get('socialMedium', true))
                                <li><a href="{{$config->get('socialMedium', 'https://medium.com/xehub')}}" class="footer__link footer__link--medium" target="_blank"><span class="blind">Medium</span></a></li>
                            @endif

                            @if($config->get('socialGithub', true))
                                <li><a href="{{$config->get('socialGithub', 'https://github.com/xpressengine')}}" class="footer__link footer__link--github" target="_blank"><span class="blind">GitHub</span></a></li>
                            @endif
                        </ul>
                    </div>
                @endif
            </div>
        @endif

        <div class="footer-info">
            @if($config->get('serviceInfo'))
                <div class="service-info">
                    {!! $config->get('serviceInfo', '') !!}
                </div>
            @endif

            <div class="footer-info__more-info">
                @if($config->get('copyrightContent'))
                    <span class="footer-info__company">{!! $config->get('copyrightContent', '') !!}</span>
                @endif

                {{-- 푸터 링크 --}}
                @if($config->_useFooterLink)
                    <ul class="footer-info-terms-list">
                        @if($config->get('footerLink1Subject', null) && $config->get('footerLink1Url', null))
                            <li><a href="{{ url($config->get('footerLink1Url')) }}" class="footer-info-terms__link" target="_blank">{{ $config->get('footerLink1Subject') }}</a></li>
                        @endif
                        @if($config->get('footerLink2Subject', null) && $config->get('footerLink2Url', null))
                            <li><a href="{{ url($config->get('footerLink2Url')) }}" class="footer-info-terms__link" target="_blank">{{ $config->get('footerLink2Subject') }}</a></li>
                        @endif
                        @if($config->get('footerLink3Subject', null) && $config->get('footerLink3Url', null))
                            <li><a href="{{ url($config->get('footerLink3Url')) }}" class="footer-info-terms__link" target="_blank">{{ $config->get('footerLink3Subject') }}</a></li>
                        @endif
                        @if($config->get('footerLinkPolicyServiceUrl', null))
                            <li><a href="{{ url($config->get('footerLinkPolicyServiceUrl')) }}" class="footer-info-terms__link" target="_blank">이용약관</a></li>
                        @endif
                        @if($config->get('footerLinkPolicyPrivateUrl', null))
                            <li><a href="{{ url($config->get('footerLinkPolicyPrivateUrl')) }}" class="footer-info-terms__link" target="_blank">개인정보처리방침</a></li>
                        @endif
                    </ul>
                @endif
            </div>

            @if($config->get('familySites'))
                <div class="footer-info__family-site-box">
                    <div class="xu-form-group footer-info__family-site">
                        <div class="xu-form-group__box xu-form-group__box--icon-right">
                            <select class="xu-form-group__control" title="{{ $config->get('familySiteSubject', '패밀리 사이트') }}" onchange="window.open(this.value);">
                                <option disabled="disabled" selected="selected">{{ $config->get('familySiteSubject', '패밀리 사이트') }}</option>
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
