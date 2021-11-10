jQuery(function($) {


    // ============ ADD TO FAVOURITE BUTTON ============
    $('.add_to_fav').on('click', function() {
        $(this).toggleClass('active');
        $(this).find('i').toggleClass('fa-heart-o')
        $(this).find('i').toggleClass('fa-heart')
    })

    // ============ ADD TO FAVOURITE BUTTON ============


    // ============ HEADER CATALOG TRIGGER ============
    $('.header_catalog').on('click', function(){
        $(this).toggleClass('active');
        $('.header_catalog_content').toggleClass('active');
    })
    // ============ HEADER CATALOG TRIGGER ============


    if($(window).width() < 1200) {
        $('.custom_container').addClass('container');
        $('.custom_container').removeClass('custom_container');
    }


    // ============ INSTAGRAM FEED ============


    $(window).on("load", function () {
        $.instagramFeed({
            username: "the_snigga", //Имя пользователя
            container: "#inst_main_photo", //Контейнер для изображений
            display_profile: false, //Отображение профиля
            display_biography: false, //Отображение биографии
            display_gallery: true, //Отображение галереи
            styling: true, //Стандартные стили библиотеки
            items: 1, //Количество изображений в галереи
            items_per_row: 1, //Количество изображений в ряд
            margin: 0, //Отступ между изображениями
        });

        let photo_count = 7;
        if($(window).width() < 1200) {
            photo_count = 6;

        }
        $.instagramFeed({
            username: "the_snigga", //Имя пользователя
            container: "#inst_main_collection", //Контейнер для изображений
            display_profile: false, //Отображение профиля
            display_biography: false, //Отображение биографии
            display_gallery: true, //Отображение галереи
            styling: true, //Стандартные стили библиотеки
            items: photo_count, //Количество изображений в галереи
            items_per_row: 3, //Количество изображений в ряд
            margin: 0, //Отступ между изображениями
        });
    });

    // ============ INSTAGRAM FEED ============


        // =================== MOBILE MENU ========================
        $('.button_menu').click(function(){
            $(this).toggleClass('active'); 
            $('.menu_responsive').toggleClass('active');
          });
    
          $(document).mouseup(function (e) {
            if($('.menu_responsive').hasClass('active')){
                var container = $(".menu_responsive");
                if ((container.has(e.target).length === 0)){
                    $('.button_menu').click();
                }
                if ($(e.target).parent().hasClass('button_menu')){
                    $('.button_menu').click();
                }
                if ($(e.target).hasClass('button_menu')){
                    $('.button_menu').click();
                }
    
            };
        });
        $('.nav').on('click', function() {
            if($('.menu_responsive').hasClass('active')) {
                $('.button_menu').click();
            }
        });
        
        // =================== MOBILE MENU ========================
        


        $('.mobile_catalog_trigger').on('click', function() {
            $('#mobile_collapse_catalog').toggle();
            $(this).toggleClass('active');
            if ($(this).hasClass('active')) {
                console.log( $('.menu_responsive .main_menu').css('justify-content'))
                $('.menu_responsive .main_menu').css('justify-content', 'space-between');
            } else {
                $('.menu_responsive .main_menu').css('justify-content', 'center');
            }
        })

})