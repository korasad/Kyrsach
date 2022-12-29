<?php require_once '../header.php'; ?>


  
  <div class="container">
    

  <div class="row">
        <div class="col-md-9">
  <form>
    <h1 class="h3 mb-5 fw-normal">Вход физического лица</h1>

    <div class="form-floating mb-3">
      <input type="email" class="form-control" name="lo" placeholder="Введите свой Email">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" name="pas" placeholder="Введите пароль">
      <label for="floatingPassword">Пароль</label>
    </div>
    <button class="loginfiz-btn w-100 btn btn-lg btn-primary mb-3" type="submit">Вход</button>

    <p class="pa mb-3">
            У вас нет аккаунта? - <a class="aa" href="../../app/regis/regfiz.php">зарегистрируйтесь</a>!
        </p>
        <p class="msg none">Lorem ipsum dolor sit amet.</p>
  </form>
        
       
  </div>
  </div>
  </div>
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/salvattore.min.js"></script>
    <script src="../../js/mainfiz.js"></script>



     <?php require '../footer.php'; ?>
  
  </body>
</html>