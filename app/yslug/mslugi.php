<?php
session_start();
require_once '../include/database.php';
require_once '../functions.php';
date_default_timezone_set('Europe/Moscow');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


$idd = $_SESSION['user_fiz']['id'];
$id = $_SESSION['user_ur']['id'];
$aidi = $_GET['aidi'];

$yslg = get_mysluga($aidi);
$stoim = $yslg['Стоимость'];
$дока = $yslg['тип_документа'];
$название = $yslg['Название'];
$тип = $yslg['Тип_лица'];

$dat = date('Y-m-d');
$nextyear = mktime(0, 0, 0, date("m"),   date("d"),   date("Y") + 1);
$nextyear = date("Y-m-d", $nextyear);

if ($idd > 0) //Физ
{
    if ($тип != 1) {
        $sql = "SELECT * FROM усг_страхов WHERE individual = '$idd'";
        $check = mysqli_query($link, $sql);
        $док = "SELECT * FROM доки WHERE individuals = '$idd' and тип_документа = '$дока'";
        $чек = mysqli_query($link, $док);
        if (mysqli_num_rows($чек) > 0) {
            $ysl = "INSERT INTO мои_услуги (Services, стоимость, Ind, leg, дата_начала, дата_конца, Название) VALUES ('$aidi', '$stoim', '$idd', NULL,'$dat','$nextyear', '$название')";
            mysqli_query($link, $ysl);
            if (mysqli_num_rows($check) == 0) {
                $добавь = "INSERT INTO усг_страхов (strax_ID, individual, lega, итог, дата_начала, дата_конца) VALUES (NULL, '$idd', NULL, NULL, NULL, NULL)";
                mysqli_query($link, $добавь);
            }
            $мои = "SELECT * FROM мои_услуги WHERE Ind = $idd";
            mysqli_query($link, $мои);
            $сум = "SELECT SUM(стоимость) FROM мои_услуги where Ind = $idd";
            $сумма = mysqli_query($link, $сум);
            $чо = mysqli_fetch_assoc($сумма);
            $чозанах = $чо['SUM(стоимость)'];
            $апдате = "UPDATE усг_страхов SET итог = $чозанах, дата_начала = '$dat', дата_конца = '$nextyear' WHERE individual = '$idd'";
            mysqli_query($link, $апдате);
            $response = [
                "status" => true,
                "message" => "Заполнение выполнено!",
            ];
        } else {
            echo "У вас нет необхадимого документа";
            die();
        }
    } else {
        echo "Вы не юр лицо";
        die();
    }
} else if ($id > 0) //Юр
{
    if ($тип != 3) {
        $док = "SELECT * FROM доки WHERE individuals = '$idd' and тип_документа = '$дока'";
        $чек = mysqli_query($link, $док);
        if (mysqli_num_rows($чек) > 0) {
            $ysl = "INSERT INTO мои_услуги (Services, стоимость, Ind, leg, дата_начала, дата_конца, Название) VALUES ('$aidi', '$stoim', NULL,'$idd','$dat','$nextyear', '$название')";
            mysqli_query($link, $ysl);
            $sql = "SELECT * FROM усг_страхов WHERE lega = '$id'";
            $check = mysqli_query($link, $sql);
            if (mysqli_num_rows($check) == 0) {
                $добавь = "INSERT INTO усг_страхов (strax_ID, individual, lega, итог, дата_начала, дата_конца) VALUES (NULL, NULL,'$id', NULL, NULL, NULL)";
                mysqli_query($link, $добавь);
            }
            $мои = "SELECT * FROM мои_услуги WHERE leg = $id";
            mysqli_query($link, $мои);
            $сум = "SELECT SUM(стоимость) FROM мои_услуги where leg = $id";
            $сумма = mysqli_query($link, $сум);
            $чо = mysqli_fetch_assoc($сумма);
            $чозанах = $чо['SUM(стоимость)'];
            $апдате = "UPDATE усг_страхов SET итог='$чозанах', дата_начала = '$dat', дата_конца = '$nextyear' WHERE lega = '$id'";
            mysqli_query($link, $апдате);
            $response = [
                "status" => true,
                "message" => "Заполнение выполнено!",
            ];
        } else {
            echo "У вас нет необхадимого документа";
            die();
        }
    } else {
        echo "Вы не физ лицо";
        die();
    }
} else {
    $response = [
        "status" => false,
        "message" => "Заполнение провалилось",
    ];
}


//echo json_encode($response);



// Дальше фронт



header("Location: ysluga.php");
exit;
