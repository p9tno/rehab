var app = {
    pageScroll: '',
    lgWidth: 1200,
    mdWidth: 992,
    smWidth: 768,
    resized: false,
    iOS: function () {
        return navigator.userAgent.match( /iPhone|iPad|iPod/i );
    },
    touchDevice: function () {
        return navigator.userAgent.match( /iPhone|iPad|iPod|Android|BlackBerry|Opera Mini|IEMobile/i );
    }
};

function isLgWidth() {
    return $( window ).width() >= app.lgWidth;
} // >= 1200
function isMdWidth() {
    return $( window ).width() >= app.mdWidth && $( window ).width() < app.lgWidth;
} //  >= 992 && < 1200
function isSmWidth() {
    return $( window ).width() >= app.smWidth && $( window ).width() < app.mdWidth;
} // >= 768 && < 992
function isXsWidth() {
    return $( window ).width() < app.smWidth;
} // < 768
function isIOS() {
    return app.iOS();
} // for iPhone iPad iPod
function isTouch() {
    return app.touchDevice();
} // for touch device

window.onload = function () {
    // console.log('onload');
    function preloader() {
        $(()=>{

            setTimeout( () => {
                let p = $('#preloader');
                p.addClass('hide');

                setTimeout( () => {
                    p.remove()
                }, 300);

            }, 300);
        });
    }
    preloader();
}

$(document).ready(function() {
    // console.log('ready');
    window.addEventListener('resize', () => {
        // Запрещаем выполнение скриптов при смене только высоты вьюпорта (фикс для скролла в IOS и Android >=v.5)
        if (app.resized == screen.width) { return; }
        app.resized = screen.width;
        // console.log('resize');
        // console.log(screen.width);
        checkOnResize();
    });

    function checkOnResize() {
        if (isLgWidth()) {
            // console.log('isLgWidth');
        } else {
            // console.log('isLgWidth else');
        }
    }

    function scrollPage () {
        $(".toTop").on("click","a", function (event) {
            event.preventDefault();
            let id  = $(this).attr('href');
            let top = $(id).offset().top;
            $('body,html').animate({scrollTop: top}, 1500);
        });

        $(window).scroll(function(){
            if($(window).scrollTop()>500){
                $('.toTop').fadeIn(900)
            }else{
                $('.toTop').fadeOut(700)
            }
        });
    }
    scrollPage();

    function showModal() {
        $('.show_modal_js').on('click', function (e) {
            e.preventDefault();
            let id  = $(this).attr('href');

            $(id).modal('show');
        });

        $('.modal').on('show.bs.modal', () => {
            // let openedModal = $('.modal.in:not(.popapCalc)');
            let openedModal = $('.modal');
            if (openedModal.length > 0) {
                openedModal.modal('hide');
            }
        });

        // $("#error").on('hide.bs.modal', function () {
        //     $(".error_content_js").html('');
        // });
        

        // $('.modal').on('hide.bs.modal', () => {});

    }
    showModal();

    function uploaVideoForModal() {
        if ( $( ".videoModal_js" ) ) {
            $( '.videoModal_js' ).on( 'click', function () {
                $('#modalVideo').modal('show');

                let src = $(this).attr('data-src');
                let poster = $(this).attr('data-poster');

                let video = $(`<video id="my-video" class="video-js" poster="${poster}" autoplay controls preload="auto"><source src="${src}" type="video/mp4" /></video>`)

                $(".modalVideo__wraper").append(video);

                $("#modalVideo").on('hide.bs.modal', function () {
                    $(".modalVideo__wraper").html('');
                });
            } );
        }
    };
    uploaVideoForModal();

    function openMobileNav() {
        $('.header__toggle').click(function(event) {
            $('.navbar').toggleClass('navbar_open');
            $('.header__toggle').toggleClass('header__toggle_open');
            $( 'body' ).toggleClass( 'nav-open' );
        });
    };
    openMobileNav();

    function collapsed() {
        let toggle = $('[data-collapse]');

        toggle.on('click', function() {
            let id = $(this).data('collapse'),
                body = $('[data-collapse-body="'+id+'"]'),
                wrap = body.closest('[data-collapse-wrapper]'),
                self = $(this);

            if (!id) {
                // Вариант без ID - используем ближайшие элементы
                body = self.parent().find('[data-collapse-body]');
                wrap = self.closest('[data-collapse-wrapper]');
                
                self.toggleClass('open');
                
                if (self.hasClass('open')) {
                    body.slideDown();
                    wrap.addClass('open');
                } else {
                    body.slideUp();
                    wrap.removeClass('open'); 
                }
            } else if (id === 'all') {
                // Вариант "все"
                $('[data-collapse-wrapper]').each(function() {
                    let $wrap = $(this);
                    let $body = $wrap.find('[data-collapse-body]');
                    
                    $body.slideDown();
                    $wrap.addClass('open');
                    $wrap.find('[data-collapse]').addClass('open');
                });
            } else {
                // Вариант с конкретным ID
                body.slideToggle();
                self.toggleClass('open');
                
                // Добавляем/убираем класс у wrapper в зависимости от состояния
                if (wrap.length) {
                    if (self.hasClass('open')) {
                        wrap.addClass('open');
                    } else {
                        wrap.removeClass('open');
                    }
                }
            }
        });
    }
    collapsed();

    function stikyMenu() {
        let firstSection = $('main section:first');
        let header = $('header');
        let currentTop = $(window).scrollTop();

        // Проверяем, есть ли секции в main
        if ($('main section').length === 0) {
            console.warn('Секции не найдены внутри main');
            return;
        }

        setNavbarPosition();

        $(window).scroll(function () {
            setNavbarPosition();
        });

        function setNavbarPosition() {
            currentTop = $(window).scrollTop();

            if (firstSection.length > 0) {
                let firstSectionBottom = firstSection.offset().top + firstSection.outerHeight();
                
                // Добавляем небольшой отступ для плавности (опционально)
                let threshold = firstSectionBottom - 10;
                
                if (currentTop > threshold) {
                    header.addClass('stiky');
                } else {
                    header.removeClass('stiky');
                }
            }
        }
    }
    stikyMenu();

    function initSwipers() {
        const hscroll = new Swiper('.hscroll_swiper_js', {
            slidesPerView: 3,
            spaceBetween: 20,
            speed: 40000,
            loop: true,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
                waitForTransition: false,
            },
            allowTouchMove: false,
            simulateTouch: false,
            watchSlidesProgress: true,
            updateOnWindowResize: true,
            observer: true,
            observeParents: true,

            breakpoints: {
                768: {
                    spaceBetween: 60,
                    slidesPerView: 5,
                },

            },
            
            on: {
                init: function() {
                    // console.log('Swiper initialized');
                    this.autoplay.start();
                },
                transitionStart: function() {
                    // console.log('Transition STARTED');
                },
                transitionEnd: function() {
                    // console.log('Transition ENDED - restarting autoplay');
                    // КРИТИЧЕСКИ ВАЖНО: принудительно перезапускаем
                    this.autoplay.stop();
                    this.autoplay.start();
                },
                // autoplayStop: function() {
                //     console.log('Autoplay STOPPED - restarting');
                //     setTimeout(() => {
                //         this.autoplay.start();
                //     }, 100);
                // }
            }
        });

        let speed = 3000;
        let delay = 5000;

        const testimonials = new Swiper('.testimonials_swiper_js', {
            slidesPerView: 1,
            spaceBetween: 16,
            speed: speed,
            loop: false,
            // autoplay: {
            //   delay: delay,
            // },

            navigation: {
                nextEl: '.icon_arrow_right',
                prevEl: '.icon_arrow_left',
            },
            pagination: {
                el: '.testimonials_pagination_js',
                clickable: true,
            },

            breakpoints: {
                768: {
                    spaceBetween: 30,
                    slidesPerView: 3,
                    allowTouchMove: false,
                },

            }
        });

        const logos = new Swiper('.logos_swiper_js', {
            slidesPerView: 2,
            spaceBetween: 9,
            speed: speed,
            // loop: true,
            // autoplay: {
            //   delay: delay,
            // },

            navigation: {
                nextEl: '.icon_arrow_right',
                prevEl: '.icon_arrow_left',
            },

            pagination: {
                el: '.logos_pagination_js',
                clickable: true,
            },

            breakpoints: {
                768: {
                    spaceBetween: 19,
                    slidesPerView: 6,
                },

            }
        });

        const blog = new Swiper('.blog_swiper_js', {
            slidesPerView: 1,
            spaceBetween: 23,
            speed: speed,
            // loop: true,
            // autoplay: {
            //   delay: delay,
            // },

            navigation: {
                nextEl: '.blog__nav .icon_arrow_right',
                prevEl: '.blog__nav .icon_arrow_left',
            },

            pagination: {
                el: '.logos_pagination_js',
                clickable: true,
            },

            breakpoints: {
                768: {
                    spaceBetween: 33,
                    slidesPerView: 4,
                },

            }
        });

        const media = new Swiper('.media_swiper_js', {
            slidesPerView: 1,
            spaceBetween: 20,
            speed: speed,
            loop: true,
            autoplay: {
                delay: delay,
            },

            navigation: {
                nextEl: '.icon_arrow_right',
                prevEl: '.icon_arrow_left',
            },
            pagination: {
                el: '.media_pagination_js',
                clickable: true,
            },

            breakpoints: {
                768: {
                    spaceBetween: 50,
                    slidesPerView: 2,
                },

            }
        });

        const team = new Swiper('.team_swiper_js', {
            slidesPerView: 1,
            spaceBetween: 20,
            speed: speed,
            loop: true,
            autoplay: {
                delay: delay,
            },

            navigation: {
                nextEl: '.icon_arrow_right',
                prevEl: '.icon_arrow_left',
            },
            pagination: {
                el: '.team_pagination_js',
                clickable: true,
            },

            breakpoints: {
                768: {
                    spaceBetween: 60,
                    slidesPerView: 4,
                },

            }
        });
    }
    initSwipers();

    function uploadYoutubeVideoForModal() {
        if ( $( ".youtubeModal_js" ) ) {

            $( '.youtubeModal_js' ).on( 'click', function () {
                $('#modalVideo').modal('show');

                let wrapp = $( this ).closest( '.youtubeModal_js' );
                let videoId = wrapp.attr( 'id' );
                let iframe_url = "https://www.youtube.com/embed/" + videoId + "?autoplay=1&autohide=1";

                // доп параметры для видоса
                // if ( $( this ).data( 'params' ) ) iframe_url += '&' + $( this ).data( 'params' );

                // Высота и ширина iframe должны быть такими же, как и у родительского блока
                let iframe = $( '<iframe/>', {
                    'frameborder': '0',
                    'src': iframe_url,
                    'allow': "autoplay"
                } )
                $(".modalVideo__wraper").append(iframe);

                $("#modalVideo").on('hide.bs.modal', function () {
                    $(".modalVideo__wraper").html('');
                });

            } );
        }
    };
    // uploadYoutubeVideoForModal();

    function initSmoothScrollToNextSection() {
        $('.scroll_next_section_js').on('click', function() {
            const $currentSection = $(this).closest('section');
            const $sections = $('main > section');
            const currentIndex = $sections.index($currentSection);
            
            let $nextSection;
            if (currentIndex === $sections.length - 1) {
                // Если это последняя секция - скроллим к первой
                $nextSection = $sections.first();
            } else {
                // Скроллим к следующей секции
                $nextSection = $currentSection.next();
            }
            
            $('html, body').animate({
                scrollTop: $nextSection.offset().top
            }, 1500);
        });
    }
    initSmoothScrollToNextSection();

    function mouseMoveParallax() {
        let wrapper = $('.parallax-wrap-js');
        let item = $('.parallax-el-js');
        
        let targetX = 0;
        let targetY = 0;
        let targetScale = 0; // 0 - scale выключен, 1 - scale включен
        let currentX = 0;
        let currentY = 0;
        let currentScale = 0;
        let smoothing = 0.05;
        let animationId = null;

        if (isXsWidth()) return false;

        function applyTransforms() {
            item.each(function(index, el) {
                let $el = $(el);
                let speed = $el.data('speed');
                let scaleValue = $el.data('scale'); 
                
                let transforms = [];
                
                // Добавляем параллакс-движение
                transforms.push('translate3d(' + (currentX * speed / 1000) + 'em, ' + (currentY * speed / 1000) + 'em, 0)');
                
                // Добавляем scale с анимацией (только если задан data-scale)
                if (scaleValue !== undefined && scaleValue !== null && currentScale > 0) {
                    // Интерполируем scale от 1 до scaleValue
                    let animatedScale = 1 + (scaleValue - 1) * currentScale;
                    transforms.push('scale(' + animatedScale + ')');
                }
                
                $el.css('transform', transforms.join(' '));
            });
        }

        function animate() {
            // Плавное приближение ко всем целевым значениям
            currentX += (targetX - currentX) * smoothing;
            currentY += (targetY - currentY) * smoothing;
            currentScale += (targetScale - currentScale) * smoothing;
            
            applyTransforms();
            
            // Продолжаем анимацию пока не достигнем всех целей
            if (Math.abs(targetX - currentX) > 0.1 || 
                Math.abs(targetY - currentY) > 0.1 || 
                Math.abs(targetScale - currentScale) > 0.01) {
                animationId = requestAnimationFrame(animate);
            } else {
                animationId = null;
            }
        }

        function startAnimation() {
            if (!animationId) {
                animationId = requestAnimationFrame(animate);
            }
        }

        // Обработчик движения мыши
        wrapper.on('mousemove', function(event) {
            let centerX = $(window).width() / 2;
            let centerY = $(window).height() / 2;
            
            // Обновляем целевые координаты
            targetX = -(event.clientX - centerX);
            targetY = -(event.clientY - centerY);
            // Включаем scale
            targetScale = 1;
            
            startAnimation();
        });

        // Обработчик выхода мыши из области
        wrapper.on('mouseleave', function(event) {
            // Плавный возврат к нулевой позиции и выключение scale
            targetX = 0;
            targetY = 0;
            targetScale = 0;
            
            startAnimation();
        });

        // Инициализация - начинаем с выключенного scale
        applyTransforms();
    }
    mouseMoveParallax();


    function initAOS() {
        // Добавляем анимацию к заголовкам
        // document.querySelectorAll('.section__title').forEach(title => {
        //     title.setAttribute('data-aos', 'fade-up');
        //     // Можно добавить дополнительные атрибуты для тонкой настройки
        //     title.setAttribute('data-aos-duration', '1200');
        //     title.setAttribute('data-aos-delay', '200');
        //     title.setAttribute('data-aos-easing', 'ease-out-cubic');
        // });

        // Настройки для разных типов элементов
        const animations = {
            '.section__title': {
                animation: 'fade-up',
                // duration: 1200,
                // delay: 200,
                // offset: 40
            },
            // '.section__subtitle': {
            //     animation: 'fade-up',
            //     duration: 1000,
            //     delay: 300
            // },
            // '.card': {
            //     animation: 'fade-in',
            //     duration: 800,
            //     delay: 100
            // }
        };
        
        // Применяем анимации ко всем элементам
        Object.entries(animations).forEach(([selector, config]) => {
            document.querySelectorAll(selector).forEach(element => {
                if (config.animation) {
                    element.setAttribute('data-aos', config.animation);
                }
                if (config.duration) {
                    element.setAttribute('data-aos-duration', config.duration);
                }
                if (config.delay) {
                    element.setAttribute('data-aos-delay', config.delay);
                }
                if (config.offset) {
                    element.setAttribute('data-aos-offset', config.offset);
                }
            });
        });
        
        // Единая инициализация AOS
        AOS.init({
            disable: function() {
                return window.innerWidth < 768;
            },
            offset: 40,
            delay: 0,
            duration: 1200,
            easing: 'ease-out-cubic',
            once: true,
            mirror: false,
            throttleDelay: 99,
            debounceDelay: 50,
            anchorPlacement: 'top-bottom'
        });
    }
    initAOS();

    function share() {
        Share = {
            vkontakte: function(purl, ptitle, pimg, text) {
                url  = 'https://vk.com/share.php?';
                url += 'url='          + encodeURIComponent(purl);
                url += '&title='       + encodeURIComponent(ptitle);
                url += '&description=' + encodeURIComponent(text);
                url += '&image='       + encodeURIComponent(pimg);
                url += '&noparse=true';
                Share.popup(url);
            },
            odnoklassniki: function(purl, text) {
                url  = 'https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&st.shareUrl=';
                url += encodeURIComponent(purl);
                Share.popup(url);
            },
            facebook: function(purl, ptitle, pimg, text) {
                url  = 'https://www.facebook.com/sharer/sharer.php?';
                url += 'u=' + encodeURIComponent(purl);
                url += '&title=' + encodeURIComponent(ptitle);
                url += '&description=' + encodeURIComponent(text);
                url += '&picture=' + encodeURIComponent(pimg);
                Share.popup(url);
            },
            twitter: function(purl, ptitle) {
                url  = 'https://twitter.com/intent/tweet?';
                url += 'text='      + encodeURIComponent(ptitle);
                url += '&url='      + encodeURIComponent(purl);
                Share.popup(url);
            },
            mailru: function(purl, ptitle, pimg, text) {
                url  = 'https://connect.mail.ru/share?';
                url += 'url='          + encodeURIComponent(purl);
                url += '&title='       + encodeURIComponent(ptitle);
                url += '&description=' + encodeURIComponent(text);
                url += '&imageurl='    + encodeURIComponent(pimg);
                Share.popup(url);
            },
            linkedin: function(purl, ptitle, text) {
                url  = 'https://www.linkedin.com/sharing/share-offsite/?';
                url += 'url=' + encodeURIComponent(purl);
                url += '&title=' + encodeURIComponent(ptitle);
                url += '&summary=' + encodeURIComponent(text);
                Share.popup(url);
            },
            email: function(purl, ptitle, text) {
                // Для email используем mailto: вместо всплывающего окна
                subject = encodeURIComponent(ptitle);
                body = encodeURIComponent(text + '\n\n' + purl);
                window.location.href = 'mailto:?subject=' + subject + '&body=' + body;
            },
            popup: function(url) {
                window.open(url,'','toolbar=0,status=0,width=626,height=436');
            }
        };
    }
    share();

    function doTabs () {        
        $('.tabs__wrapper').each(function() {
            let ths = $(this);
            ths.find('.tab__item').not(':first').hide();
            ths.find('.tab').click(function() {
                ths.find('.tab').removeClass('active').eq($(this).index()).addClass('active');
                ths.find('.tab__item').hide().eq($(this).index()).fadeIn()
            }).eq(0).addClass('active');
        });
    }
    doTabs();

    function hideWpSuccess(selector = '.hide_wp_success_js') {
        $('form.wpforms-form').on('wpformsAjaxSubmitSuccess', (event) => {
            $(selector).addClass('d-none');
        });
    }
    hideWpSuccess();

    
})
