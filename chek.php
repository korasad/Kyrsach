<?php
date_default_timezone_set('Europe/Moscow');
$nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);

echo date("Y-m-d", $nextyear);