<?php

session_start();
require_once '../include/database.php';

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
$сикуад = "SELECT * FROM админ WHERE `email` = '$lo' AND `пароль` = '$pas'";
$check_us = mysqli_query($link, $сикуад);
if (mysqli_num_rows($check_us) > 0) {

    
    $_SESSION['access'] = TRUE;
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
