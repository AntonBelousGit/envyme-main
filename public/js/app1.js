    window.addEventListener('load', function(){
        console.log('load');
        let str_html = null;
        let locale = ['', 'en', 'fi', 'et'].includes(location.pathname.split('/')[1]) ? location.pathname.split('/')[1] : '';
        locale = locale === '' ? locale + '/' : `${locale}/`;

        localStorage.setItem('current_page', 2);
        const clubs = $(".section1_grid");
        const packages = $(".news-block");

        if(['/','/en/','/ru','/ru/', '/fi/', '/et/','/en','/fi','/et'].includes(location.pathname)){


            $("ul.pagination").parent().hide();

            document.querySelector(".see_more").addEventListener('click', function(e) {
                e.preventDefault();
                let count = +localStorage.getItem('current_page');
                const city = document.querySelector('.section1_search select').value !== 'none' ? document.querySelector('.section1_search select').value : '';
                url = $("ul.pagination").find("a[rel='next']").attr("href").slice(0,-1) + count + `&city=${city}`;

                $.get(url, function(response) {
                    localStorage.setItem('current_page', ++count);
                    clubs.append(
                        $(response).find(".section1_grid").html()
                    );
                    $("ul.pagination").parent().hide();
                    resetModalButtons();
                    initModalButtons();
                });
            });


            document.querySelector('.section1_search select').addEventListener('change', function(){
                $.get(locale + '?city=' + this.value, function(response){
                    localStorage.setItem('current_page', 2);
                    // console.log(response);
                    clubs.html($(response).find(".section1_grid").html());
                    $("ul.pagination").parent().hide();
                    resetModalButtons();
                    initModalButtons();
                });
            });
            document.querySelector('.section1_search__text').addEventListener('click', function(e){
                e.preventDefault();

                var sdf = $(".form_search input").val();
                // console.log(sdf);

                $.get(locale + '?title=' + sdf, function(response){

                    localStorage.setItem('current_page', 2);
                    clubs.html($(response).find(".section1_grid").html());
                    $("ul.pagination").parent().hide();

                    resetModalButtons();
                    initModalButtons();
                });
            });
        }



        if(['/packages'].includes(location.pathname)){
            document.querySelector('.filter1 select').addEventListener('change', function(){
                $.get(location.pathname + '?city=' + this.value, function(response){
                    localStorage.setItem('current_page', 2);
                    packages.html($(response).find(".news-block").html());
                    $("ul.pagination").parent().hide();
                    resetModalButtons();
                    initModalButtons();
                });
            });

            document.querySelector('.section1_search__text').addEventListener('click', function(e){
                e.preventDefault();
                var sdf = $(".form_search input").val();
                $.get(location.pathname + '?title=' + sdf, function(response){
                    localStorage.setItem('current_page', 2);
                    packages.html($(response).find(".news-block").html());
                    $("ul.pagination").parent().hide();
                    resetModalButtons();
                    initModalButtons();
                });
            });
            document.querySelector('.category_search select').addEventListener('change', function(){
                $.get(location.pathname + '?gender=' + this.value, function(response){

                    localStorage.setItem('current_page', 2);
                    packages.html($(response).find(".news-block").html());
                    $("ul.pagination").parent().hide();
                    resetModalButtons();
                    initModalButtons();
                });
            });
        }
        if(['/activities'].includes(location.pathname)){
            document.querySelector('.filter1 select').addEventListener('change', function(){
                $.get(location.pathname + '?city=' + this.value, function(response){
                    localStorage.setItem('current_page', 2);
                    packages.html($(response).find(".news-block").html());
                    $("ul.pagination").parent().hide();
                    resetModalButtons();
                    initModalButtons();
                });
            });
            document.querySelector('.section1_search__text').addEventListener('click', function(e){
                e.preventDefault();
                var sdf = $(".form_search input").val();
                $.get(location.pathname + '?title=' + sdf, function(response){
                    localStorage.setItem('current_page', 2);
                    packages.html($(response).find(".news-block").html());
                    $("ul.pagination").parent().hide();
                    resetModalButtons();
                    initModalButtons();
                });
            });
            document.querySelector('.category_search select').addEventListener('change', function(){
                $.get(location.pathname + '?gender=' + this.value, function(response){

                    localStorage.setItem('current_page', 2);
                    packages.html($(response).find(".news-block").html());
                    $("ul.pagination").parent().hide();
                    resetModalButtons();
                    initModalButtons();
                });
            });
        }
        if(['/news'].includes(location.pathname)){
            document.querySelector('.section1_search__text').addEventListener('click', function(e){
                e.preventDefault();
                var sdf = $(".form_search input").val();
                $.get(location.pathname + '?title=' + sdf, function(response){
                    localStorage.setItem('current_page', 2);
                    packages.html($(response).find(".news-block").html());
                    $("ul.pagination").parent().hide();
                    resetModalButtons();
                    initModalButtons();
                });
            });
        }
        initModalButtons();

        function resetModalButtons()
        {
            $('.more_info').off('click');
            $('.mbp_buy').off('click');
            $('.active_buy').off('click');
        }

        function initModalButtons(){
            // document.querySelectorAll('.more_info').forEach(el => $(el).on('click', function(e){
            //   fetch(locale + 'is-authenticated')
            //     .then(response => response.json())
            //     .then(response => {
            //         if(response.isAuthenticated){
            //             fetch(locale + `club/${e.target.dataset.id}`)
            //             .then(response => response.json())
            //             .then(response => {
            //                 initModal(response);
            //             });
            //         } else {
            //             // location.href = `/cardclub/${e.target.dataset.id}`;
            //             fetch(locale + `club/${e.target.dataset.id}`)
            //                 .then(response => response.json())
            //                 .then(response => {
            //                     initModal(response);
            //                 });
            //         }
            //     });
            // }));

            addEventButtonBuy();
        }

        function addEventButtonBuy()
        {
            $('.mbp_buy').on('click', function(e){
                const id = e.target.dataset.id ?? $(this).parent().find('.mbp_buy').attr('data-action');
                // const id = e.target.dataset.id;
                const price = Number.parseFloat($(this).parent().find('.mbp_price span').text());
                // const price = Number.parseFloat($(this).parent().find('.mbp_price span').text().slice(0, -1));
                const amount = $(this).parent().find('.quantity input').val();
                const club_ids = $(this).parent().find('.mbp_buy').attr('data-action');

                // var huita = $(this).parent().find('.mbp_price span').text().slice(0, -1);
                // console.log(huita);
                // console.log(parseFloat(huita));

                // console.log(locale);
                // console.log(id);
                // console.log(club_ids);
                 console.log(price);
                // console.log(amount);


                $.post(locale + 'add-ticket-order', {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    price: price,
                    amount: amount,
                    club_id: id
                })
                .done( function(response){
                       // alert('Ticket has been added successfuly');
                     // openBusket();
                    setTimeout(function(){
                        $('.busket').trigger('click');
                    }, 1000);
                })
                .fail(error => {
                    if(error.status === 401){
                        // alert('Authenticate is required')
                        //  var url = (locale + 'login');
                        // $(location).attr('href',url);
                        // window.location.replace(url);
                        $('#exampleModal5').arcticmodal();
                    }
                })
            });
        }

        function fillInModalWithClub(response)
        {
            console.log(response);
            document.querySelector('.wrap_mod_title h3').innerText = response.club.title;
            document.querySelector('.modal_time').innerText = response.club.schedule;
            document.querySelector('.modal_link_map').setAttribute("href", "cardclub/" + response.club.id);
            $('.modal_slider').remove();
            $('.wrap_modal_slider').append(`<div class="modal_slider"></div>`)
            for(let photo of response.club.photos){
                $('.modal_slider').append(`<div class="ms_item">
                                    <div class="ms_wrap_img">
                                        <img src="/images/clubs/${photo}" alt="img" class="ms_img">
                                    </div>
                                </div>`);
            }
            document.querySelector('.modal_text').innerText = response.club.description;
            $('.mbp_left').html('');
            for(let feature of response.club_features)
            {
                $('.mbp_left').append(
                    `<div class="mbp_icon">
                        ${feature.title}
                    </div>`);
            }
            if(response.club.tickets.length > 0)
            {
                if(str_html)
                {
                    document.querySelector('.mbp_right').innerHTML = str_html;
                    addEventButtonBuy();
                }

                document.querySelector('.mbp_price span').innerText = response.club.tickets[0].price  + '€';
                document.querySelector('.mbp_buy').setAttribute('data-id', response.club.id);
            }
            else
            {
                str_html = document.querySelector('.mbp_right').innerHTML;
                document.querySelector('.mbp_right').innerHTML = 'No tickets';
            }

        }

        function initModal(response)
        {
            fillInModalWithClub(response);
            $('#modal').arcticmodal();
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
        }

    });


    $('.active_buy').click(function(){
        const title = $('.packages__name').text();
        const id = $('.active_buy').attr('data-id');
        const city = $('#select-city').find(':selected').val();
        const date = $('#select-date').val();
        const person = $('#select-person').find(':selected').val();
        const pattern = /(\d{4})\-(\d{2})\-(\d{2})/;
        var dt = date.replace(pattern,'$3/$2/$1');

        document.querySelector('.fm2_title2').innerHTML = 'Package details: ' + title;
        document.querySelector('.details_item_city').innerHTML = 'City: ' + city;
        document.querySelector('.details_item_date').innerHTML = 'Date: ' + dt;
        document.querySelector('.details_item_person').innerHTML = 'Number of persons: ' + person;

        $('#form-activity-id').val(id);
        $('#form-activity-city').val(city);
        $('#form-activity-date').val(date);
        $('#form-activity-person').val(person);

    });
        // $(document).ready(function () {
        //     $('#form_modal2').on('submit', function (e) {
        //         e.preventDefault();
        //         $.ajax({
        //             type: 'POST',
        //             url: '/sendmail',
        //             data: $('#form_modal2').serialize(),
        //             success: function (data) {
        //                 if (data.result) {
        //                     $('#senderror').hide();
        //                     $('#sendmessage').show();
        //                 } else {
        //                     $('#senderror').show();
        //                     $('#sendmessage').hide();
        //                 }
        //             },
        //             error: function () {
        //                 $('#senderror').show();
        //                 $('#sendmessage').hide();
        //             }
        //         });
        //     });
        // });

    const $form = $("#form_modal2");
    $('#sendmessage').hide();
    $form.on("submit", (e) => {
        e.preventDefault();
        $.post($form.attr('action'),
            $form.serialize()).done(
            $('#sendmessage').show()
        );
        setTimeout(function (){
            $('#exampleModal3').arcticmodal('close');
        },1500);
    });

    $('.addfeedback').on('click', function(e){
        $('#exampleModal5').arcticmodal();
    });
    $('.h-account-login').on('click', function(e){
        $('#exampleModal5').arcticmodal();
    });

    function busketOpen(){
        setTimeout(function(){
            $('.busket').trigger('click');
        }, 500);
    }
