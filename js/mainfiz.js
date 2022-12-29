/*
    Авторизация
 */

$('.loginfiz-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let lo = $('input[name="lo"]').val(),
    pas = $('input[name="pas"]').val();
    $.ajax({
        url: '/app/regis/vendor/signinfiz.php',
        type: 'POST',
        dataType: 'json',
        data: {
            lo: lo,
            pas: pas
        },
        success (data) {

            if (data.status) {
                document.location.href = '/profilefiz.php';
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


/*
    Регистрация
 */

$('.registerfiz-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let fam = $('input[name="fam"]').val(),
        nam = $('input[name="nam"]').val(),
        och = $('input[name="och"]').val(),
        ini = $('input[name="ini"]').val(),
        email = $('input[name="email"]').val(),
        tele = $('input[name="tele"]').val(),
        fiz_ad = $('input[name="fiz_ad"]').val(),
        password = $('input[name="password"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

    let formData = new FormData();
    formData.append('fam', fam);
    formData.append('nam', nam);
    formData.append('och', och);
    formData.append('ini', ini);
    formData.append('email', email);
    formData.append('tele', tele);
    formData.append('fiz_ad', fiz_ad);
    formData.append('password', password);
    formData.append('password_confirm', password_confirm);
  


    $.ajax({
        url: '/app/regis/vendor/signupfiz.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                document.location.href = '/index.php';
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
