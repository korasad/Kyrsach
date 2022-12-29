<?php

session_start();
require_once '../../include/database.php';

$organiz = $_POST['organiz'];
$inn = $_POST['inn'];
$ur_ad = $_POST['ur_ad'];
$tel = $_POST['tel'];
$ema = $_POST['ema'];
$pass = $_POST['pass'];
$password_conf = $_POST['password_conf'];

$check_login = mysqli_query($link, "SELECT * FROM `юр_лица` WHERE `email` = '$ema'");
if (mysqli_num_rows($check_login) > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Такая почта уже существует",
        "fields" => ['ema']
    ];

    echo json_encode($response);
    die();
}

$error_fields = [];

if ($organiz === '') {
    $error_fields[] = 'organiz';
}

if ($inn === '') {
    $error_fields[] = 'inn';
}

if ($ur_ad === '') {
    $error_fields[] = 'ur_ad';
}

if ($ema === '') {
    $error_fields[] = 'ema';
}

if (!filter_var($ema, FILTER_VALIDATE_EMAIL))
{
    
    $error_fields[] = 'email';
}

if ($tel === '') {
    $error_fields[] = 'tel';
}

if ($pass === '') {
    $error_fields[] = 'pass';
}
if ($password_conf === '') {
    $error_fields[] = 'password_conf';
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

if ($pass === $password_conf) {


    $pass = md5($pass);
    
    


    mysqli_query($link, "INSERT INTO `юр_лица`(`id `, `название`, `инн`, `юр_адресс`, `телефон`, `email`, `пароль`) VALUES (NULL,'$organiz','$inn','$ur_ad','$tel','$ema','$pass')");

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
