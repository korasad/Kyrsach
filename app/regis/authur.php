<?php
session_start();
require_once '../header.php';
?>

  <div class="container">
    

  <div class="row">
        <div class="col-md-9">
  <form>
    <h1 class="h3 mb-5 fw-normal">Вход юридического лица</h1>

    <div class="form-floating mb-3">
      <input type="email" class="form-control" name="emai" placeholder="Введите свой Email">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" name="password" placeholder="Введите пароль">
      <label for="floatingPassword">Пароль</label>
    </div>
    <button class="loginur-btn w-100 btn btn-lg btn-primary mb-3" type="submit">Вход</button>

    <p class="pa mb-3">
            У вас нет аккаунта? - <a class="aa" href="../../app/regis/regur.php">зарегистрируйтесь</a>!
        </p>
        <p class="msg none">Lorem ipsum dolor sit amet.</p>
  </form>
        
       
  </div>
  </div>
  </div>
    



   <?php require '../footer.php'; ?>
  <script src="../../js/jquery-3.4.1.min.js"></script>
  <script src="../../js/salvattore.min.js"></script>
  <script src="../../js/mainur.js"></script>
  </body>
</html>