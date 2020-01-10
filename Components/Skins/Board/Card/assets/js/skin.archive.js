window.jQuery(function ($) {
  // favorite
  $('.__act-article-favorite').on('change_state.together_board.favorite', function (e, params) {
    var className = 'tool__favorite--active'

    if (params.activated) {
      $('.tool__favorite').addClass(className).find('i').removeClass('xi-star-o').addClass('xi-star')
    } else {
      $('.tool__favorite').removeClass(className).find('i').removeClass('xi-star').addClass('xi-star-o')
    }
  })
  $('.__act-article-favorite').on('click', function () {
    var $el = $(this)
    var url = $el.data('url')

    window.XE.post(url).then(function (response) {
      $('.__act-article-favorite').triggerHandler('change_state.together_board.favorite', {
        'activated': response.data.favorite
      })
    })
  })

  // assent, like
  $('.__act-article-assent').on('change_state.together_board.assent', function (e, data) {
    var className = 'tool__assent--active'

    if (data.activated) {
      $('.tool__assent').addClass(className).find('i').removeClass('xi-heart-o').addClass('xi-heart')
    } else {
      $('.tool__assent').removeClass(className).find('i').removeClass('xi-heart').addClass('xi-heart-o')
    }

    $('.tool__assent-number').text(data.count)
  })
  $('.__act-article-assent').on('click', function () {
    var $el = $(this)
    var url = $el.data('url')

    window.XE.post(url).then(function (response) {
      var activated = (response.data.voteAt === 'assent')
      $('.__act-article-assent').triggerHandler('change_state.together_board.assent', {
        'activated': activated,
        'count': response.data.counts.assent
      })
    })
  })

  // search-form
  $('.__board-search-form').on('open_search.archive_board', function (e, mode) {
    var $this = $(this)
    mode = mode || 'simple'

    $this.addClass('board-search__form--' + mode)
    $('.__board-search-container').addClass('board-search--active')
  })
  $('.__board-search-form').on('close_search.archive_board', function () {
    var $this = $(this)

    $this.removeClass('board-search__form--simple').removeClass('board-search__form--detail')
    $('.__board-search-container').removeClass('board-search--active')
  })

  // 검색창 열기
  $('.__board-search-form--open').on('click', function () {
    $('.__board-search-form').trigger('open_search.archive_board')
  })
  $('.__board-search-form--detail').on('click', function () {
    $('.__board-search-form').trigger('open_search.archive_board', ['detail'])
  })
  $('.__board-search-form--close').on('click', function () {
    $('.__board-search-form').trigger('close_search.archive_board')
  })
  $('.__board-search-form--reset').on('click', function () {
    var resetUrl = $(this).closest('form').attr('action')
    window.location.href = resetUrl
  })

  // 카테고리 선택
  $('.__board-search-form').on('category.archive_board', function (e, categoryItemId) {
    console.debug(categoryItemId)
    $('.__board-search-form').find('[name=category_item_id]').val(categoryItemId)
    $('.__board-search-form').submit()
  })
  $('.__board-search-category').on('click', 'a', function (e) {
    e.preventDefault()
    var $this = $(this)
    var categoryItemId = $this.data('value')
    $('.__board-search-form').trigger('category.archive_board', [categoryItemId])
  })

  // 정렬 선택
  $('.__board-search-form').on('order_type.archive_board', function (e, orderType) {
    console.debug(orderType)
    $('.__board-search-form').find('[name=order_type]').val(orderType)
    $('.__board-search-form').submit()
  })
  $('.__board-search-order').on('click', 'a', function (e) {
    e.preventDefault()
    var $this = $(this)
    var orderType = $this.data('value')
    $('.__board-search-form').trigger('order_type.archive_board', [orderType])
  })

  // --------------------

  /* view. 첨부파일 목록 토글 */
  // $('.btn-file').on('click', function toggleAttachList () {
  //   $('.list-file').toggle()
  // })

  /* view. 글 삭제 */
  $('.bd_delete').on('click touchstart', function (event) {
    if (window.confirm(window.XE.Lang.trans('board::msgDeleteConfirm'))) {
      var url = $(this).data('url')
      window.XE.delete(url, {}).then(function (response) {
        if (response.data.links && response.data.links.href) {
          document.location.href = response.data.links.href
        }
      })
    }
  })

  /* view. like 버튼 */
  // $('.btn-like').on('click touchstart', function (event) {
  //   event.preventDefault()
  //   var $target = $(event.target).closest('button')
  //   var url = $target.data('url')

  //   window.XE.post(url).then(function (response) {
  //     $target.toggleClass('active')
  //     $('.bd_like_num').text(response.data.counts.assent)
  //     toggleAreaLike()
  //   })
  // })

  // function toggleAreaLike () {
  //   var $linkNum = $('.bd_like_num')
  //   if ($linkNum.length && parseInt($linkNum.text()) !== 0) {
  //     window.XE.page($linkNum.data('url'), '#area-like-more' + $linkNum.data('id'), {}, function () {
  //       $('#area-like-more' + $linkNum.data('id')).show()
  //     })
  //   } else {
  //     $('#area-like-more' + $linkNum.data('id')).hide()
  //   }
  // }
  // toggleAreaLike()
})
