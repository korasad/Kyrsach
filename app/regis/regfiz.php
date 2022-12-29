<?php
session_start();
?>

<?php require_once '../header.php'; ?>




  <div class="container">
  <div class="row">
        <div class="col-md-9">
  <form>
    <h1 class="h3 mb-5 fw-normal">Редистрация физического лица</h1>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="fam" placeholder="Фамилия">
      <label for="floatingInput">Фамилия</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="nam"  placeholder="Имя">
      <label for="floatingInput">Имя</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="och"  placeholder="Отчество">
      <label for="floatingInput">Отчество</label>
    </div>
    <div class="form-floating mb-3">
      <input type="number" class="form-control" name="ini"  placeholder="ИНН" minlength="9" maxlength="11">
      <label for="floatingInput">ИНН</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" name="email" placeholder="Введите свой Email">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="number" class="form-control" name="tele"  placeholder="Телефон" minlength="9" maxlength="11">
      <label for="floatingInput">Телефон</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="fiz_ad"  placeholder="Адресс житеельства">
      <label for="floatingInput">Адресс житеельства</label>
    </div>
    
    <div class="form-floating mb-3">
      <input type="password" class="form-control" name="password" placeholder="Введите пароль">
      <label for="floatingPassword">Пароль</label>
    </div>

    <div class="form-floating mb-3">
      <input type="password" class="form-control" name="password_confirm" placeholder="Подтвердить пароль">
      <label for="floatingPassword">Подтвердить пароль</label>
    </div>
    
    <button class="registerfiz-btn login-btn w-100 btn btn-lg btn-primary mb-3" type="submit">Регистрация</button>

    <p class="pa mb-3">
            У вас уже есть аккаунт - <a class="aa" href="../../app/regis/authfiz.php">авторизуйтесь</a>!
        </p>
        <p class="msg none">Lorem ipsum dolor sit amet.</p>
  </form> 
  </div>
  </div>
  </div>
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/salvattore.min.js"></script>
    <script src="/js/mainfiz.js"></script>
    


     <?php require '../footer.php'; ?>
  
  </body>
</html>