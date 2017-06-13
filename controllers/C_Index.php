<?php
  namespace controllers;

  class C_Index extends C_Base {

    public function __construct() {
      parent::__construct();
    }

    protected function before() {
      $this->title = 'Главная страница';
      $this->titleContent = 'Добро Пожаловать, '.($_SESSION['user'] ? $_SESSION['user']['login'] : 'Гость').', В Наш Интернет Магазин!';
    }

    public function action_index() {
      $this->content = $this->templator('./views/v_index.php', array('titleContent' => $this->titleContent));
    }
  }
?>