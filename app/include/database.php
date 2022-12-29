<?php

$link = mysqli_connect('localhost','root','','страховая');
if (mysqli_connect_errno())
{
    echo 'Ошибка в подключение к БД ('.mysqli_connect_errno().'): ' . mysqli_connect_error();
    exit;
}