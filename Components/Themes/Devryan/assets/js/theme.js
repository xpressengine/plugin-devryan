$(function () {
  // 메인 스팟 슬릭 옵션 설정
  $('.__widget-xe-eastern-spot-slide-slide').slick({
    autoplay: false,
    autoplaySpeed: 3500,
    speed: 500,
    cssEase: 'ease',
    dots: true,
    arrows: true,
    prevArrow: '<button type="button" class="button-arrow button-prev"><span class="blind">이전</span><i class="xi-angle-left-thin"></i></button>',
    nextArrow: '<button type="button" class="button-arrow button-next"></span><span class="blind">다음</span><i class="xi-angle-right-thin"></i></button>',
    responsive: [
      {
        breakpoint: 998,
        settings: {
          arrows: false
        }
      }
    ]
  })

  // --- 메인 SPECIAL ROOM 슬라이드 ---
  $('.__widget-xe-eastern-specialroom-slide').slick({
    dots: false,
    infinite: true,
    speed: 500,
    cssEase: 'ease',
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<button type="button" class="button-arrow button-prev"><span class="blind">이전</span><i class="xi-angle-left-thin"></i></button>',
    nextArrow: '<button type="button" class="button-arrow button-next"></span><span class="blind">다음</span><i class="xi-angle-right-thin"></i></button>',
    autoplay: false,
    autoplaySpeed: 4000,
    pauseOnFocus: false,
    pauseOnHover: false
  })

  // 슬라이드 내 텍스트 영역
  $('.__widget-xe-eastern-specialroom-slide').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    $('.widget-xe-eastern-specialroom-slide-box .widget-xe-eastern-specialroom-slide-content-list li').css('display', 'none')
    $('.widget-xe-eastern-specialroom-slide-box .widget-xe-eastern-specialroom-slide-content-list li').eq(nextSlide).css('display', 'block')
  })
  // --- //메인 SPECIAL ROOM 슬라이드 ---

  // --- 탑버튼 ---
  $('.__top-button').on('click', function () {
    $('body, html').animate({
      scrollTop: 0
    })

    return false
  })
  // --- //탑버튼 ---

  // --- 팝업 버튼 ---
  // 팝업 닫기
  $('.__popup-close').on('click', function () {
    $(this).closest('.popup-layer-notice').css('display', 'none')
  })
  // 팝업 닫기

  // 오늘하루 보지 않기
  $('.__popup-display').on('click', function () {
    var cookieName = $(this).closest('.popup-layer-notice').attr('data-cookie-name')

    setCookiePage(cookieName, 'done', 1)
    $(this).closest('.popup-layer-notice').css('display', 'none')
  })

  function setCookiePage (name, value, expiredays) {
    var todayDate = new Date()
    todayDate.setDate(todayDate.getDate() + expiredays)
    document.cookie = name + '=' + escape(value) + '; path=/; expires=' + todayDate.toGMTString() + ';'
  }
  function getCookiePage () {
    var cookiedata = document.cookie

    if (cookiedata.indexOf('popup-layer1=done') > -1) {
      $('.__popup-layer1').hide()
    } else {
      $('.__popup-layer1').show()
    }

    if (cookiedata.indexOf('popup-layer2=done') > -1) {
      $('.__popup-layer2').hide()
    } else {
      $('.__popup-layer2').show()
    }
  }
  getCookiePage()
  // //오늘하루 보지 않기

  // --- //팝업 버튼 ---

  // 룸상세 이미지 슬릭 옵션 설정
  $('.__widget-xe-eastern-image-slide-slide').slick({
    autoplay: false,
    autoplaySpeed: 3500,
    speed: 500,
    cssEase: 'ease',
    dots: false,
    arrows: true,
    prevArrow: '<button type="button" class="button-arrow button-prev"><span class="blind">이전</span><i class="xi-angle-left-thin"></i></button>',
    nextArrow: '<button type="button" class="button-arrow button-next"></span><span class="blind">다음</span><i class="xi-angle-right-thin"></i></button>',
    centerMode: true,
    centerPadding: '8px',
    responsive: [
      {
        breakpoint: 998,
        settings: {
          arrows: true,
          centerMode: false
        }
      }
    ]
  })

  // //룸상세 이미지 슬릭 옵션 설정
})

$(function () {
  // 슬릭 옵션 설정
  if ($('.xeofficial-widget-showcase-slider').length) {
    $('.xeofficial-widget-showcase-slider').slick({
      // adaptiveHeight: true,
      // fade: true,
      speed: 500,
      cssEase: 'linear',
      // swipe: false,
      autoplay: true,
      autoplaySpeed: 2000,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      // centerMode: true,
      // centerPadding: '30px',
      responsive: [
        {
          breakpoint: 768,
          settings: {
            fade: false,
            speed: 500,
            cssEase: 'linear',
            swipe: true,
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            centerMode: true,
            centerPadding: '20px'
          }
        }
      ]
    })
  }
})
