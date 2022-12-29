<?php
session_start();
require_once '../include/database.php';
require_once '../functions.php';

// formData.append('tip', tip);
// formData.append('nom', nom);
// formData.append('idi', idi);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


$idd=$_SESSION['user_fiz']['id'];
$id=$_SESSION['user_ur']['id'];

$ser_id = $_GET['ser_id'];
$услуга = get_moe($ser_id);



if ($idd>0)
{
    $перекус = $услуга['id'];
    $таксиста = $услуга['стоимость'];
    $чек = $услуга['Ind'];
    $sql = "DELETE FROM мои_услуги WHERE id = '$перекус'";
    mysqli_query($link, $sql);
    // $сикуэль = "SELECT итог FROM усг_страхов WHERE individual = '$idd'";
    // mysqli_query($link, $сикуэль);
    // echo $сикуэль;
    //$побег=$сикуэль;
    // echo $побег;
    // $побег=$побег-$таксиста;
    // echo $побег;
    $обмен = "UPDATE усг_страхов SET итог = итог -'$таксиста' WHERE individual = '$чек'";
    mysqli_query($link, $обмен);
    $response = [
    "status" => true,
    "message" => "Удаление прошло успешно!",
    ];
}

else if ($id > 0)
{
    $перекус = $услуга['id'];
    $таксиста = $услуга['стоимость'];
    $чек = $услуга['leg'];
    $sql = "DELETE FROM мои_услуги WHERE id = '$перекус'";
    mysqli_query($link, $sql);
    $сикуэль = "SELECT * FROM усг_страхов WHERE lega = '$id'";
    mysqli_query($link, $сикуэль);
    $побег=$сикуэль['итог'];
    $побег=$побег-$таксиста;
    $обмен = "UPDATE усг_страхов SET итог ='$побег' WHERE lega = '$чек'";
    mysqli_query($link, $обмен);
    $response = [
        "status" => true,
        "message" => "Удаление прошло успешно!",
    ];
}








echo json_encode($response);


header("Location: ysluga.php");
exit;

?>