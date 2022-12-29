<?php

session_start();
require_once '../../include/database.php';

$fam = $_POST['fam'];
$nam = $_POST['nam'];
$och = $_POST['och'];
$ini = $_POST['ini'];
$email = $_POST['email'];
$tele = $_POST['tele'];
$fiz_ad = $_POST['fiz_ad'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$check_login = mysqli_query($link, "SELECT * FROM `физ_лица` WHERE `почта` = '$email'");
if (mysqli_num_rows($check_login) > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Такая почта уже существует",
        "fields" => ['email']
    ];

    echo json_encode($response);
    die();
}

$error_fields = [];

if ($fam === '') {
    $error_fields[] = 'fam';
}

if ($nam === '') {
    $error_fields[] = 'nam';
}

if ($och === '') {
    $error_fields[] = 'och';
}

if ($email === '') {
    $error_fields[] = 'email';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error_fields[] = 'ema';
}

if ($ini === '') {
    $error_fields[] = 'ini';
}

if ($tele === '') {
    $error_fields[] = 'tele';
}

if ($fiz_ad === '') {
    $error_fields[] = 'fiz_ad';
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

if ($password == $password_confirm) {


    $password = md5($password);
    
    mysqli_query($link, "INSERT INTO физ_лица(id, фамилия, имя, отчество, инн, почта, телефон, адрес, пароль) VALUES (NULL,'$fam','$nam','$och','$ini','$email','$tele','$fiz_ad','$password')");

    $response = [
        "status" => true,
        "message" => "Регистрация прошла успешно!",
    ];
    echo json_encode($response);


} else {
    $response = [
        "status" => false,
        "message" => "Пароли не совпадают",
    ];
    echo json_encode($response);
}

?>
