<?php
session_start();
ini_set('error_resporting',E_ALL);
ini_set('display_errors',1);
ini_set('display_startup_errors',1);

require 'app/header.php'; 
?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h1 class="mb-5">Все услуги:</h1>
            </div>
            <?php
                $yslugi = get_yslugi();
            ?>
            <?php foreach($yslugi as $yslug): ?>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal"><?=$yslug['Название']?></h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"><?=$yslug['Стоимость']?><small class="text-muted fw-light"> руб/год</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                        <li><?=$yslug['Описание']?></li>
                        <p></p>
                        <li>Условия к документам: <?=$yslug['тип_документа']?></li>
                        </ul>
                        <button class="brat w-100 btn btn-lg btn-primary mb-3" type="submit">Взять</button>
                    </div>
                </div>
                <?php endforeach; ?>
      </div>
        </div>
           
    </div>
</div>


<?php require 'app/footer.php'; ?>