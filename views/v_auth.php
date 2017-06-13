<div class="auth">
  <h1><?=$titleContent?></h1>
  <hr>
  <form action="./index.php?page=auth" method="POST">
    <button type="submit" name="out"> Выход из аккаунта </button>
  </form>
  <hr>
  <p>Если Вы зарегистрированы, то выполните <a href="./index.php?page=auth&action=login">ВХОД</a></p>
  <hr>
  <form action="./index.php?page=auth" method="POST">
    <label for="login">Введите логин</label>
    <input type="text" id="login" name="login">
    <label for="pass">Введите пароль</label>
    <input type="password" id="pass" name="pass">
    <label for="pass2">Повторите пароль</label>
    <input type="password" id="pass2" name="pass2">
    <button type="submit" name="registration"> Зарегистрироваться </button>
  </form>
  <div class="messageError"><?=$messageError?></div>
</div>
