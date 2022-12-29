<?php
session_start();
require_once '../include/database.php';
require_once '../functions.php';
require_once '../header.php';
?>

  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="page-header">
          <h1 class="mb-5">Все документы:</h1>
        </div>
        <?php
        $doki = get_doki();
        ?>
        <?php foreach ($doki as $dok) : ?>
          <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3">
                <h4 class="my-0 fw-normal"><?= $dok['тип_документа'] ?></h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled mt-3 mb-4">
                  <li>Номер документа: <?= $dok['номер_документа'] ?></li>
                </ul>
                <div class='hidden' data-tip='<?= $dok['тип_документа'] ?>' data-nom='<?= $dok['номер_документа'] ?>'></div>
                <a class="aa" type="submit" href="/app/doki/del.php?id_dok=<?=$dok['id_dok']?>">Удалить</a>
              </div>
            </div>
          <?php endforeach; ?>
          </div>
      </div>

    </div>
  </div>




  <script src="/js/jquery-3.4.1.min.js"></script>
  <script src="/js/salvattore.min.js"></script>
  <script src="/app/doki/doki.js"></script>












  <?php require '../footer.php'; ?>

</body>

</html>