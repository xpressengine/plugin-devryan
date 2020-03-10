<?php
return [
    'view' => 'theme',
    'setting' => [
        [
            'section' => [
                'class' => 'common-section',
                'title' => '기본 설정'
            ],
            'fields' => [
                'layoutType' => [
                    '_type' => 'select',
                    'label' => '레이아웃 형태',
                    'options' => [
                        'auto' => '홈 페이지 자동 인식',
                        'main' => '메인 페이지용',
                        'sub' => '서브 페이지용',
                        'sub-no-header' => '서브 헤더스팟 없음'
                    ]
                ],
                'mainMenuWidth' => [
                    '_type' => 'radio',
                    'label' => '메인 메뉴 너비',
                    'options' => [
                        'wide' => '넓게',
                        'normal' => '보통'
                    ],
                    'value' => 'wide'
                ],
                'mainMenu' => [
                    '_type' => 'menu',
                    'label' => '메인 메뉴',
                    'description' => '2단계까지 출력 가능'
                ],
                'useFooterMenu' => [
                    '_type' => 'radio',
                    'label' => '푸터 메뉴 표시',
                    'options' => [
                        'Y' => '표시 함',
                        'N' => '표시 안 함'
                    ],
                    'value' => 'Y'
                ],
                'footerMenu' => [
                    '_type' => 'menu',
                    'label' => '푸터 메뉴',
                    'description' => '1단계까지 출력 가능'
                ],
            ]
        ],

        [
            'section' => [
                'class' => 'brand-section',
                'title' => '브랜드'
            ],
            'fields' => [
                'logoType' => [
                    '_type' => 'radio',
                    'label' => '로고 출력 대상',
                    'options' => [
                        'text' => '로고 텍스트 사용',
                        'image' => '로고 이미지 사용',
                    ],
                    'value' => 'text'
                ],
                'logoText' => [
                    '_type' => 'langText',
                    'label' => '로고 텍스트',
                    'description' => '상단에 표시될 사이트 이름 또는 로고 이미지의 대체 텍스트',
                ],
                'logoImage' => [
                    '_type' => 'image',
                    'label' => '로고 이미지',
                    'description' => '로고 이미지'
                ],
                'logoLink' => [
                    '_type' => 'text',
                    'label' => '로고 링크',
                    'description' => '로고 클릭 시 주소',
                    'value' => '/'
                ],
                'colorPrimary' => [
                    '_type' => 'colorpicker',
                    'label' => '테마 컬러',
                ],
            ]
        ],

        // [
        //     'section' => [
        //         'class' => 'gnb-section',
        //         'title' => 'GNB 설정'
        //     ],
        //     'fields' => [
        //         'gnbPcMyBtn' => [
        //             '_type' => 'textarea',
        //             'label' => '마이메뉴 PC영역 추가 버튼 정의',
        //             'description' => 'HTML 사용 가',
        //         ],
        //         'gnbMobileMyBtn' => [
        //             '_type' => 'textarea',
        //             'label' => '마이메뉴 Mobile영역 추가 버튼 정의',
        //             'description' => 'HTML 사용 가',
        //         ],
        //         'additionTopButtonUse' => [
        //             '_type' => 'select',
        //             'label' => '상단 추가 버튼 사용 여부',
        //             'options' => [
        //                 'Y' => '사용함',
        //                 'N' => '사용 안 함'
        //             ],
        //         ],
        //         'additionTopButtonUrl' => [
        //             '_type' => 'langTextarea',
        //             'label' => '상단 추가 버튼 주소',
        //         ],
        //         'additionTopButtonText' => [
        //             '_type' => 'langTextarea',
        //             'label' => '상단 추가 버튼 제목',
        //         ],
        //         'additionSideButtonUse' => [
        //             '_type' => 'select',
        //             'label' => '우측 추가 버튼 사용 여부',
        //             'options' => [
        //                 'Y' => '사용함',
        //                 'N' => '사용 안 함'
        //             ],
        //         ],
        //         'additionSideButtonUrl' => [
        //             '_type' => 'langTextarea',
        //             'label' => '우측 추가 버튼 주소',
        //         ],
        //         'additionSideButtonText' => [
        //             '_type' => 'langTextarea',
        //             'label' => '우측 추가 버튼 제목',
        //         ],
        //     ]
        // ],

        /* 서브페이지 헤더스팟 설정 */
        [
            'section' => [
                'class' => 'sub-header-section',
                'title' => '서브페이지 배너'
            ],
            'fields' => [
                'useSubSidebar' => [
                    '_type' => 'select',
                    'label' => '사이드 메뉴 출력',
                    'options' => [
                        'Y' => '표시함',
                        'N' => '표시 안함'
                    ]
                ],
                'useSubHeader' => [
                    '_type' => 'radio',
                    'label' => '상단 배너 설정',
                    'options' => [
                        'Y' => '표시함',
                        'N' => '표시 안함',
                        'Y-IMAGE' => '테마 이미지 사용',
                    ],
                    'value' => 'Y'
                ],
                /* 헤더 이미지 설정 */
                'subHeaderImage' => [
                    '_type' => 'image',
                    'label' => '상단 배너 이미지',
                ],
                'subHeaderTitle' => [
                    '_type' => 'langTextarea',
                    'label' => '상단 배너 제목',
                    'description' => 'HTML사용 가능'
                ],
                'subHeaderDescription' => [
                    '_type' => 'langTextarea',
                    'label' => '상단 배너 설명',
                    'description' => 'HTML사용 가능'
                ],
            ]
        ],

        /* footer sitemap */
        [
            'section' => [
                'class' => 'footer-link-section',
                'title' => '푸터 링크'
            ],
            'fields' => [
                'footerLink1Subject' => [
                    '_type' => 'text',
                    'label' => '푸터 링크1 이름'
                ],
                'footerLink1Url' => [
                    '_type' => 'text',
                    'label' => '푸터 링크1 주소'
                ],
                'footerLink2Subject' => [
                    '_type' => 'text',
                    'label' => '푸터 링크2 이름'
                ],
                'footerLink2Url' => [
                    '_type' => 'text',
                    'label' => '푸터 링크2 주소'
                ],
                'footerLink3Subject' => [
                    '_type' => 'text',
                    'label' => '푸터 링크3 이름'
                ],
                'footerLink3Url' => [
                    '_type' => 'text',
                    'label' => '푸터 링크3 주소'
                ],

                'footerLinkPolicyServiceUrl' => [
                    '_type' => 'text',
                    'label' => '이용약관 주소'
                ],
                'footerLinkPolicyPrivateUrl' => [
                    '_type' => 'text',
                    'label' => '개인정보처리방침 주소'
                ],
            ]
        ],

        /* social link */
        [
            'section' => [
                'class' => 'social-section',
                'title' => 'SNS'
            ],
            'fields' => [
                'useSocialLinks' => [
                    '_type' => 'select',
                    'label' => 'SNS 링크 표시 여부',
                    'options' => [
                        'Y' => '사용',
                        'N' => '사용 안함'
                    ]
                ],
                'socialFacebook' => [
                    '_type' => 'text',
                    'label' => '페이스북 링크',
                ],
                'socialYoutube' => [
                    '_type' => 'text',
                    'label' => '유튜브 링크',
                ],
                'socialInstagram' => [
                    '_type' => 'text',
                    'label' => '인스타그램 링크',
                ],
                'socialTwitter' => [
                    '_type' => 'text',
                    'label' => '트위터 링크',
                ],
                'socialNaverBlog' => [
                    '_type' => 'text',
                    'label' => '네이버 블로그 링크',
                ],
                'socialGithub' => [
                    '_type' => 'text',
                    'label' => '깃허브 링크',
                ]
            ]
        ],

        [
            'section' => [
                'class' => 'footer-info-section',
                'title' => '사업자 정보'
            ],
            'fields' => [
                'infoCompanyName' => [
                    '_type' => 'text',
                    'label' => '상호명'
                ],
                'infoCompanyPresident' => [
                    '_type' => 'text',
                    'label' => '대표자 이름'
                ],
                'infoCompanyTel' => [
                    '_type' => 'text',
                    'label' => '전화번호'
                ],
                'infoCompanyEmail' => [
                    '_type' => 'text',
                    'label' => '이메일'
                ],
                'infoCompanyAddress' => [
                    '_type' => 'text',
                    'label' => '주소'
                ],
                'infoCompanyNum' => [
                    '_type' => 'text',
                    'label' => '사업자등록번호'
                ],
                'infoCompanyNum2' => [
                    '_type' => 'text',
                    'label' => '통신판매신고번호'
                ],
            ]
        ],

        /* Footer 설정 */
        [
            'section' => [
                'class' => 'footer-section',
                'title' => '푸터 추가 설정'
            ],
            'fields' => [
                'footerSitename' => [
                    '_type' => 'text',
                    'label' => '사이트 이름'
                ],
                'serviceInfo' => [
                    '_type' => 'textarea',
                    'label' => '사이트 정보'
                ],
                'footerMoreinfoHtml' => [
                    '_type' => 'textarea',
                    'label' => 'footer html'
                ],
                'familySiteSubject' => [
                    '_type' => 'text',
                    'label' => '관련 사이트 제목'
                ],
                'familySites' => [
                    '_type' => 'textarea',
                    'label' => '관련 사이트',
                    'description' => '"이름,링크"로 입력하세요. 줄바꿈으로 항목을 추가 입력하세요.'
                ],
                'copyrightContent' => [
                    '_type' => 'text',
                    'label' => '카피라이트 텍스트',
                    'value' => 'Powered by XE3.'
                ]
            ]
        ],
    ],
    'support' => [
        'mobile' => true,
        'desktop' => true
    ],
    'editable' => [
        '_setup-custom.blade.php',
        '../assets/css/_custom.css',
    ]
];
