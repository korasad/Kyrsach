$('.doki-btn').click(function (e) {
    e.preventDefault();
    

    $(`input`).removeClass('error');
    
    let doki = $('#select').val(),
        gos_n = $('input[name="gos_n"]').val();

    let formData = new FormData();
    formData.append('doki', doki);
    formData.append('gos_n', gos_n);
  


    $.ajax({
        url: '/app/doki/dokbd.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                document.location.href = 'mdoki.php';
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

// Удаление

$('.deli').click(function (e) {
    e.preventDefault();
    

    $(`input`).removeClass('error');

    let tip = $('div.hidden').data('tip'),
    nom = $('div.hidden').data('nom');
    let formData = new FormData();
    formData.append('tip', tip);
    formData.append('nom', nom);
    $.ajax({
        url: '/app/doki/del.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {
            if (data.status) {
                document.location.href = 'mdoki.php';
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