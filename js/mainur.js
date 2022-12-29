/*
    Авторизация
 */

$('.loginur-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let emai = $('input[name="emai"]').val(),
        password = $('input[name="password"]').val();
    $.ajax({
        url: '/app/regis/vendor/signinur.php',
        type: 'POST',
        dataType: 'json',
        data: {
            emai: emai,
            password: password
        },
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



/*
    Регистрация
 */

$('.registerur-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let ema = $('input[name="ema"]').val(),
    pass = $('input[name="pass"]').val(),
        organiz = $('input[name="organiz"]').val(),
        tel = $('input[name="tel"]').val(),
        inn = $('input[name="inn"]').val(),
        ur_ad = $('input[name="ur_ad"]').val(),
        password_conf = $('input[name="password_conf"]').val();

        let formData = new FormData();
        formData.append('ema', ema);
        formData.append('pass', pass);
        formData.append('password_conf', password_conf);
        formData.append('organiz', organiz);
        formData.append('tel', tel);
        formData.append('inn', inn);
        formData.append('ur_ad', ur_ad);


    $.ajax({
        url: '/app/regis/vendor/signupur.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {
            console.log(data);

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
