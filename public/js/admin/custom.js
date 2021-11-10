$(function() {
    let direct = localStorage.getItem('sort_direct') === 'asc' ? 'asc' : 'desc';
    createSortInput();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addPhotoInput').on('change', function() {
        let data = new FormData();
        data.append('photo', this.files[0]);
        $('.gallery .row>div:first-of-type').before(`<div class="col-md-3">
            <img src="/img/ajax-loader.gif" id="add-photo-loader" class="ajax-loader">
        </div>`);
        $('#add-photo-loader').css('display', 'block');
        $.ajax({
            url: '/uploads/add-photo',
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: data,

            success: function(response) {
                console.log(response);
                $('.gallery .row>div:first-of-type').html();
                $('.gallery .row>div:first-of-type').html(`
                    <a href="/images/large/${response.filename}" class="img-gallery-box" data-fancybox="images" data-width="1200" style="background-image: url(/images/thumbnails/${response.filename}); background-repeat: no-repeat">
                        <div class="trash-block" data-url="${response.filename}" onclick="removePhoto(this,this.getAttribute('data-url'));return false;"></div>
                    </a>
                    <input type="hidden" name="gallery[]" value="${response.filename}">`);
            },

            error: function(response) {
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
    });

    $('.sort').click(function(){
        $(`#sort`).remove();
        direct = createSortInput(direct);
    });
});

function createSortInput(direct = ''){
    // sort_direct = localStorage.getItem('sort_direct') === 'desc' ?
    //     'desc' : 'asc';

    if(direct === 'asc'){
        // sort_direct = 'desc';
        direct = 'desc';
        localStorage.setItem('sort_direct', 'desc');
    } else if(direct === 'desc'){
        // sort_direct = 'asc';
        direct = 'asc';
        localStorage.setItem('sort_direct', 'asc');
    } else {
        direct = localStorage.getItem('sort_direct');
    }

    $('<input>').attr({
        type: 'hidden',
        id: 'sort',
        name: 'sort',
        value: direct
    }).appendTo('.card-body form');
    return direct;
}
