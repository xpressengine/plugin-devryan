<!-- 갤러리 배너 위젯 -->
@php
    XeFrontend::css(asset('plugins/devryan/Components/Skins/Banner/Gallery/assets/css/photoswipe.css'))->load();
    XeFrontend::css(asset('plugins/devryan/Components/Skins/Banner/Gallery/assets/css/photoswipe-default-skin.css'))->load();
    XeFrontend::js(asset('plugins/devryan/Components/Skins/Banner/Gallery/assets/js/photoswipe.js'))->appendTo('body')->load();
    XeFrontend::js(asset('plugins/devryan/Components/Skins/Banner/Gallery/assets/js/photoswipe-ui-default.js'))->appendTo('body')->load();
@endphp

<div class="xe-row">
    <div class="xe-col-md-12">
        <section class="section-widget-xe-eastern-gallery">
            <div class="xe-container">
                <div class="widget-xe-eastern-gallery__info">
                    <h2 class="widget-xe-eastern-gallery__info-title">
                        {{$title}}
                    </h2>
                </div>
                <div class="widget-xe-eastern-gallery-list __pageswipe-gallery">
                    @foreach($items as $item)
                        @php
                            $imageSize = $item->getImageSize();
                        @endphp
                    <!-- [D] 노출 이미지 적용, 사이즈 적용 -->
                    <a href="{{ $item->imageUrl() }}" data-size="{{ $imageSize['width'] }}x{{ $imageSize['height'] }}" data-med="{{ $item->imageUrl() }}" data-med-size="{{ $imageSize['width'] }}x{{ $imageSize['height'] }}" class="widget-xe-eastern-gallery-list__item">
                        <span class="widget-xe-eastern-gallery-list__item-contents">
                            <span class="widget-xe-eastern-gallery-list__item-image-box">
                                <!-- [D] 이미지 적용 -->
                                <span class="widget-xe-eastern-gallery-list__item-image" style="background-image: url({{ $item->imageUrl() }});">
                                    <span class="blind">배경이미지</span>
                                </span>
                            </span>
                            <span class="widget-xe-eastern-gallery-list__item-text-box">
                                <!-- [D] 제목 적용 -->
                                <span class="widget-xe-eastern-gallery-list__item-title">{!! $item->title !!}</span>
                                <span class="widget-xe-eastern-board-image-list__item-category">{!! $item->ect['sub_title'] !== null ? $item->ect['sub_title'] : '' !!}</span>
                            </span>
                        </span>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
<!-- 갤러리 배너 위젯 -->

<div id="widgetGallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center">
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    (function() {
        var initPhotoSwipeFromDOM = function(gallerySelector) {
            var parseThumbnailElements = function(el) {
                var thumbElements = el.childNodes,
                    numNodes = thumbElements.length,
                    items = [],
                    el,
                    childElements,
                    thumbnailEl,
                    size,
                    item;

                for(var i = 0; i < numNodes; i++) {
                    el = thumbElements[i];

                    // include only element nodes
                    if(el.nodeType !== 1) {
                        continue;
                    }

                    childElements = el.children;

                    size = el.getAttribute('data-size').split('x');

                    // create slide object
                    item = {
                        src: el.getAttribute('href'),
                        w: parseInt(size[0], 10),
                        h: parseInt(size[1], 10),
                        author: el.getAttribute('data-author')
                    };

                    item.el = el; // save link to element for getThumbBoundsFn

                    if(childElements.length > 0) {
                        item.msrc = childElements[0].getAttribute('src'); // thumbnail url
                        if(childElements.length > 1) {
                            item.title = childElements[1].innerHTML; // caption (contents of figure)
                        }
                    }

                    var mediumSrc = el.getAttribute('data-med');
                    if(mediumSrc) {
                        size = el.getAttribute('data-med-size').split('x');
                        // "medium-sized" image
                        item.m = {
                            src: mediumSrc,
                            w: parseInt(size[0], 10),
                            h: parseInt(size[1], 10)
                        };
                    }
                    // original image
                    item.o = {
                        src: item.src,
                        w: item.w,
                        h: item.h
                    };

                    items.push(item);
                }

                return items;
            };

            // find nearest parent element
            var closest = function closest(el, fn) {
                return el && ( fn(el) ? el : closest(el.parentNode, fn) );
            };

            var onThumbnailsClick = function(e) {
                e = e || window.event;
                e.preventDefault ? e.preventDefault() : e.returnValue = false;

                var eTarget = e.target || e.srcElement;

                var clickedListItem = closest(eTarget, function(el) {
                    return el.tagName === 'A';
                });

                if(!clickedListItem) {
                    return;
                }

                var clickedGallery = clickedListItem.parentNode;

                var childNodes = clickedListItem.parentNode.childNodes,
                    numChildNodes = childNodes.length,
                    nodeIndex = 0,
                    index;

                for (var i = 0; i < numChildNodes; i++) {
                    if(childNodes[i].nodeType !== 1) {
                        continue;
                    }

                    if(childNodes[i] === clickedListItem) {
                        index = nodeIndex;
                        break;
                    }
                    nodeIndex++;
                }

                if(index >= 0) {
                    openPhotoSwipe( index, clickedGallery );
                }
                return false;
            };

            var photoswipeParseHash = function() {
                var hash = window.location.hash.substring(1),
                params = {};

                if(hash.length < 5) { // pid=1
                    return params;
                }

                var vars = hash.split('&');
                for (var i = 0; i < vars.length; i++) {
                    if(!vars[i]) {
                        continue;
                    }
                    var pair = vars[i].split('=');
                    if(pair.length < 2) {
                        continue;
                    }
                    params[pair[0]] = pair[1];
                }

                if(params.gid) {
                    params.gid = parseInt(params.gid, 10);
                }

                return params;
            };

            var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
                var pswpElement = document.querySelectorAll('.pswp')[0],
                    gallery,
                    options,
                    items;

                items = parseThumbnailElements(galleryElement);

                // define options (if needed)
                options = {

                    galleryUID: galleryElement.getAttribute('data-pswp-uid'),

                    showHideOpacity: true,
                    preloaderEl: true,
                    arrowKeys: true,
                    pinchToClose: true,



                    addCaptionHTMLFn: function(item, captionEl, isFake) {
                        if(!item.title) {
                            captionEl.children[0].innerText = '';
                            return false;
                        }
                        captionEl.children[0].innerHTML = item.title +  '<br/><small>Photo: ' + item.author + '</small>';
                        return true;
                    }

                };


                if(fromURL) {
                    if(options.galleryPIDs) {
                        // parse real index when custom PIDs are used
                        // https://photoswipe.com/documentation/faq.html#custom-pid-in-url
                        for(var j = 0; j < items.length; j++) {
                            if(items[j].pid == index) {
                                options.index = j;
                                break;
                            }
                        }
                    } else {
                        options.index = parseInt(index, 10) - 1;
                    }
                } else {
                    options.index = parseInt(index, 10);
                }

                // exit if index not found
                if( isNaN(options.index) ) {
                    return;
                }



                var radios = document.getElementsByName('gallery-style');
                for (var i = 0, length = radios.length; i < length; i++) {
                    if (radios[i].checked) {
                        if(radios[i].id == 'radio-all-controls') {

                        } else if(radios[i].id == 'radio-minimal-black') {
                            options.mainClass = 'pswp--minimal--dark';
                            options.barsSize = {top:0,bottom:0};
                            options.captionEl = false;
                            options.fullscreenEl = false;
                            options.shareEl = false;
                            options.bgOpacity = 1;
                            options.tapToClose = true;
                            options.tapToToggleControls = false;
                        }
                        break;
                    }
                }

                if(disableAnimation) {
                    options.showAnimationDuration = 0;
                }

                // Pass data to PhotoSwipe and initialize it
                gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);

                // see: https://photoswipe.com/documentation/responsive-images.html
                var realViewportWidth,
                    useLargeImages = false,
                    firstResize = true,
                    imageSrcWillChange;

                gallery.listen('beforeResize', function() {

                    var dpiRatio = window.devicePixelRatio ? window.devicePixelRatio : 1;
                    dpiRatio = Math.min(dpiRatio, 2.5);
                    realViewportWidth = gallery.viewportSize.x * dpiRatio;


                    if(realViewportWidth >= 1200 || (!gallery.likelyTouchDevice && realViewportWidth > 800) || screen.width > 1200 ) {
                        if(!useLargeImages) {
                            useLargeImages = true;
                            imageSrcWillChange = true;
                        }

                    } else {
                        if(useLargeImages) {
                            useLargeImages = false;
                            imageSrcWillChange = true;
                        }
                    }

                    if(imageSrcWillChange && !firstResize) {
                        gallery.invalidateCurrItems();
                    }

                    if(firstResize) {
                        firstResize = false;
                    }

                    imageSrcWillChange = false;
                });

                gallery.listen('gettingData', function(index, item) {
                    if( useLargeImages ) {
                        item.src = item.o.src;
                        item.w = item.o.w;
                        item.h = item.o.h;
                    } else {
                        item.src = item.m.src;
                        item.w = item.m.w;
                        item.h = item.m.h;
                    }
                });

                gallery.init();
            };

            // select all gallery elements
            var galleryElements = document.querySelectorAll( gallerySelector );
            for(var i = 0, l = galleryElements.length; i < l; i++) {
                galleryElements[i].setAttribute('data-pswp-uid', i+1);
                galleryElements[i].onclick = onThumbnailsClick;
            }

            // Parse URL and open gallery if it contains #&pid=3&gid=1
            var hashData = photoswipeParseHash();
            if(hashData.pid && hashData.gid) {
                openPhotoSwipe( hashData.pid,  galleryElements[ hashData.gid - 1 ], true, true );
            }
        };

        initPhotoSwipeFromDOM('.__pageswipe-gallery');
    })();
</script>
