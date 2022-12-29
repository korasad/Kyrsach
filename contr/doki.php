<?php
    session_start();
    require_once '../include/database.php';
    require_once '../functions.php';
?>
<?php require_once '../header.php'; ?>


  <div class="container">
  <div class="row">
        <div class="col-md-9">
  <form>
    <h1 class="h3 mb-5 fw-normal">Добавление документа</h1>
    
    <div class="col-md-5 mb-3">
            <label for="country">Тип документа</label>
            <select id="select" class="custom-select d-block w-100" >
              <option value="" selected>Выбрать тип документа...</option>
              <option value="Паспорт">Паспорт</option>
              <option value="Кадастровый номер">Кадастровый номер</option>
              <option value="Номер машины">Номер машины</option>
              <option value="Номер документа">Номер документа</option>
            </select>
        
          </div>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="gos_n" placeholder="Гос номер">
      <label for="floatingInput">Гос номер</label>
    </div>
    <button class="doki-btn w-100 btn btn-lg btn-primary mb-3" type="submit">Добавить</button>
    <p class="msg none">Lorem ipsum dolor sit amet.</p>
  
    </form>
  </div>
  </div>
  </div>
  <script src="/js/jquery-3.4.1.min.js"></script>
  <script src="/js/salvattore.min.js"></script>
  <script src="/app/doki/doki.js"></script>
  
    


    <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="/img/1.jpg" alt="" width="24" height="19">
        <small class="d-block mb-3 text-muted">©2022</small>
      </div>
    </div>
  </footer>
 
  </body>
</html>