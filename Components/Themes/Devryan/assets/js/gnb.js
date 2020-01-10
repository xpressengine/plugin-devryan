/* global $:readonly */
$(function () {
  /**
  * throttle
  * @param {number} delay
  * @param {function} fn
  */
  function throttled (delay, fn) {
    var lastCall = 0
    return function () {
      var now = (new Date()).getTime()
      var args = arguments
      if (now - lastCall < delay) {
        return
      }
      lastCall = now
      return fn(args)
    }
  }

  var $window = $(window)
  var $header = $('.header')
  var throttle = 16
  $window.scroll(throttled(throttle, function () {
    $window.triggerHandler('throttle.scroll', {
      top: $window.scrollTop()
    })
  }))
  $window.resize(throttled(throttle, function () {
    $window.triggerHandler('throttle.resize', {
      width: window.innerWidth,
      height: window.innerHeight
    })
  }))

  // ============ 헤더 움직임 ============
  var lastScrollTop = 0;
  $window.on('throttle.scroll', function (e, data) {
    var st = (typeof data !== 'undefined') ? data.top : $window.scrollTop()

    // if (st > headerHeight){
    if (st > 56) {
      // Scroll Down
      $header.addClass('sticky')
    } else {
      // Scroll Up
      $header.removeClass('sticky')
    }

    if(st > 56) {
      if((lastScrollTop - st) > 0 || st == 0) {
        // up
        $header.addClass('menu--open');
      } else {
        // down
        $header.removeClass('menu--open');
        // $('.header-area .box-modify-listbox-list').css('display', 'none');
      }
    } else {
      $header.addClass('menu--open');
    }

    lastScrollTop = st;
  })
  $window.triggerHandler('throttle.scroll')
  // ============ //헤더 움직임 ============

  // ===== GNB 서브 메뉴 동작 =====
  // $('.gnb__menu > li').mouseenter(function () {
  //   if ($(this).find('.gnb__submenu').length != 0) {
  //     $(this).addClass('gnb__submenu--on')
  //   }
  // })

  // $('.gnb__menu > li').mouseleave(function () {
  //   if ($(this).find('.gnb__submenu').length != 0) {
  //     $(this).removeClass('gnb__submenu--on')
  //   }
  // })

  // ================= 모바일 메뉴 로그인 버튼 움직임 ==============
  // 페이지 리사이징 될 때
  // var mobileScrollFlag = false // 모바일에서 메뉴가 닫혀 있을 때 로그인버튼 위치 계산되지 않도록 하기위한 플래그
  // $(window).on('throttle.resize', function (e, data) {
  //   var height = (typeof data !== 'undefined') ? data.height : $window.height()
  //   if (mobileScrollFlag) {
  //     scrollCheck(height)
  //   }
  // })

  // // 비 로그인 시 로그인 버튼 스크롤에 따라 움직이게 하는 함수
  // function scrollCheck(pHeight) {
  //   var gnbFooterHeight = $('.header-button-mobile-box').outerHeight(true);	// GNB푸터 영역
  //   var listGnbHeight = $('.gnb--mobile .gnb__menu').outerHeight();	// GNB메뉴 영역
  //   listGnbHeight = listGnbHeight + gnbFooterHeight;

  //   if(pHeight < listGnbHeight) {
  //     // GNB 영역 스크롤 될때
  //     // flag = true;
  //     $('.header-button-mobile-box').css('position', 'static');
  //     $('.header-button-mobile-box').css('bottom','initial');
  //   } else {
  //     // GNB 영역 스크롤 되지 않을때
  //     $('.header-button-mobile-box').css('position', 'absolute');
  //     setTimeout(function(){
  //         $('.header-button-mobile-box').css('bottom',0);
  //     }, 100);
  //     // flag = false;
  //   }
  // }
  // ================= //모바일 메뉴 로그인 버튼 움직임 ==============

  // 개선된 메뉴
  // PC 펼쳐지는 메뉴 노출 스크립트
  $('.header-content--pc .header-gnb-list').on('mouseover', function() {
      var menuHeight = $('.header-gnb-list > li').height()
      $('.header-content--pc .header-gnb').css('maxHeight', menuHeight)
      $('.header-content--pc .header-gnb').addClass('open')
  })
  $('.header-content--pc .header-gnb-list').on('mouseleave', function() {
      $('.header-content--pc .header-gnb').css('maxHeight', '72px')
      $('.header-content--pc .header-gnb').removeClass('open')
  })
  $('.header-content--pc .header-gnb-list__link, .header-content--pc .header-gnb-list-depth__link').on('focusin', function() {
      var menuHeight = $('.header-gnb-list > li').height()
      $('.header-content--pc .header-gnb').css('maxHeight', menuHeight)
      $('.header-content--pc .header-gnb').addClass('open')
  })
  $('.header-content--pc .header-gnb-list__link, .header-content--pc .header-gnb-list').on('focusout', function() {
      $('.header-content--pc .header-gnb').css('maxHeight', '72px')
      $('.header-content--pc .header-gnb').removeClass('open')
  })
  // 개선된 메뉴

  // ===== 모바일 햄버거 메뉴 =====
  $('.__header-mobile-menu-button').on('click', function() {
      $('.__header-mobile-menu').addClass('open')
      $('.__header-info-layer-dimmed').addClass('open')
  })

  $('.__header-info-layer-dimmed').on('click', function() {
      $('.__header-mobile-menu').removeClass('open')
      $('.__header-info-layer-dimmed').removeClass('open')
  })
  // ===== //모바일 햄버거 메뉴 =====

  // 로그인 후 PC 마이페이지 링크 클릭 시 로그인 정보 팝업 동작
  $('.__header-login-mypage-button').click(function() {
      $('.__header-login-mypage').toggleClass('open');
  });
})
