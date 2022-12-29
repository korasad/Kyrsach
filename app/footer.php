<?php
    require_once 'include/database.php';
    require_once 'functions.php';
    session_start();
?>
<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="/img/1.jpg" alt="" width="24" height="19">
        <small class="d-block mb-3 text-muted">©2022</small>
      </div>
     
      <?php if ($_SESSION['user_fiz']['id']==null and $_SESSION['user_ur']['id']==null): ?>
        <div class="col-12 col-md">
        <small class="d-block mb-3 text-muted"><a href="/app/admi/admin.php">
          ТУТ админ
        </a> </small>
      
      </div>
      <?php endif ?>
      
    </div>
  </footer>
  <script src="/js/salvattore.min.js"></script>
