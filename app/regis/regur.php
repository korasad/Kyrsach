<?php
    session_start();
    ?>
<?php require_once '../header.php'; ?>

  <div class="container">
  <div class="row">
        <div class="col-md-9">
  <form>
    <h1 class="h3 mb-5 fw-normal">Редистрация юридического лица</h1>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="organiz" placeholder="Название организации">
      <label for="floatingInput">Название организации</label>
    </div>
    <div class="form-floating mb-3">
      <input type="number" class="form-control" name="inn"  placeholder="ИНН организации" minlength="9" maxlength="11">
      <label for="floatingInput">ИНН организации</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="ur_ad"  placeholder="юридический адресс организации">
      <label for="floatingInput">Юридический адресс организации</label>
    </div>
    <div class="form-floating mb-3">
      <input type="number" class="form-control" name="tel"  placeholder="Телефон организации" minlength="9" maxlength="11">
      <label for="floatingInput">Телефон организации</label>
    </div>

    <div class="form-floating mb-3">
      <input type="email" class="form-control" name="ema" placeholder="Введите свой Email">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" name="pass" placeholder="Введите пароль">
      <label for="floatingPassword">Пароль</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" name="password_conf" placeholder="Подтвердить пароль">
      <label for="floatingPassword">Подтвердить пароль</label>
    </div>
    <button class="registerur-btn w-100 btn btn-lg btn-primary mb-3" type="submit">Регистрация</button>

    <p class="pa mb-3">
            У вас уже есть аккаунт - <a class="aa" href="../../app/regis/authur.php">авторизуйтесь</a>!
        </p>
        <p class="msg none">Lorem ipsum dolor sit amet.</p>


  
    </form>
  </div>
  </div>
  </div>
  <script src="../../js/jquery-3.4.1.min.js"></script>
  <script src="../../js/salvattore.min.js"></script>
  <script src="../../js/mainur.js"></script>
  
    


   <?php require '../footer.php'; ?>
 
  </body>
</html>