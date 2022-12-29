<?php
session_start();
if (!$_SESSION['user_ur']) {
    unset($_SESSION['user_fiz']);
}
else if(!$_SESSION['user_fiz']){
    unset($_SESSION['user_ur']);
}

unset($_SESSION['access']);
    



header('Location: ../../../index.php');