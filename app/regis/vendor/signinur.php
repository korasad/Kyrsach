<?php

session_start();
require_once '../../include/database.php';

$emai = $_POST['emai'];
$password = $_POST['password'];

$error_fields = [];

if ($emai === '') {
    $error_fields[] = 'emai';
}

if ($password === '') {
    $error_fields[] = 'password';
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}

$password = md5($password);

$check_user = mysqli_query($link, "SELECT * FROM `юр_лица` WHERE `email` = '$emai' AND `пароль` = '$password'");
if (mysqli_num_rows($check_user) > 0) {

    $user = mysqli_fetch_assoc($check_user);

    $_SESSION['user_ur'] = [
        "id" => $user['id'],
        "organiz" => $user['название'],
        "inn" => $user['инн'],
        "ur_ad" => $user['юр_адресс'],
        "tel" => $user['телефон'],
        "ema" => $user['email']
    ];

    $response = [
        "status" => true
    ];

    echo json_encode($response);

} else {

    $response = [
        "status" => false,
        "message" => 'Не верный логин или пароль'
    ];

    echo json_encode($response);
}
?>
