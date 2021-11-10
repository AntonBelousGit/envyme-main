window.addEventListener('load', function () {
    let count_tickets = 0;
    let timer = null;
    let in_active = false;
    let diff_tickets = 0;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.post('/get-current-order-busket' , function (response) {
        // console.log(response.count_tickets);
        if (response == 0){

            $('.head_busket span:last-child').text(`${response}`);
        }else {

            $('.head_busket span:last-child').text(`${response.count_tickets}`);
        }
    });
    $('.busket').on('click', function () {
        $.post('/get-current-order', function (response) {
            $('.list_tovars').html('');
            if (response.status === 'order doesn\'t exist') {
                return;
            }

            $.post('/get-current-order-busket' , function (response) {
                // console.log(response.count_tickets);
                if (response == 0){

                    $('.head_busket span:last-child').text(`${response}`);
                }else {

                    $('.head_busket span:last-child').text(`${response.count_tickets}`);
                }
            });

            $('.btn_checkout').on('click', function () {
                makePayment($('[name=payment]:checked').val());
            });

            $('.inp_promo').on('blur', function () {
                $.post('/check-promo-code', {discountCode: $(this).val()})
                    .done(function (responsePromo) {
                        if (responsePromo.status === 'promo not found') {
                            alert('Promo not found');
                        } else if (responsePromo.status === 'promo found') {
                            const total = getTotalMoney();
                            $('.bb_sum span:last-child').text(`${response.count_tickets} ticket(s) - ${(getTotalMoney() * parseFloat(responsePromo.discountPercent) / 100).toFixed(2)}`);
                            $('.head_busket span:last-child').text(`${response.count_tickets}`);
                            localStorage.setItem('discount', responsePromo.discountPercent);
                        }
                    })
                    .fail(function (error) {
                        alert(error.responseJSON.message);
                    })
            });

            for (let club_name in response.tickets_club_count) {
                $('.list_tovars').append(
                    `<div class="lt_item" data-id=${response.tickets_club_count[club_name][2]}>
                    <a href="#" class="lt_close"></a>
                    <div class="lt_row">
                        <div class="lt_col">
                            <div class="lt_name">
                                ${club_name}
                            </div>
                        </div>
                        <div class="lt_col">
                            <div class="quantity">
                            <div class="quantity-button quantity-down-cart">-</div>
                            <input type="number" min="1" step="1" max="20" disabled value="${response.tickets_club_count[club_name][0]}" class="amount_tickets" data-id=${response.tickets_club_count[club_name][2]}>
                            <div class="quantity-button quantity-up-cart">+</div>
                            </div>
                        </div>
                        <div class="lt_col">
                            <div class="lt_price">
                                ${response.tickets_club_count[club_name][1]}
                            </div>
                        </div>
                    </div>
                </div>`);
            }
            $('.bb_sum span:last-child').text(`${response.count_tickets} ticket(s) - ${getTotalMoney()}`);
            $('.head_busket span:last-child').text(`${response.count_tickets}`);
            count_tickets = parseInt($('.bb_sum span:last-child').text()) ? parseInt($('.bb_sum span:last-child').text()) : 0;
            count_tickets = parseInt($('.head_busket span:last-child').text()) ? parseInt($('.head_busket span:last-child').text()) : 0;
            resetAmountOfTickets();
            changeAmountOfTicket();
        });
    });
    changeAmountOfTicket();

    function delayQueryToChangeAmountProducts(club_id, decrease_flag) {
        diff_tickets++;
        if (in_active) {
            clearTimeout(timer);
            in_active = false;
        }
        timer = setTimeout(() => {
            $.post('/change-amount-tickets', {
                price: parseFloat($('.lt_price').text().trim()),
                amount: diff_tickets,
                club_id: club_id,
                decrease_flag: decrease_flag
            })
                .done(response => {
                    diff_tickets = 0;
                    // alert(response.status);
                    $.post('/get-current-order-busket' , function (response) {
                        // console.log(response.count_tickets);
                        if (response == 0){

                            $('.head_busket span:last-child').text(`${response}`);
                        }else {

                            $('.head_busket span:last-child').text(`${response.count_tickets}`);
                        }
                    });
                })
                .fail(error => alert(error.status))
        }, 1000);
        in_active = true;

    }

    function changeAmountOfTicket() {
        $('.lt_close').on('click', function () {
            count_tickets -= $(this).parent().find('.amount_tickets').val();
            $(this).parent().remove();
            $('.bb_sum span:last-child').text(`${count_tickets} ticket(s) - ${getTotalMoney()}`);
            $('.head_busket span:last-child').text(`${count_tickets}`);
            $.get('/delete-club/' + $(this).parent().data('id'))
                .done(function (response) {
                    // alert('Delete club successfuly');
                });
        });

        $('.quantity-up').on('click', function () {
            const $amount_tickets = $(this).parent().find('.amount_tickets');
            if (+$amount_tickets.val() < 20) {
                // $amount_tickets.val((+$amount_tickets.val()) + 1);
                $amount_tickets.val((+$amount_tickets.val()));
                count_tickets++;

                $('.bb_sum span:last-child').text(`${count_tickets} ticket(s) - ${getTotalMoney()}`);
                // $('.head_busket span:last-child').text(`${count_tickets}`);
            }


        });

        $('.quantity-down').on('click', function () {
            const $amount_tickets = $(this).parent().find('.amount_tickets');
            if (+$amount_tickets.val() > 1) {
                $amount_tickets.val((+$amount_tickets.val()) - 1);
                count_tickets--;

                $('.bb_sum span:last-child').text(`${count_tickets} ticket(s) - ${getTotalMoney()}`);
                // $('.head_busket span:last-child').text(`${count_tickets}`);
            }


        });

        $('.quantity-down-cart, .quantity-up-cart').each((idx, item) => {
            if ($(item).hasClass('quantity-up-cart')) {
                $(item).on('click', amountCart(item, true));
            } else {
                $(item).on('click', amountCart(item, false));
            }

        });

        function amountCart(that, flag) {
            let current_counter = +$(that).parent().find('.amount_tickets').val();
            return function () {

                const club_id = $(that).parent().find('.amount_tickets').data('id');
                const $amount_tickets = $(that).parent().find('.amount_tickets');
                if (flag) {
                    if (diff_tickets + current_counter < 20 || +$amount_tickets.val() === 19) {
                        console.log(current_counter, diff_tickets, current_counter);
                        up($amount_tickets);
                        delayQueryToChangeAmountProducts(club_id, 'off');
                    } else {
                        current_counter = +$(that).parent().find('.amount_tickets').val();
                    }
                } else {
                    if (-diff_tickets + current_counter > 1 || +$amount_tickets.val() === 2) {
                        down($amount_tickets);
                        delayQueryToChangeAmountProducts(club_id, 'on');
                    } else {
                        current_counter = +$(that).parent().find('.amount_tickets').val();
                    }
                }
            }

            function up($amount_tickets) {
                $amount_tickets.val((+$amount_tickets.val()) + 1);
                count_tickets++;
                $('.bb_sum span:last-child').text(`${count_tickets} ticket(s) - ${getTotalMoney()}`);


                // $('.head_busket span:last-child').text(`${count_tickets}`);
            }

            function down($amount_tickets) {
                $amount_tickets.val((+$amount_tickets.val()) - 1);
                count_tickets--;
                $('.bb_sum span:last-child').text(`${count_tickets} ticket(s) - ${getTotalMoney()}`);


                // $('.head_busket span:last-child').text(`${count_tickets}`);
            }
        }

        function downAmountCart(that) {
            let current_counter = +$(that).parent().find('.amount_tickets').val();
            return function (e) {

                const club_id = $(that).parent().find('.amount_tickets').data('id');
                const $amount_tickets = $(that).parent().find('.amount_tickets');
                if (-diff_tickets + current_counter > 1 || +$amount_tickets.val() === 2) {
                    console.log(current_counter, diff_tickets);
                    down($amount_tickets);
                    delayQueryToChangeAmountProducts(club_id, 'on');
                }
            }
        }
    }

    function resetAmountOfTickets() {
        $('.lt_close').off('click');
        $('.quantity-up').off('click');
        $('.quantity-down').off('click');
    }

    function getTotalMoney() {
        let total_sum = 0;
        $('.lt_item').each(function () {
            const amount_tickets = +$(this).find('.amount_tickets').val();
            total_sum += amount_tickets * +$(this).find('.lt_price').text().trim();
        })
        return total_sum.toFixed(2);
    }

    function makePayment(payment) {
        let sum = getTotalMoney();
        if (localStorage.getItem('discount')) {
            sum *= parseFloat(localStorage.getItem('discount')) / 100;
            sum = sum.toFixed(2);
        }
        items = [];
        $('.lt_item').each(function (index, item) {
            item = {
                'name': $(item).find('.lt_name').text().trim(),
                'price': $(item).find('.lt_price').text().trim(),
                'description': `Ticket for club ${$(item).find('.lt_name').text().trim()}`,
                'quantity': $(item).find('.lt_col input').val()
            }
            items.push(item);
        });
        console.log({'payment': payment, 'items': items, 'sum': sum, 'discount': localStorage.getItem('discount')});
        $.post('/make-payment', {
            'payment': payment,
            'items': items,
            'sum': sum,
            'discount': localStorage.getItem('discount')
        })
            .done(function (response) {
                localStorage.clear();
                location.href = response.link;
            });
    }
});
