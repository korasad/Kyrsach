<?php

session_start();
require_once '../include/database.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$id = $_POST['id'];
$opis = $_POST['opis'];
$stoim = $_POST['stoim'];


if ($opis === '') {
    $услуга = "SELECT Описание FROM все_услуги WHERE Services_ID  = '$id'";
    $описание = mysqli_query($link, $услуга);
    $opis = $описание['Описание'];
}

if ($stoim === '') {
    $услуга = "SELECT стоимость FROM все_услуги WHERE Services_ID  = '$id'";
    $стоимость = mysqli_query($link, $услуга);
    $stoim = $стоимость['Стоимость'];
}


    
mysqli_query($link, "UPDATE все_услуги SET Описание='$opis', Стоимость='$stoim' where Services_ID='$id'");


echo json_encode($response);


?>
