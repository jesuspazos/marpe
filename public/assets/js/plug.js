$window = $(window);

  var isNoviBuilder = window.xMode;
  var $html = $("html");
  var isDesktop = $html.hasClass("desktop");
  
  $window.on('load', function () {
    var circle = $(".preloader");
    if (circle.length && !isNoviBuilder) {
      pageTransition({
        target:            document.querySelector('.page'),
        delay:             0,
        duration:          500,
        classIn:           'fadeIn',
        classOut:          'fadeOut',
        classActive:       'animated',
        conditions:        function (event, link) {
          return !/(\#|callto:|tel:|mailto:|:\/\/)/.test(link) && !event.currentTarget.hasAttribute('data-lightgallery');
        },
        onTransitionStart: function (options) {
          setTimeout(function () {
            circle.removeClass('loaded');
          }, options.duration * .75);
        },
        onReady:           function () {
          circle.addClass('loaded');
          windowReady = true;
        }
      });
    }  

    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-succes").slideUp(700);
    });     
  });


  var rdNavbar = $(".rd-navbar");
  
  if(rdNavbar.length) {
    var aliaces, i, j, len, value, values, responsiveNavbar;

    aliaces = ["-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"];
    values = [0, 576, 768, 992, 1200, 1600];
    responsiveNavbar = {};

    for (i = j = 0, len = values.length; j < len; i = ++j) {
      value = values[i];
      if (!responsiveNavbar[values[i]]) {
        responsiveNavbar[values[i]] = {};
      }
      if (rdNavbar.attr('data' + aliaces[i] + 'layout')) {
        responsiveNavbar[values[i]].layout = rdNavbar.attr('data' + aliaces[i] + 'layout');
      }
      if (rdNavbar.attr('data' + aliaces[i] + 'device-layout')) {
        responsiveNavbar[values[i]]['deviceLayout'] = rdNavbar.attr('data' + aliaces[i] + 'device-layout');
      }
      if (rdNavbar.attr('data' + aliaces[i] + 'hover-on')) {
        responsiveNavbar[values[i]]['focusOnHover'] = rdNavbar.attr('data' + aliaces[i] + 'hover-on') === 'true';
      }
      if (rdNavbar.attr('data' + aliaces[i] + 'auto-height')) {
        responsiveNavbar[values[i]]['autoHeight'] = rdNavbar.attr('data' + aliaces[i] + 'auto-height') === 'true';
      }

      if (isNoviBuilder) {
        responsiveNavbar[values[i]]['stickUp'] = false;
      } else if (rdNavbar.attr('data' + aliaces[i] + 'stick-up')) {
        responsiveNavbar[values[i]]['stickUp'] = rdNavbar.attr('data' + aliaces[i] + 'stick-up') === 'true';
      }

      if (rdNavbar.attr('data' + aliaces[i] + 'stick-up-offset')) {
        responsiveNavbar[values[i]]['stickUpOffset'] = rdNavbar.attr('data' + aliaces[i] + 'stick-up-offset');
      }
    }


    rdNavbar.RDNavbar({
      anchorNav:    !isNoviBuilder,
      stickUpClone: (rdNavbar.attr("data-stick-up-clone") && !isNoviBuilder) ? rdNavbar.attr("data-stick-up-clone") === 'true' : false,
      responsive:   responsiveNavbar,
      callbacks:    {
        onDropdownOver: function () {
          return !isNoviBuilder;
        },
      }
    });

    if (rdNavbar.attr("data-body-class")) {
      document.body.className += ' ' + rdNavbar.attr("data-body-class");
    }  
  }

  var swiper = $(".swiper-slider");
  if (swiper.length) {
      for (var i = 0; i < swiper.length; i++) {
        var s = $(swiper[i]);
        var pag = s.find(".swiper-pagination"),
            next = s.find(".swiper-button-next"),
            prev = s.find(".swiper-button-prev"),
            bar = s.find(".swiper-scrollbar"),
            swiperSlide = s.find(".swiper-slide"),
            autoplay = false;

        for (var j = 0; j < swiperSlide.length; j++) {
          var $this = $(swiperSlide[j]),
              url;

          if (url = $this.attr("data-slide-bg")) {
            $this.css({
              "background-image": "url(" + url + ")",
              "background-size":  "cover"
            })
          }
        }

        swiperSlide.end()
        .find("[data-caption-animate]")
        .addClass("not-animated")
        .end();

        s.swiper({
          autoplay:                 s.attr('data-autoplay') ? s.attr('data-autoplay') === "false" ? undefined : s.attr('data-autoplay') : 5000,
          direction:                s.attr('data-direction') && isDesktop ? s.attr('data-direction') : "horizontal",
          effect:                   s.attr('data-slide-effect') ? s.attr('data-slide-effect') : "slide",
          speed:                    s.attr('data-slide-speed') ? s.attr('data-slide-speed') : 600,
          keyboardControl:          s.attr('data-keyboard') === "true",
          mousewheelControl:        s.attr('data-mousewheel') === "true",
          mousewheelReleaseOnEdges: s.attr('data-mousewheel-release') === "true",
          nextButton:               next.length ? next.get(0) : null,
          prevButton:               prev.length ? prev.get(0) : null,
          pagination:               pag.length ? pag.get(0) : null,
          paginationClickable:      pag.length ? pag.attr("data-clickable") !== "false" : false,
          paginationBulletRender:   function (swiper, index, className) {
            if (pag.attr("data-index-bullet") === "true") {
              return '<span class="' + className + '">' + (index + 1) + '</span>';
            } else if (pag.attr("data-bullet-custom") === "true") {
              return '<span class="' + className + '"><span></span></span>';
            } else {
              return '<span class="' + className + '"></span>';
            }
          },
          scrollbar:                bar.length ? bar.get(0) : null,
          scrollbarDraggable:       bar.length ? bar.attr("data-draggable") !== "false" : true,
          scrollbarHide:            bar.length ? bar.attr("data-draggable") === "false" : false,
          loop:                     isNoviBuilder ? false : s.attr('data-loop') !== "false",
          simulateTouch:            s.attr('data-simulate-touch') && !isNoviBuilder ? s.attr('data-simulate-touch') === "true" : false,
          onTransitionStart:        function (swiper) {
            toggleSwiperInnerVideos(swiper);
          },
          onTransitionEnd:          function (swiper) {
            toggleSwiperCaptionAnimation(swiper);
          },
          onInit:                   (function (s) {
            return function (swiper) {
              toggleSwiperInnerVideos(swiper);
              toggleSwiperCaptionAnimation(swiper);

              var $swiper = $(s);

              var swiperCustomIndex = $swiper.find('.swiper-pagination__fraction-index').get(0),
                  swiperCustomCount = $swiper.find('.swiper-pagination__fraction-count').get(0);

              if (swiperCustomIndex && swiperCustomCount) {
                swiperCustomIndex.innerHTML = formatIndex(swiper.realIndex + 1);
                if (swiperCustomCount) {
                  if (isNoviBuilder ? false : s.attr('data-loop') !== "false") {
                    swiperCustomCount.innerHTML = formatIndex(swiper.slides.length - 2);
                  } else {
                    swiperCustomCount.innerHTML = formatIndex(swiper.slides.length);
                  }
                }
              }
            }
          }(s)),
          onSlideChangeStart:       (function (s) {
            return function (swiper) {
              var swiperCustomIndex = $(s).find('.swiper-pagination__fraction-index').get(0);

              if (swiperCustomIndex) {
                swiperCustomIndex.innerHTML = formatIndex(swiper.realIndex + 1);
              }
            }
          }(s))
        });

        $window.on("resize", (function (s) {
          return function () {
            var mh = getSwiperHeight(s, "min-height"),
                h = getSwiperHeight(s, "height");
            if (h) {
              s.css("height", mh ? mh > h ? mh : h : h);
            }
          }
        })(s)).trigger("resize");
      }
  }

  function toggleSwiperInnerVideos(swiper) {
      var prevSlide = $(swiper.slides[swiper.previousIndex]),
          nextSlide = $(swiper.slides[swiper.activeIndex]),
          videos,
          videoItems = prevSlide.find("video");

      for (var i = 0; i < videoItems.length; i++) {
        videoItems[i].pause();
      }

      videos = nextSlide.find("video");
      if (videos.length) {
        videos.get(0).play();
      }
    }

    /**
     * @desc Toggle swiper animations on active slides
     * @param {object} swiper - swiper slider
     */
    function toggleSwiperCaptionAnimation(swiper) {
      var prevSlide = $(swiper.container).find("[data-caption-animate]"),
          nextSlide = $(swiper.slides[swiper.activeIndex]).find("[data-caption-animate]"),
          delay,
          duration,
          nextSlideItem,
          prevSlideItem;

      for (var i = 0; i < prevSlide.length; i++) {
        prevSlideItem = $(prevSlide[i]);

        prevSlideItem.removeClass("animated")
        .removeClass(prevSlideItem.attr("data-caption-animate"))
        .addClass("not-animated");
      }


      var tempFunction = function (nextSlideItem, duration) {
        return function () {
          nextSlideItem
          .removeClass("not-animated")
          .addClass(nextSlideItem.attr("data-caption-animate"))
          .addClass("animated");
          if (duration) {
            nextSlideItem.css('animation-duration', duration + 'ms');
          }
        };
      };

      for (var i = 0; i < nextSlide.length; i++) {
        nextSlideItem = $(nextSlide[i]);
        delay = nextSlideItem.attr("data-caption-delay");
        duration = nextSlideItem.attr('data-caption-duration');
        if (!isNoviBuilder) {
          if (delay) {
            setTimeout(tempFunction(nextSlideItem, duration), parseInt(delay, 10));
          } else {
            tempFunction(nextSlideItem, duration);
          }

        } else {
          nextSlideItem.removeClass("not-animated")
        }
      }
    }

    function getSwiperHeight(object, attr) {
      var val = object.attr("data-" + attr),
          dim;

      if (!val) {
        return undefined;
      }

      dim = val.match(/(px)|(%)|(vh)|(vw)$/i);

      if (dim.length) {
        switch (dim[0]) {
          case "px":
            return parseFloat(val);
          case "vh":
            return $window.height() * (parseFloat(val) / 100);
          case "vw":
            return $window.width() * (parseFloat(val) / 100);
          case "%":
            return object.width() * (parseFloat(val) / 100);
        }
      } else {
        return undefined;
      }
    }

    var owl = $(".owl-carousel");

    if (owl.length) {
      for (var i = 0; i < owl.length; i++) {
        var c = $(owl[i]);
        owl[i].owl = c;

        initOwlCarousel(c);
      }
    }

    /**
     * @desc Initialize owl carousel plugin
     * @param {object} c - carousel jQuery object
     */
    function initOwlCarousel(c) {
      var aliaces = ["-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"],
          values = [0, 576, 768, 992, 1200, 1600],
          responsive = {};

      for (var j = 0; j < values.length; j++) {
        responsive[values[j]] = {};
        for (var k = j; k >= -1; k--) {
          if (!responsive[values[j]]["items"] && c.attr("data" + aliaces[k] + "items")) {
            responsive[values[j]]["items"] = k < 0 ? 1 : parseInt(c.attr("data" + aliaces[k] + "items"), 10);
          }
          if (!responsive[values[j]]["stagePadding"] && responsive[values[j]]["stagePadding"] !== 0 && c.attr("data" + aliaces[k] + "stage-padding")) {
            responsive[values[j]]["stagePadding"] = k < 0 ? 0 : parseInt(c.attr("data" + aliaces[k] + "stage-padding"), 10);
          }
          if (!responsive[values[j]]["margin"] && responsive[values[j]]["margin"] !== 0 && c.attr("data" + aliaces[k] + "margin")) {
            responsive[values[j]]["margin"] = k < 0 ? 30 : parseInt(c.attr("data" + aliaces[k] + "margin"), 10);
          }
        }
      }

      // Enable custom pagination
      if (c.attr('data-dots-custom')) {
        c.on("initialized.owl.carousel", function (event) {
          var carousel = $(event.currentTarget),
              customPag = $(carousel.attr("data-dots-custom")),
              active = 0;

          if (carousel.attr('data-active')) {
            active = parseInt(carousel.attr('data-active'), 10);
          }

          carousel.trigger('to.owl.carousel', [active, 300, true]);
          customPag.find("[data-owl-item='" + active + "']").addClass("active");

          customPag.find("[data-owl-item]").on('click', function (e) {
            e.preventDefault();
            carousel.trigger('to.owl.carousel', [parseInt(this.getAttribute("data-owl-item"), 10), 300, true]);
          });

          carousel.on("translate.owl.carousel", function (event) {
            customPag.find(".active").removeClass("active");
            customPag.find("[data-owl-item='" + event.item.index + "']").addClass("active")
          });
        });
      }

      c.on("initialized.owl.carousel", function () {
        initLightGalleryItem(c.find('[data-lightgallery="item"]'), 'lightGallery-in-carousel');
      });

      c.owlCarousel({
        autoplay:      isNoviBuilder ? false : c.attr("data-autoplay") === "true",
        loop:          isNoviBuilder ? false : c.attr("data-loop") !== "false",
        items:         1,
        center:        c.attr("data-center") === "true",
        dotsContainer: c.attr("data-pagination-class") || false,
        navContainer:  c.attr("data-navigation-class") || false,
        mouseDrag:     isNoviBuilder ? false : c.attr("data-mouse-drag") !== "false",
        nav:           c.attr("data-nav") === "true",
        dots:          c.attr("data-dots") === "true",
        dotsEach:      c.attr("data-dots-each") ? parseInt(c.attr("data-dots-each"), 10) : false,
        animateIn:     c.attr('data-animation-in') ? c.attr('data-animation-in') : false,
        animateOut:    c.attr('data-animation-out') ? c.attr('data-animation-out') : false,
        responsive:    responsive,
        navText:       function () {
          try {
            return JSON.parse(c.attr("data-nav-text"));
          } catch (e) {
            return [];
          }
        }(),
        navClass:      function () {
          try {
            return JSON.parse(c.attr("data-nav-class"));
          } catch (e) {
            return ['owl-prev', 'owl-next'];
          }
        }()
      });
    }

    function initLightGalleryItem(itemToInit, addClass) {
      if (!isNoviBuilder) {
        $(itemToInit).lightGallery({
          selector:            "this",
          addClass:            addClass,
          counter:             false,
          youtubePlayerParams: {
            modestbranding: 1,
            showinfo:       0,
            rel:            0,
            controls:       0
          },
          vimeoPlayerParams:   {
            byline:   0,
            portrait: 0
          }
        });
      }
    }
