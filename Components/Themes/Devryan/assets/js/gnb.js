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
  var lastScrollTop = 0
  $window.on('throttle.scroll', function (e, data) {
    var st = (typeof data !== 'undefined') ? data.top : $window.scrollTop()

    // if (st > headerHeight){
    if (st > 90) {
      // Scroll Down
      $header.addClass('sticky')
    } else {
      // Scroll Up
      $header.removeClass('sticky')
    }

    if (st > 90) {
      if ((lastScrollTop - st) > 0 || st == 0) {
        // up
        $header.addClass('menu--open')
      } else {
        // down
        $header.removeClass('menu--open')
        // $('.header-area .box-modify-listbox-list').css('display', 'none');
      }
    } else {
      $header.addClass('menu--open')
    }

    lastScrollTop = st
  })
  $window.triggerHandler('throttle.scroll')

  // 개선된 메뉴
  // PC 펼쳐지는 메뉴 노출 스크립트
  $('.header-content--pc .header-gnb-list').on('mouseover', function () {
    var menuHeight = $('.header-gnb-list > li').height()
    $('.header-content--pc .header-gnb').css('maxHeight', menuHeight)
    $('.header-content--pc .header-gnb').addClass('open')
  })
  $('.header-content--pc .header-gnb-list').on('mouseleave', function () {
    $('.header-content--pc .header-gnb').css('maxHeight', '72px')
    $('.header-content--pc .header-gnb').removeClass('open')
  })
  $('.header-content--pc .header-gnb-list__link, .header-content--pc .header-gnb-list-depth__link').on('focusin', function () {
    var menuHeight = $('.header-gnb-list > li').height()
    $('.header-content--pc .header-gnb').css('maxHeight', menuHeight)
    $('.header-content--pc .header-gnb').addClass('open')
  })
  $('.header-content--pc .header-gnb-list__link, .header-content--pc .header-gnb-list').on('focusout', function () {
    $('.header-content--pc .header-gnb').css('maxHeight', '72px')
    $('.header-content--pc .header-gnb').removeClass('open')
  })
  // 개선된 메뉴

  // ===== 모바일 햄버거 메뉴 =====
  $('.__header-mobile-menu-button').on('click', function () {
    $('.__header-mobile-menu').addClass('open')
    $('.__header-info-layer-dimmed').addClass('open')
  })

  $('.__header-info-layer-dimmed').on('click', function () {
    $('.__header-mobile-menu').removeClass('open')
    $('.__header-info-layer-dimmed').removeClass('open')
  })
  // ===== //모바일 햄버거 메뉴 =====

  // 로그인 후 PC 마이페이지 링크 클릭 시 로그인 정보 팝업 동작
  $('.__header-login-mypage-button').click(function () {
    $('.__header-login-mypage').toggleClass('open')
  })
})
