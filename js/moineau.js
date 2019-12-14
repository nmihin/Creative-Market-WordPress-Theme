/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//DOM UTIL READY
jQuery(document).ready(function() {

    MOINEAU.init();

    jQuery(window).resize(function () {
        MOINEAU.resize();
    })

});


var MOINEAU = {
    init: function () {
        this.actions();
    },
    actions: function () {
        this.windowHeight();
        this.masonry();
        this.menu();
        this.animatemenu();
        this.sticky();
        this.clientsResize();
        this.detectResolution();
        this.initClients();
        this.fontsSize();
        this.portfolioMenu();
        this.videoPlay();
        this.animateIcons();
        this.verticalMenu();
        this.scrollToId();
    },
    resize: function () {
        this.windowHeight();
        this.sticky();
        this.clientsResize();
        this.detectResolution();
        this.initClients();
        this.fontsSize();
    },
    windowHeight: function () {
        winh = jQuery(window).height();
        jQuery('#teaser,#teaser .content-slide').css({
            height: winh
        });
        setTimeout(function () {
            return sticky_navigation_offset_top = jQuery('#teaser').height();
        }, 1000);
    },
    scrollToId: function(){
        jQuery(".swiper-pagination li a").on("click", function (e) {
            e.preventDefault();
            var t = this.hash,
                n = jQuery(t);
            jQuery("html, body").stop().animate({
                scrollTop: n.offset().top
            }, 900, "swing", function () {
                window.location.hash = t
            })
            //CLASS ACTIVE
            jQuery('.swiper-pagination li a').each(function(){
                jQuery(this).removeClass('active');
            });
            jQuery(this).addClass('active');
        });
    },
    clientsResize: function () {
        setTimeout(function () {
            var d = jQuery('#clients .content-slide .content-inner img').height();
            jQuery('#clients-logos').css({
                'height': d + 30
            });
        }, 500);
    },
    verticalMenu: function(){
        var vm;
        jQuery('.swiper-pagination').append('<li><a href="#teaser"></a></li>')  
        jQuery('#main section').each(function(){
            vm = jQuery(this).attr('id');
            jQuery('.swiper-pagination').append('<li><a class="'+vm+'" href="#'+vm+'"></a></li>')  
        });
    },
    masonry: function () {
        // init Isotope
        var jQuerycontainer = jQuery('.gallery').isotope({
            itemSelector: '.inside',
            layoutMode: 'fitRows',
            getSortData: {
                name: '.name',
                symbol: '.symbol',
                number: '.number parseInt',
                category: '[data-category]',
                weight: function (itemElem) {
                    var weight = jQuery(itemElem).find('.weight').text();
                    return parseFloat(weight.replace(/[\(\)]/g, ''));
                }
            }
        });
        // filter items on button click
        jQuery('#filters').on('click', 'button', function () {
            var filterValue = jQuery(this).attr('data-filter');

            jQuerycontainer.isotope({filter: filterValue});
        });

        jQuery("#show-all").trigger("click");
    },
    animateIcons: function () {
        jQuery('.visibility-check').viewportChecker({});
    },
    setSkillsIcon: function () {
        jQuery('.works-subtitle .fa').each(function () {
            //jQuery(this).closest('.work').appendTo('.works-icons');
            jQuery(this).closest('.works').find('.works-icons').append(this);
        });
    },
    map: function () {
        var xCoordinate = jQuery('.x-coordinate').val();
        var yCoordinate = jQuery('.y-coordinate').val();
        var mapCanvas = document.getElementById('map-canvas');
        var parliament = new google.maps.LatLng(xCoordinate, yCoordinate);
        var image = {
            url: 'http://reframe.hr/theme/pin.png'
        }
        var mapOptions = {
            center: parliament,
            draggable: false,
            zoomControl: false,
            zoom: 14,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"stylers":[{"hue":"#00aaff"},{"saturation":-100},{"gamma":2.15},{"lightness":12}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"lightness":24}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":57}]}]
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({
            map: map,
            draggable: false,
            scrollwheel: false,
            zoomControl: false,
            icon: image,
            animation: google.maps.Animation.DROP,
            position: parliament
        });
    },
    animatemenu: function () {
        jQuery('.icon').on('click', function () {
            jQuery(this).toggleClass('open');
        });
    },
    paralax: function () {
        jQuery('.st').each(function () {
            var aB = jQuery(document).scrollTop() / 2;
            var viewableOffset = jQuery(this).offset().top - jQuery(window).scrollTop();
            viewableOffset = viewableOffset / 2;

            jQuery(this).viewportChecker({
                classToAdd: 'visible',
                repeat: true
            });
            if (jQuery(this).hasClass('visible')) {
                jQuery(this).stop().animate({
                    backgroundPositionY: -viewableOffset,
                    easing: 'easeOutBack'
                }, 300);
            }
        });
    },
    skills: function () {
        var i = 1;
        jQuery('.skill').each(function () {
            var c, child, percentage, colors;
            child = '#circles-' + i;
            percentage = jQuery(this).find('.circle').attr('data-value');
            colors = ['#00a69a', '#1accbf', '#76e7df'];
            if (percentage >= 75) {
                c = colors[0];
            }
            else if (percentage >= 50 && percentage < 75) {
                c = colors[1];
            }
            else if (percentage < 50) {
                c = colors[2];
            }

            //SQUARE
            var square = new ProgressBar.Square(child, {
                color: c,
                trailColor: "#ddd",
                strokeWidth: 2,
                trailWidth: 8,
                easing: 'easeInOut',
                duration: 1500,
                step: function (state, bar) {
                    bar.setText((bar.value() * 100).toFixed(0));
                }
            });
            square.animate(1, function () {
                square.animate((percentage / 100));
            });
            i++;
        });
    },
    sticky: function (sticky_navigation_offset_top) {
        var scroll_top = jQuery(window).scrollTop() - 80;
        var sticky_navigation_offset = sticky_navigation_offset_top;

        if (scroll_top > sticky_navigation_offset) {
            jQuery('#top-menu').css({
                '-webkit-transform': 'translate3d(0,-80px,0)',
                'transform': 'translate3d(0,-80px,0)'
            });
            setTimeout(function () {
                jQuery('#top-menu').addClass('fixed-menu');
                jQuery('#top-menu-main').addClass('fixed-menu-top');
            }, 100);
        }
        if (scroll_top < sticky_navigation_offset - 80) {
            jQuery('#top-menu').css({
                '-webkit-transform': 'translate3d(0,0,0)',
                'transform': 'translate3d(0,0,0)'
            });
            setTimeout(function () {
                jQuery('#top-menu').removeClass('fixed-menu');
                jQuery('#top-menu-main').removeClass('fixed-menu-top');
            }, 100);
        }
    },
    menu: function () {
        jQuery('.responsive-button').on('click', function (e) {
            e.preventDefault();

            jQuery('#responsive-menu .responsive-menu-wrapp ul').toggleClass('fadeMenu');
            jQuery('#wrapper,#teaser').toggleClass('content-slided');
            jQuery('#top-menu-main').toggleClass('top-menu-slided');
            jQuery('#responsive-menu').toggleClass('menu-slided');
        });
    },
    closePreloader: function () {
        jQuery('#preloader').css({
            'display': 'none'
        });
    },
    detectOrientation: function () {
        if (window.innerHeight > window.innerWidth) {
            return true;
        }
        else {
            return false;
        }
    },
    detectResolution: function () {
        var wv = jQuery(window).width();
        var w, z, x;
        if (wv > 1024) {
            x = 6;
            w = 0.45;
            z = 0.33;
        }
        else if ((wv > 768) && (wv <= 1024)) {
            x = 4;
            w = 0.40;
            z = 0.30;
        }
        else if (wv <= 768) {
            x = 2;
            w = 0.2;
            z = 0.15;
        }
        else if (wv <= 500) {
            x = 1;
            w = 0.01;
            z = 0.01;
        }
        var values = {w: w, z: z, x: x}
        return values;
    },
    displayGallery: function(){
      jQuery('.gallery').css('visibility','visible');  
    },
    initClients: function () {
        var va = this.detectResolution();
        if (va.x == 6) {
            this.clients(6);
        }
        else if (va.x == 4) {
            this.clients(4);
        }
        else if (va.x == 2) {
            this.clients(2);
        }
        else if (va.x == 1) {
            this.clients(1);
        }
    },
    fontsSize: function () {
        winh = jQuery(window).height();
        winw = jQuery(window).width();
        var s = 20;

        var va = this.detectResolution();

        if (this.detectOrientation()) {
            //PORTRAIT
            jQuery('.fs').each(function () {
                jQuery(this).css('font-size', winw / (s * va.w) + '%');
            });
            jQuery('.fsI').each(function () {
                jQuery(this).css('font-size', winw / (s * va.z) + '%');
            });
        }
        else {
            //LANDSCAPE
            jQuery('.fs').each(function () {
                jQuery(this).css('font-size', winw / (s * va.w) + '%');
            });
            jQuery('.fsI').each(function () {
                jQuery(this).css('font-size', winw / (s * va.z) + '%');
            });
        }
    },
    portfolioMenu: function () {
        jQuery('#filters .button').on("click", function () {
            jQuery('#filters .button').each(function () {
                jQuery(this).removeClass('active');
            });
            jQuery(this).addClass('active');
        });
    },
    videoPlay: function () {
        jQuery(".portfolio-video").hover(function () {
            jQuery(this).children("video")[0].play();
        }, function () {
            var el = jQuery(this).children("video")[0];
            el.pause();
            el.currentTime = 8;
        });
    },
    sliders: function () {
        var i = 0;
        setTimeout(function () {
            //var swp = jQuery(this);
            // jQuery('#' + swp.attr('id')).carouFredSel({
            jQuery('.swp').each(function () {
                var swp = jQuery(this).attr('id');
                i++;
                var mySwiper = new Swiper('#' + swp, {
                    pagination: '.pagination' + i,
                    mode: 'horizontal',
                    loop: true,
                    parallax:true,
                    effect:'cube',
                    lazyLoading:true,
                    grabCursor: true,
                    paginationClickable: true
                });
                jQuery('.arrow-left' + i).on('click', function (e) {
                    e.preventDefault()
                    mySwiper.swipePrev()
                })
                jQuery('.arrow-right' + i).on('click', function (e) {
                    e.preventDefault()
                    mySwiper.swipeNext()
                });
            });
        }, 100);
    },
    gallery: function () {
        setTimeout(function () {
            var mySwiper = new Swiper('.swiper-container', {
                mode: 'horizontal',
                slidesPerView: 5,
                autoplay:false,
                lazyLoading:true,
                loop: true,
                grabCursor: true,
                paginationClickable: true
            });
            jQuery('.arrow-left2').on('click', function (e) {
                e.preventDefault()
                mySwiper.swipePrev()
            })
            jQuery('.arrow-right2').on('click', function (e) {
                e.preventDefault()
                mySwiper.swipeNext()
            });
        }, 100);
    },
    sortDescend: function () {
        var jQuerywrapper = jQuery('.sort-desc-parent');

        jQuerywrapper.find('.sort-desc-child').sort(function (a, b) {
            return +a.getAttribute('data-percentage') - +b.getAttribute('data-percentage');
        }).appendTo( jQuerywrapper );
    },
    quotes: function () {
        var mySwiper = new Swiper('#clients-swp', {
                pagination: '.pagination2',
                mode: 'horizontal',
                effect:'fade',
                mode: 'horizontal',
                lazyLoading:true,
                loop: true,
                grabCursor: true,
                paginationClickable: true
        });
    },
    clients: function (ns) {
        var mySwiper = new Swiper('.swiper-container3', {
            mode: 'horizontal',
            slidesPerView: ns,
            autoplay:3000,
            lazyLoading:true,
            autoplayDisableOnInteraction: false,
            loop: true,
            grabCursor: true,
            paginationClickable: true
        });
    }
}

jQuery(window).load(function () {
    MOINEAU.sliders();
    MOINEAU.displayGallery();
    MOINEAU.quotes();
    //MOINEAU.gallery();
    MOINEAU.sortDescend();
    MOINEAU.setSkillsIcon();
    MOINEAU.closePreloader();
    MOINEAU.skills();
    MOINEAU.map();
    jQuery(window).scroll(function () {
        MOINEAU.sticky(sticky_navigation_offset_top);
    })
})