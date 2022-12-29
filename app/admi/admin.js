$('.loginad-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let lo = $('input[name="lo"]').val(),
    pas = $('input[name="pas"]').val();
    $.ajax({
        url: '/app/admi/adminin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            lo: lo,
            pas: pas
        },
        success (data) {

            if (data.status) {
                document.location.href = '/app/admi/add.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);
            }

        }
    });

});





$('.adm-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let id = $('#select').val(),
    opis = $('input[name="opis"]').val(),
    stoim = $('input[name="stoim"]').val();

    let formData = new FormData();
    formData.append('id', id);
    formData.append('opis', opis);
    formData.append('stoim', stoim);
  


    $.ajax({
        url: '/app/admi/addm.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                document.location.href = '/app/admi/add.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);

            }

        }
    });

});