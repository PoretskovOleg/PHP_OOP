<?php
  namespace controllers;
  use models\M_User;

  class C_Auth extends C_Base {
    private $message;

    public function __construct() {
      parent::__construct();
    }

    protected function before() {
      $this->title = 'Cтраница Регистрации';
      $this->titleContent = $_GET['action'] == 'login' ? 'ВХОД в аккаунт' : 'Регистрация';
      //Если нажата кнопка ЗАРЕГИСТРОРОВАТЬСЯ, то проверяем поля формы и регистрируем пользователя
      if (isset($_POST['registration'])) {
        if (!$_POST['login'] || !$_POST['pass']) {
          $this->message = 'Введите логин и пароль';
        } elseif (M_User::findUser($_POST['login'])) {
          $this->message = 'Этот логин уже существует';
        } elseif ($_POST['pass'] !== $_POST['pass2']) {
          $this->message = 'Вы ввели разные пароли!';
        } else {
          M_User::setUser($_POST['login'], $_POST['pass']);
          $_SESSION['user'] = M_User::findUser($_POST['login']);
          $this->message = 'Вы успешно зарегистрировались! Можете перейти на <a href="/">Главную страницу</a>';
        }
      } else {
        $this->message = '';
      }
      // Если нажата кнопка ВОЙТИ, то проверяем логин и пароль и авторизуем пользователя
      if (isset($_POST['enter'])) {
        $user = M_User::findUser($_POST['login']);
        if (!$user['login']) {
          $this->message = 'Пользователя с таким логином не существует';
        } elseif ($_POST['pass'] !== $user['password']) {
          $this->message = 'Вы ввели не верный пароль!';
        } else {
          $_SESSION['user'] = $user;
          $this->message = 'Вы успешно вошли в аккаунт! Можете перейти на <a href="/">Главную страницу</a>';
        }
      }
      // Если нажата кнопка ВЫЙТИ ИЗ АККАУНТА, то удаляем авторизацию пользователя
      if (isset($_POST['out'])) {
        unset($_SESSION['user']);
        $this->message = "Вы вышли из аккаунта";
      }
    }
    //Генерация страницы РЕГИСТРАЦИЯ
    public function action_index() {
      $this->content = $this->templator('./views/v_auth.php',
        array(
          'titleContent' => $this->titleContent,
          'messageError' => $this->message
        ));
    }
    //Генерация страницы АВТОРИЗАЦИЯ
    public function action_login() {
      $this->content = $this->templator('./views/v_login.php',
        array(
          'titleContent' => $this->titleContent,
          'messageError' => $this->message
      ));
    }
  }
?>
