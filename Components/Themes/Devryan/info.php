<?php
return [
    'view' => 'theme',
    'setting' => [
        /* 일반 설정 */
        [
            'section' => [
                'class' => 'common-section',
                'title' => '일반 설정'
            ],
            'fields' => [
                'layoutType' => [
                    '_type' => 'select',
                    'label' => '레이아웃 형태',
                    'options' => [
                        'auto' => '홈 페이지 자동 인식',
                        'main' => '메인 페이지용',
                        'sub' => '서브 페이지용',
                        'sub-no-header' => '서브 헤더스팟 없음',
                    ]
                ],
                'mainMenu' => [
                    '_type' => 'menu',
                    'label' => '메인 메뉴',
                    'description' => '2단계까지 출력 가능'
                ],
                'footerMenu' => [
                    '_type' => 'menu',
                    'label' => '메인 메뉴',
                    'description' => '2단계까지 출력 가능'
                ],
            ]
        ],

        /* 컬러셋 */
        [
            'section' => [
                'class' => 'colorset-section',
                'title' => '컬러셋 설정'
            ],
            'fields' => [
                'colorPrimary' => [
                    '_type' => 'colorpicker',
                    'label' => '메인 컬러 (Primary)',
                ],
            ]
        ],

        /* 헤더 설정 */
        [
            'section' => [
                'class' => 'logo-section',
                'title' => '로고 설정'
            ],
            'fields' => [
                /* 로고 설정 */
                'logoType' => [
                    '_type' => 'select',
                    'label' => '로고 설정',
                    'options' => [
                        'text' => '로고 텍스트 사용',
                        'image' => '로고 이미지 사용',
                    ]
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
            ],
        ],
        [
            'section' => [
                'class' => 'gnb-section',
                'title' => 'GNB 설정'
            ],
            'fields' => [
                'gnbPcMyBtn' => [
                    '_type' => 'textarea',
                    'label' => '마이메뉴 PC영역 추가 버튼 정의',
                    'description' => 'HTML 사용 가',
                ],
                'gnbMobileMyBtn' => [
                    '_type' => 'textarea',
                    'label' => '마이메뉴 Mobile영역 추가 버튼 정의',
                    'description' => 'HTML 사용 가',
                ],
                'additionTopButtonUse' => [
                    '_type' => 'select',
                    'label' => '상단 추가 버튼 사용 여부',
                    'options' => [
                        'Y' => '사용함',
                        'N' => '사용 안 함'
                    ],
                ],
                'additionTopButtonUrl' => [
                    '_type' => 'langTextarea',
                    'label' => '상단 추가 버튼 주소',
                ],
                'additionTopButtonText' => [
                    '_type' => 'langTextarea',
                    'label' => '상단 추가 버튼 제목',
                ],
                'additionSideButtonUse' => [
                    '_type' => 'select',
                    'label' => '우측 추가 버튼 사용 여부',
                    'options' => [
                        'Y' => '사용함',
                        'N' => '사용 안 함'
                    ],
                ],
                'additionSideButtonUrl' => [
                    '_type' => 'langTextarea',
                    'label' => '우측 추가 버튼 주소',
                ],
                'additionSideButtonText' => [
                    '_type' => 'langTextarea',
                    'label' => '우측 추가 버튼 제목',
                ],
            ]
        ],

        /* 서브 페이지 설정 */
        [
            'section' => [
                'class' => 'subpage-section',
                'title' => '서브페이지 설정'
            ],
            'fields' => [
                'useSubSidebar' => [
                    '_type' => 'select',
                    'label' => '사이드 메뉴 출력',
                    'options' => [
                        'Y' => '표시함',
                        'N' => '표시 안함'
                    ]
                ]
            ]
        ],

        /* 서브페이지 헤더스팟 설정 */
        [
            'section' => [
                'class' => 'sub-header-stop-section',
                'title' => '서브페이지 헤더스팟 설정'
            ],
            'fields' => [
                'useSubHeader' => [
                    '_type' => 'select',
                    'label' => '메인 헤더 출력 여부',
                    'options' => [
                        'Y' => '표시함',
                        'N' => '표시 안함',
                        'Y-IMAGE' => '테마 이미지 사용',
                    ],
                ],
                /* 헤더 이미지 설정 */
                'subHeaderImage' => [
                    '_type' => 'image',
                    'label' => '헤더 이미지',
                ],
                'subHeaderTitle' => [
                    '_type' => 'langTextarea',
                    'label' => '헤더 제목',
                    'description' => 'HTML사용 가능'
                ],
                'subHeaderDescription' => [
                    '_type' => 'langTextarea',
                    'label' => '헤더 설명',
                    'description' => 'HTML사용 가능'
                ],
            ]
        ],

        /* footer sitemap */
        [
            'section' => [
                'class' => 'footer-sitemap-section',
                'title' => '푸터 사이트맵'
            ],
            'fields' => [
                'footerMoreinfoHtml' => [
                    '_type' => 'textarea',
                    'label' => '푸터 추가 정보
                    ',
                    'description' => 'HTML사용 가능'
                ],
                'footerSitemap' => [
                    '_type' => 'textarea',
                    'label' => '푸터 사이트맵',
                    'description' => 'HTML사용 가능'
                ],
            ]
        ],

        /* social link */
        [
            'section' => [
                'class' => 'social-section',
                'title' => '소셜 링크'
            ],
            'fields' => [
                'useSocialLinks' => [
                    '_type' => 'select',
                    'label' => '소셜 링크 표시 여부',
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
                ]
            ]
        ],

        /* Footer 설정 */
        [
            'section' => [
                'class' => 'footer-section',
                'title' => '푸터 설정'
            ],
            'fields' => [
                'familySites' => [
                    '_type' => 'textarea',
                    'label' => '패밀리 사이트 링크',
                    'description' => '이름,링크 표시 / 줄바꿈으로 항목 추가'
                ],
                'serviceInfo' => [
                    '_type' => 'textarea',
                    'label' => '서비스 정보',
                    'description' => 'HTML사용 가능'
                ],
                'useCopyright' => [
                    '_type' => 'select',
                    'label' => 'Copyright 표시 여부',
                    'options' => [
                        'Y' => '사용',
                        'N' => '사용 안함'
                    ]
                ],
                'copyrightContent' => [
                    '_type' => 'textarea',
                    'label' => 'Copyright',
                    'description' => 'HTML사용 가능'
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
