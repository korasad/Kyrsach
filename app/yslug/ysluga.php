<?php
session_start();
require_once '../include/database.php';
require_once '../functions.php';
date_default_timezone_set('Europe/Moscow');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>
<?php require_once '../header.php'; ?>




  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="page-header">
          <h1 class="mb-5">Ваши услуги:</h1>
        </div>
        <?php
        $ysluga = get_ysluga();
        $все = get_moiyslugi();
        ?>
        <?php foreach ($ysluga as $ysla) : ?>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-body">
                <h1 class="card-title pricing-card-title">Итог: <?= $ysla['итог'] ?><small class="text-muted fw-light"> руб/год</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                  <li class="mb-4">Дата наччала действия: <?= $ysla['дата_начала'] ?></li>
                  <li class="mb-4">Дата конца: <?= $ysla['дата_конца'] ?></li>
                </ul>
              <?php endforeach; ?>
              <?php foreach ($все as $один) : ?>
                <div class="card mb-4 rounded-3 shadow-sm">
                  <div class="card-body">
                    <ul class="list-unstyled mt-3 mb-4">
                      <li class="mb-4">Название: <?= $один['Название'] ?></li>
                      <li class="mb-4">Стоимость: <?= $один['стоимость'] ?></li>
                      <li class="mb-4">Дата наччала действия: <?= $один['дата_начала'] ?></li>
                      <li class="mb-4">Дата конца: <?= $один['дата_конца'] ?></li>
                    </ul>
                    <a class="aa" type="submit" href="del.php?ser_id=<?=$один['id']?>">Удалить</a>
                  </div>
                </div>
              <?php endforeach; ?>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>




  <script src="/js/jquery-3.4.1.min.js"></script>
  <script src="/js/salvattore.min.js"></script>
   <?php require '../footer.php'; ?>
</body>

</html>