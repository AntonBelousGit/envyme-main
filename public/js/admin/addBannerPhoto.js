$(function() {
    DEFAULT_AMOUNT_PRODUCTS_IMAGES = 1
    let count = 1;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addPhotoInput').on('change', function() {
        if(count++ <= DEFAULT_AMOUNT_PRODUCTS_IMAGES) {
            let data = new FormData();
            data.append('photo', this.files[0]);

            $('.gallery .row>div:first-of-type').before(`<div class="col-md-3">
            <img src="/img/ajax-loader.gif" id="add-photo-loader" class="ajax-loader">
        </div>`);
            $('#add-photo-loader').css('display', 'block');
            $.ajax({
                url: '/banners/add-photo',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: data,

                success: function (response) {
                    console.log(response);
                    $('.gallery .row>div:first-of-type').html();
                    $('.gallery .row>div:first-of-type').html(`
                    <a href="/images/clubs/${response.filename}" class="img-gallery-box" data-fancybox="images" data-width="1200" style="background-image: url(/images/clubs/${response.filename}); background-repeat: no-repeat">
                        <div class="trash-block" data-url="${response.filename}" onclick="removePhoto(this,this.getAttribute('data-url'));return false;"></div>
                    </a>
                    <input type="hidden" name="photo" value="${response.filename}">`);
                },

                error: function (response) {
                    console.log(response)
                    let errorMessage = '';
                    $('.gallery .row>div:first-of-type').remove();
                    if (response.status === 422) {
                        errorMessage = response.responseJSON.errors.photo[0];
                    } else if (response.status === 500) {
                        errorMessage = 'Внутренняя ошибка сервера';
                    }
                    $('#photo-error-message').text(errorMessage);
                }
            })
        }
    });
});
