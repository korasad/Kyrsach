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

$id_dok = $_GET['id_dok'];
$документ = get_dok($id_dok);



if ($idd>0)
{
    $перекус = $документ['individuals'];
    $таксиста = $документ['номер_документа'];
    $чек = $документ['тип_документа'];
    $sql = "DELETE FROM доки WHERE id_dok = '$id_dok'";
    mysqli_query($link, $sql);
    $вставка = "INSERT INTO Удаленный_док(Аиди, тип_документа, номер_документа, физ, юр) VALUES (NULL,'$чек','$таксиста','$перекус', NULL)";
    mysqli_query($link, $вставка);
    $response = [
    "status" => true,
    "message" => "Удаление прошло успешно!",
    ];
}

else if ($id > 0)
{
    $перекус = $документ['legal'];
    $таксиста = $документ['номер_документа'];
    $чек = $документ['тип_документа'];
    $sql = "DELETE FROM доки WHERE legal = '$id_dok'";
    mysqli_query($link, $sql);
    $вставка = "INSERT INTO Удаленный_док(Аиди, тип_документа, номер_документа, физ, юр) VALUES (NULL,'$чек','$таксиста',NULL,'$перекус')";
    mysqli_query($link, $вставка);
    $response = [
        "status" => true,
        "message" => "Удаление прошло успешно!",
    ];
}








echo json_encode($response);


header("Location: mdoki.php");
exit;

?>