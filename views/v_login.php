<div class="auth">
  <h1><?=$titleContent?></h1>
  <form action="./index.php?page=auth&action=login" method="POST">
    <label for="login">Введите логин</label>
    <input type="text" id="login" name="login">
    <label for="pass">Введите пароль</label>
    <input type="password" id="pass" name="pass">
    <button type="submit" name="enter"> Войти </button>
  </form>
  <div class="messageError"><?=$messageError?></div>
</div>
