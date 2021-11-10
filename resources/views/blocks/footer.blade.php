<footer class="page-footer">
    <p class="section1_hr"></p>
    <div class="page-footer__center wrapper">
        <!-- Social Menu-->
        <div class="left_footer">
            <div class="left_footer__logo"><a class="logo" href="/" title="Logo"><img src="{{asset('/img/logo.svg')}}" alt="logo"></a></div>
            <div class="left_footersocial">
                <a href="{{$socials[4]['link']}}" title="{{$socials[4]['title']}}">
                    <div class="left_footer_socialitem socitem1"></div></a>
                <a class="social" href="{{$socials[5]['link']}}" title="{{$socials[5]['title']}}">
                    <div class="left_footer_socialitem socitem2"></div></a>
                <a class="social" href="{{$socials[2]['link']}}" title="{{$socials[2]['title']}}">
                    <div class="left_footer_socialitem socitem3"></div></a>
            </div>
            <div class="left_footer__carts">
                <div class="left_footer_socialitem cartitem1"></div>
                <div class="left_footer_socialitem cartitem2"></div>
                <div class="left_footer_socialitem cartitem3"></div>
                <div class="left_footer_socialitem cartitem4"></div>
                <div class="left_footer_socialitem cartitem5"></div>
            </div>
        </div>
        <!-- END Social Menu-->
        <!-- Footer Menu-->
        <div class="right_footer">
            <div class="right_footer__touch"><a href="{{$socials[3]['link']}}" title="Logo">Get in touch<br/>with us</a></div>
            <a href="{{$socials[3]['link']}}" class="right_footer__tel"><span></span>+372 56 889 223</a>
        </div>
        <!-- END Footer Menu-->
    </div>
    <p class="page-footer__copyright"><a class="page-footer__company-name" href="/">Envy me <span>&copy; 2020 - Privacy Policy</span></a></p>
</footer>



	<button class="busket" onclick="openBusket()" style="display: none">
		Корзина
	</button>
	<button class="modal_btn" onclick="openModal()" style="display: none">
		Modalka
	</button>
    <button class="modal_btn" onclick="openModal2()" style="display: none">
        Modalka2
    </button>

	<div style="display: none;">
	    <div class="box-modal" id="busket">
	        <div class="box-modal_close arcticmodal-close">
	        </div>
	        <div class="content_busket">
	        	<div>
	        	<h3 class="title_busket">
	        		Order
	        	</h3>
	        	<div class="title_table">
	        		<div class="tt_col">
	        			<div class="tt_name_first">
	        				Tickets
	        			</div>
	        		</div>
	        		<div class="tt_col">
	        			<div class="tt_name_second">
	        			 	Price
	        			</div>
	        		</div>
	        	</div>
	        	<div class="wrap_list_tovar">
	        		<div class="list_tovars">
		        	</div>
	        	</div>

	        	<div class="busket_bottom">
	        		<div class="bb_col">
	        			<div class="wrap_block_promo">
	        				<label class="title_promo">
	        					Add promo
	        				</label>
	        				<div class="wrap_title_promo">
	        					<input type="text" class="inp_promo">
	        				</div>
	        			</div>
	        		</div>
	        		<div class="bb_col">
	        			<div class="bb_block_sum">
	        				<div class="bb_sum">
	        					<span>
	        						Total:
	        					</span>
	        					<span>
	        						0 tickets - 0.00 E
	        					</span>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="wrap_payment">
	        		<div class="title_payment">
	        			Payment type
	        		</div>
	        		<div class="list_payment">
	        			<div>
		        			<input type="radio" id="ck1" name="payment" value="paypal">
		        			<label for="ck1" class="lp_lable">
		        				<img src="{{asset('img/paypal.png')}}" alt="">
		        			</label>
		        		</div>
	        			<div>
		        			<input type="radio" id="ck2" name="payment" value="mastercard">
		        			<label for="ck2" class="lp_lable">
		        				<img src="{{asset('img/mastercart.png')}}" alt="">
		        			</label>
	        			</div>
	        			<div>
		        			<input type="radio" id="ck3" name="payment" value="visa">
		        			<label for="ck3" class="lp_lable">
		        				<img src="{{asset('img/visa.png')}}" alt="">
		        			</label>
		        		</div>
		        		<div>
		        			<input type="radio" id="ck4" name="payment" value="GPay">
		        			<label for="ck4" class="lp_lable">
		        				<img src="{{asset('img/GPay.png')}}" alt="">
		        			</label>
		        		</div>
	        		</div>
	        	</div>
	        	<button class="btn_checkout">
	        		Сheckout
	        	</button>
			</div>
	        </div>

	    </div>
	</div>
	<div style="display: none;">
	    <div class="box-modal2" id="modal">
	        <div class="box-modal_close arcticmodal-close">
	        </div>
	        <div class="content_modal">
	        	<div class="wrap_mod_title">
	        		<h3>

	        		</h3>
					<div class="review_stars">
					    <input id="star-4" type="radio" name="stars"/>
					    <label title="Отлично" for="star-4">
					    </label>
					    <input id="star-3" type="radio" name="stars"/>
					    <label title="Хорошо" for="star-3">
					    </label>
					    <input id="star-2" type="radio" name="stars" />
					    <label title="Нормально" for="star-2">
					    </label>
					    <input id="star-1" type="radio" name="stars"/>
					    <label title="Плохо" for="star-1">
					    </label>
					    <input id="star-0" type="radio" name="stars"/>
					    <label title="Ужасно" for="star-0">
					    </label>
					</div>
					<div class="review_stars d-none">
					    <div class="rs_star"></div>
					    <div class="rs_star"></div>
					    <div class="rs_star"></div>
					    <div class="rs_star active"></div>
					    <div class="rs_star active"></div>
					</div>
	        	</div>
	        	<div class="top_panel">
	        		<div class="modal_time">

	        		</div>
	        		<div class="wrap_modal_location">
	        			<div class="modal_adress">
	        				Here will be adress of the club
	        			</div>
	        			<a class="modal_link_map">
	        				Show on club
	        			</a>
	        		</div>
	        	</div>
	        	<div class="wrap_modal_slider">
	        		<div class="modal_slider">

	        		</div>
	        	</div>
	        	<div class="modal_text">
	        		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non accumsan neque. Sed tempus turpis dapibus nibh sollicitudin, id maximus magna consectetur. Fusce porttitor orci eget mauris mattis, in gravida nisi molestie. Nam commodo et velit id porta. Morbi vitae luctus dolor. Nulla viverra libero tempor velit efficitur pellentesque. Proin eros orci, vehicula non quam nec, laoreet dictum ligula. Aliquam ut laoreet lacus. Fusce metus urna, fermentum vel placerat et, vehicula sit amet mi. Vestibulum pretium rutrum est, non interdum turpis sagittis ut. Fusce cursus interdum ex nec malesuada.
	        	</div>
	        	<div class="modal_bottom_panel">
	        		<div class="mbp_left">
	        			<div class="mbp_icon">
	        				Champagne room
	        			</div>
	        			<div class="mbp_icon">
	        				Sauna
	        			</div>
	        		</div>
	        		<div class="mbp_right">
	        			<div class="mbp_price">
	        				Ticket price <span>99€</span>
	        			</div>
	        			<div class="quantity modal">
        				  <div class="quantity-button quantity-down">-</div>
						  <input type="number" min="1" max="99" step="1" value="1" class="amount_tickets">
						  <div class="quantity-button quantity-up">+</div>
						</div>
	        			<a href="#" class="mbp_buy">
	        				Buy ticket
	        			</a>
	        		</div>
	        	</div>
	        </div>
	    </div>
	</div>
  <div style="display: none;">
    <div class="box-modal3" id="exampleModal3">
        <div class="box-modal_close arcticmodal-close">
        </div>
        <form action="{{route('ajax_contact_send')}}" method="post" class="form_modal2" id="form_modal2">
            {{ csrf_field() }}
            <h3 class="fm2_title1" >
                Booking request
            </h3>
            <div id="sendmessage">
                Ваше сообщение отправлено!
            </div>
            <div class="fm2_content">
                <div class="fm2_wrap_input">
                    <input type="text" id="form-offer-name" class="zalupa" placeholder="Name" name="name" required="">
                </div>
                <div class="fm2_wrap_input">
                    <input type="text" placeholder="Surname" name="surname" required="">
                </div>
                <div class="fm2_wrap_input">
                    <input type="tel" placeholder="Phone number" name="phone_number" class="phone" required="">
                </div>
                <div class="fm2_wrap_input">
                    <input type="email" placeholder="E-mail" name="email" required="">
                </div>
                <div class="fm2_wrap_input">
                    <input type="text" placeholder="Nuber or club’s card" class="cart_inp" name="card">
                </div>
                <div class="fm2_wrap_input">
                    <textarea placeholder="Type your comment  here ..." name="comment"></textarea>
                </div>
                <input  id="form-activity-id" name="event_id" type="hidden" value="">
                <input  id="form-activity-city" name="city" type="hidden" value="">
                <input  id="form-activity-date" name="date" type="hidden" value="">
                <input  id="form-activity-person" name="person" type="hidden" value="">

            </div>
            <h3 class="fm2_title2">
                Package details: Title of package
            </h3>
            <div class="fm2_wrap_details">
                <div class="details_item details_item_city">
                    City: Tallinn, Riga
                </div>
                <div class="details_item details_item_date">
                    Date: 30/01/2021
                </div>
                <div class="details_item details_item_person">
                    Number of persons: 6
                </div>
            </div>

            <button class="btn_confirm" type="submit">
                Confirm
            </button>
        </form>
    </div>
</div>

<div style="display: none;">
    <div class="box-modal3" id="exampleModal4">
        <div class="box-modal_close arcticmodal-close">
        </div>
				<!-- тут регистрация -->
		</div>
</div>

<div style="display: none;">
    <div class="box-modal3" id="exampleModal5">
        <div class="box-modal_close arcticmodal-close">
        </div>
				<!-- тут авторизация -->
        <div class="wrap_form_reg">
            <div class="fr_title">
                <span>{{ __('auth.sign_in')}}</span>

            </div>
            <form action="{{route('login')}}" method="POST" class="form_reg in">
                @csrf
                <div class="fr_inputs">
                    <div class="fr_wrap_inp">
                        <input type="text" name="nickname" placeholder="{{ __('auth.name')}}" required>
                    </div>
                    <div class="fr_wrap_inp">
                        <input type="password" name="password" placeholder="{{ __('auth.password')}}" required>
                    </div>
                </div>
                <button class="btn_akk">
                    {{ __('auth.sign_in')}}
                </button>
                <p class="fr_text">
                    {{ __('auth.an_account')}}
                    <a href="{{route('register')}}">{{ __('auth.register')}}</a>
                </p>
								<a href="{{route('forget.password.get')}}" class="f_pas">Forgot password?</a>
            </form>
        </div>
		</div>
</div>

<!-- END Footer-->
<!-- Scripts-->
<script src="{{asset('/jivosite/jivosite.js')}}"></script>
<script src="{{asset('/assets/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('/js/jquery-3.3.1.min.js')}}"></script>
<script  src="{{asset('/js/min/script.all.js')}}"></script>
<script  src="{{asset('/js/jquery.arcticmodal-0.3.min.js')}}"></script>
<script src="{{asset('/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('/js/slick.min.js')}}"></script>
<script src="http://code-eu1.jivosite.com/widget/We8DGFnpg1" async></script>

<script>
    let el = document.querySelector(".lang_link.active");
    el.parentNode.removeChild(el);
    document.querySelector('.nav_lang').appendChild(el);
</script>


<script >
    $(function () {
        // $(".phone").mask("+38(99)-999-99-99");
        $(".cart_inp").mask("99999999999999");

        // $('#exampleModal2').arcticmodal();
        $('.quantity').each(function() {
            var spinner = $(this),
                input = spinner.find('input[type="number"]'),
                btnUp = spinner.find('.quantity-up'),
                btnDown = spinner.find('.quantity-down'),
                min = input.attr('min'),
                max = input.attr('max');

            btnUp.click(function() {
                var oldValue = parseFloat(input.val());
                if (oldValue >= max) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue + 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });

            btnDown.click(function() {
                var oldValue = parseFloat(input.val());
                if (oldValue <= min) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue - 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });

        });


    });

</script>
<script>

function openModal2() {
        $('#exampleModal3').arcticmodal();
    }

//     function openModal2() {
//         $('#exampleModal3').arcticmodal();
//     }

	let slider_active = true;

	function openModal(response) {
		fillInModalWithClub(response);
		if(slider_active) {
			$('.modal_slider').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				arrows: true,
				fade: false,
				nextArrow: '<div class="nextArrow"></div>',
				prevArrow: '<div class="prevArrow"></div>',
					responsive: [
						{
						breakpoint: 1000,
						settings: {
							slidesToShow: 2,
						}
						},
						{
						breakpoint: 700,
						settings: {
							slidesToShow: 1,
							centerMode: false,
						}
						}
					]
				});
			slider_active = false;
		}

	}
    function openBusket() {
        // setTimeout(, 2000);
        $('#busket').arcticmodal()
    }

</script>
<script src="{{asset('/js/app1.js')}}"></script>
<script src="{{asset('/js/order.js')}}"></script>
<script>
      $(function () {
        $('.slider_review').slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          arrows: true,
          fade: false,
          nextArrow: '<div class="nextArrow swiper-button-next"></div>',
          prevArrow: '<div class="prevArrow swiper-button-prev"></div>',
           responsive: [
           	   {
                 breakpoint: 1200,
                 settings: {
                   slidesToShow: 3,
                 }
               },
               {
                 breakpoint: 1000,
                 settings: {
                   slidesToShow: 2,
                 }
               },
               {
                 breakpoint: 700,
                 settings: {
                   slidesToShow: 1,
                   centerMode: false,
                 }
               }
           ]
        });
      });
    </script>
<!-- END Scripts-->
<!-- </div> -->
		</body>
</html>


