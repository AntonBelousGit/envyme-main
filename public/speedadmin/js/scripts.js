
// function countup(){ //className - имя класса, в котором есть число
//         var countBlockTop = $('.count').offset().top; //смещение блока с числом относительно верхнего края    
//         var windowHeight = window.innerHeight;//высота окна браузера
//     var show = true;// отвечает, что если один раз счетчик сработает, больше не срабатывал
    
//     if(show && (countBlockTop < $(window).scrollTop() + windowHeight)){ 
//         show = false; //если мы видим число, то больше его не надо показывать
                    
//         $('.count').spincrement({ //вызов плагина с параметрами 
//             from: 1,               //начинать с 1
//             duration: 4000,
//             thousandSeparator: "",        //задержка счетчика
//         });
//     }

//     $(window).scroll( function (){
//         if(show && (countBlockTop < $(window).scrollTop() + windowHeight)){ 
//             show = false; //если мы видим число, то больше его не надо показывать
                        
//             $('.count').spincrement({ //вызов плагина с параметрами 
//                 from: 1,               //начинать с 1
//                 duration: 4000,
//                 thousandSeparator: "",        //задержка счетчика
//             });
//         }
//     })    
// }


// function isVisible () {
//     $(".list-services__item, .content-forYou__cart, .advantages-cart").each(function(){
//           var imagePos = $(this).offset().top;

//           var topOfWindow = $(window).scrollTop();
//           if(imagePos < topOfWindow + 600) {
//               $(this).removeClass("visibility");
//               $(this).addClass("flipInY");
//           }
//       })

//       $(".list-cargoTrust__item").each(function(){
//           var imagePos = $(this).offset().top;

//           var topOfWindow = $(window).scrollTop();
//           if(imagePos < topOfWindow + 600) {
//               $(this).removeClass("visibility");
//               $(this).addClass("bounceInLeft");
//           }
//       });  

//       $(".company-content, .partners-content").each(function(){
//           var imagePos = $(this).offset().top;

//           var topOfWindow = $(window).scrollTop();
//           if(imagePos < topOfWindow + 600) {
//               $(this).removeClass("visibility");
//               $(this).addClass("zoomIn");
//           }
//       }); 
// }


function titleOpen(elem) {

    var tab = $(elem);

    $(tab).siblings(".tab-title").removeClass("open");

    $(tab).addClass("open");

}


$(function () {

    // countup();

    // isVisible ();

    $(window).scroll(function () {
        var b = $(".list-cargoTrust__item");
        if (!b.prop("shown") && isVisible(b)) {
            $(b).removeClass("visibility");
            $(b).addClass("flipInX");
        }
    });
    

    $('.head-connection__burger').click(function(){
        function time() {
            if( $('.visuallyHidden').prop("checked")) {
                $('.list-burger').slideDown(300);
            } else {
                $('.list-burger').slideUp(300);
            }
        }
        setTimeout(time, 100)
    });
    
    $('.btn-click').click(function(){
    	$('#exampleModal').arcticmodal();
    });
    $('.btn-click2').click(function(){
        $('#exampleModal2').arcticmodal();
    });
    $('.btn-click3').click(function(){
        $('#exampleModal3').arcticmodal();
    });

	$('#menu-burger').click(function() {
		if($('#section-menu-mob').hasClass('section-menu-mob_close')){
			$("#section-menu-mob").slideDown(300);
			$('#section-menu-mob').removeClass('section-menu-mob_close');
		}
		else {
			$("#section-menu-mob").slideUp(300);
			$('#section-menu-mob').addClass('section-menu-mob_close');
		}
	});


	$("#video-arr").click(function () {
		elementClick = $(this).attr("href");
		destination = $(elementClick).offset().top;
		$("body,html").animate({scrollTop: destination }, 800);
	});	
	  
     $('[data-fancybox="modal"]').fancybox({
        // Options will go here
        // arrows: false,
        // afterLoad: function(instance, current) {
        //     if (instance.group.length > 1 && current.$content) {
        //         current.$content.append('<button class="fancybox-button fancybox-button--arrow_right next" data-fancybox-next><i class="fa fa-angle-right" aria-hidden="true"></i></button><button data-fancybox-prev class="fancybox-button fancybox-button--arrow_left prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>');
        //     }
        // }
    });

    // $('[data-fancybox="price"]').fancybox({
    //     // Options will go here
    // });


    $(window).scroll(function(event){
          isVisible ();
    });

	  
	$('[data-submit]').on('click', function(e) {
        e.preventDefault();
        $(this).parent('form').submit();
    })
    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Please check your input."
    );



    // Функция валидации и вывода сообщений
    function valEl(el) {

        el.validate({
            rules: {
                tel: {
                    required: true,
                    regex: '^([\+]+)*[0-9\x20\x28\x29\-]{5,20}$'
                },
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                tel: {
                    required: 'Поле обязательно для заполнения',
                    regex: 'Телефон может содержать символы + - ()'
                },
                name: {
                    required: 'Поле обязательно для заполнения',
                },
                email: {
                    required: 'Поле обязательно для заполнения',
                    email: 'Неверный формат E-mail'
                }
            },

            // Начинаем проверку id="" формы
            submitHandler: function(form) {
                $('#loader').fadeIn();
                var $form = $(form);
                var $formId = $(form).attr('id');
                switch ($formId) {
                    case 'popupResult':
                        $.arcticmodal('close');
                        // if (!grecaptcha.getResponse()) {
                        //      alert('Вы не заполнили поле Я не робот!');
                        //      setTimeout(function() {
                        //             $('#loader').fadeOut();
                        //         }, 800);
                        //      return false; // возвращаем false и предотвращаем отправку формы
                        // }
                        $.ajax({
                                type: 'POST',
                                url: $form.attr('action'),
                                data: $form.serialize(),
                            })
                            .always(function(response) {
                                setTimeout(function() {
                                    $('#loader').fadeOut();
                                }, 800);
                                setTimeout(function() {
                                    $('#overlay').fadeIn();
                                    $form.trigger('reset');
                                    //строки для остлеживания целей в Я.Метрике и Google Analytics
                                }, 1100);
                                $('#overlay').on('click', function(e) {
                                    $(this).fadeOut();
                                });

                            });
                        break;
                    case 'popupResult2':
                        
                        // if (!grecaptcha.getResponse()) {
                        //      alert('Вы не заполнили поле Я не робот!');
                        //      setTimeout(function() {
                        //             $('#loader').fadeOut();
                        //         }, 800);
                        //      return false; // возвращаем false и предотвращаем отправку формы
                        // }
                        $.ajax({
                                type: 'POST',
                                url: $form.attr('action'),
                                data: $form.serialize(),
                            })
                            .always(function(response) {
                                setTimeout(function() {
                                    $('#loader').fadeOut();
                                }, 800);
                                setTimeout(function() {
                                    $('#overlay').fadeIn();
                                    $form.trigger('reset');
                                    //строки для остлеживания целей в Я.Метрике и Google Analytics
                                }, 1100);
                                $('#overlay').on('click', function(e) {
                                    $(this).fadeOut();
                                });

                            });
                        break;
                }
                return false;
            }
        })
        
    }

    // Запускаем механизм валидации форм, если у них есть класс .js-form
    $('.js-form').each(function() {
        valEl($(this));
    });

    
});

function openTab(elem) {
    
    var tab = $(elem);
    if($(tab).hasClass('open')){
        $(tab).removeClass('open');
        
        $(tab).siblings('.menu-mob__list').slideUp(300);
    } else {
        $(tab).addClass('open');
        $(tab).siblings('.menu-mob__list').slideDown(300);
    }
}






