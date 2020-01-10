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
