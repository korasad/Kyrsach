<?php
session_start();
require_once '../include/database.php';

if (! isset($_SESSION['access']))
{
    echo 'Your text of error.';
    exit(0);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-US-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Strax</title>
</head>

<body>



    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="../../index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">

                <img class="mb-2" src="../../img/1.jpg" alt="" width="40" height="32">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../../index.php" class="nav-link px-2 link-secondary">Главная</a></li>
                <li><a href="../../app/cont.php" class="nav-link px-2 link-dark">Контакты</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2" onclick="document.location='../../app/regis/vendor/logout.php'">Выход</button>
            </div>
        </header>
    </div>






    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <form>
                    <h1 class="h3 mb-5 fw-normal">Изменение услуги</h1>

                    <div class="col-md-5 mb-3">
                        <label for="country">Услуга:</label>
                        <select id="select" class="custom-select d-block w-100">
                            <option value="" selected>Выбрать услуга...</option>
                            <option value="1">Страхование жизни</option>
                            <option value="2">Страхование недвижимого имущества физических лиц</option>
                            <option value="3">Страхование недвижимого имущества юридических лиц</option>
                            <option value="4">Страхование транспорта</option>
                            <option value="5">Страхование здоровья</option>
                            <option value="6">Страхование грузов</option>
                            <option value="7">Страхование ответственности юридических лиц</option>
                            <option value="8">ТЕСТ</option>
                        </select>

                    </div>



                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="opis" placeholder="Названеи">
                        <label for="floatingInput">Описание</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="stoim" placeholder="Стоимость">
                        <label for="floatingInput">Стоимость</label>
                    </div>
                    <button class="adm-btn w-100 btn btn-lg btn-primary mb-3" type="submit">Изменить</button>
                    <p class="msg none">Lorem ipsum dolor sit amet.</p>

                </form>
            </div>
        </div>
    </div>

    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/salvattore.min.js"></script>
    <script src="admin.js"></script>





     <?php require '../footer.php'; ?>

</body>

</html>