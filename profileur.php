<?php
session_start();

require 'app/header.php'; 
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Профиль -->

    <div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h1 class="mb-5">Профиль физ лица:</h1>
            </div>
            
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal"><?=$yslug['Название']?></h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"> Название организации: <?= $_SESSION['user_ur']['organiz'] ?> </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                        <li class="mb-4">ID: <?= $_SESSION['user_ur']['id']?></li>
                        <li class="mb-4">Электронная почта: <?= $_SESSION['user_ur']['ema']?></li>
                        <li class="mb-4">ИНН: <?= $_SESSION['user_ur']['inn']?></li>
                        <li class="mb-4">Телефон: <?= $_SESSION['user_ur']['tel']?></li>
                        <li class="mb-4">Юридический адрес: <?= $_SESSION['user_ur']['ur_ad']?></li>
                        <a href="/app/regis/vendor/logout.php" class="logout">Выход</a>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-outline-primary mb-4" onclick="document.location='../app/doki/doki.php'">Добавить документы</button>
                        <button type="button" class="w-100 btn btn-lg btn-outline-primary mb-4" onclick="document.location='../app/doki/mdoki.php'">Мои документы</button>
                        <button type="button" class="w-100 btn btn-lg btn-outline-primary mb-4" onclick="document.location='../app/yslug/ysluga.php'">Мои услуги</button>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>


</body>
</html>
<?php require 'app/footer.php'; ?>