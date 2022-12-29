<?php

session_start();
require_once '../../include/database.php';

$lo = $_POST['lo'];
$pas = $_POST['pas'];

$error_fields = [];

if ($lo === '') {
    $error_fields[] = 'lo';
}

if ($pas === '') {
    $error_fields[] = 'pas';
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

$pas = md5($pas);

$check_us = mysqli_query($link, "SELECT * FROM `физ_лица` WHERE `почта` = '$lo' AND `пароль` = '$pas'");
if (mysqli_num_rows($check_us) > 0) {

    $user = mysqli_fetch_assoc($check_us);

    $_SESSION['user_fiz'] = [
        "id" => $user['id'],
        "fam" => $user['фамилия'],
        "nam" => $user['имя'],
        "och" => $user['отчество'],
        "ini" => $user['инн'],
        "email" => $user['почта'],
        "tele" => $user['телефон'],
        "fiz_ad" => $user['адрес']
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
