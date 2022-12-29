<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//Услуги
function get_yslugi(){
    global $link;
    $sql = "SELECT * FROM все_услуги";
    $result = mysqli_query($link,$sql);

    $yslugi = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $yslugi;
}
//Документы
function get_doki(){
    $idd=$_SESSION['user_fiz']['id'];
    $id=$_SESSION['user_ur']['id'];
    

    global $link;
    if ($idd>0)
    {
        settype($idd, 'integer');
        $sql = "SELECT * FROM доки WHERE individuals = $idd";
        $result = mysqli_query($link,$sql);
        $doki = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $doki;
    }
    if ($id>0)
    {
        //settype($id, 'int');
        $sql = "SELECT * FROM доки WHERE legal = $id";
        $result = mysqli_query($link,$sql);
        $doki = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $doki;
    }
    else 
    {
        return 0;
    }
    
}

//Услуги
function get_ysluga(){
    global $link;
    $idd=$_SESSION['user_fiz']['id'];
    $id=$_SESSION['user_ur']['id'];
    if ($idd>0)
    {
        $sql = "SELECT * FROM усг_страхов WHERE individual = $idd";
        $result = mysqli_query($link,$sql);
        $ysluga = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $ysluga;
    }
    if ($id>0)
    {
        $sql = "SELECT * FROM усг_страхов WHERE lega = $id";
        $result = mysqli_query($link,$sql);
        $ysluga = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $ysluga;
    }
    else 
    {
        return 0;
    }
}

//выбранная услуга
function get_mysluga($aidi){
    global $link;
    $sql = "SELECT * FROM все_услуги where Services_ID = '$aidi'";
    
    $result = mysqli_query($link,$sql);
    $mysluga = mysqli_fetch_assoc($result);
    return $mysluga;
}

function get_dok($док){
    global $link;
    $sql = "SELECT * FROM доки where id_dok = '$док'";
    
    $result = mysqli_query($link,$sql);
    $mysluga = mysqli_fetch_assoc($result);
    return $mysluga;
}


function get_moiyslugi(){
    global $link;
    $idd=$_SESSION['user_fiz']['id'];
    $id=$_SESSION['user_ur']['id'];
    if ($idd>0)
    {
        $sql = "SELECT * FROM мои_услуги WHERE Ind = $idd";
        $result = mysqli_query($link,$sql);
        $ysluga = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $ysluga;
    }
    if ($id>0)
    {
        $sql = "SELECT * FROM мои_услуги WHERE leg = $id";
        $result = mysqli_query($link,$sql);
        $ysluga = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $ysluga;
    }
    else 
    {
        return 0;
    }
}


function get_moe($услуга){
    global $link;
    $sql = "SELECT * FROM мои_услуги where id = '$услуга'";
    
    $result = mysqli_query($link,$sql);
    $mysluga = mysqli_fetch_assoc($result);
    return $mysluga;
}