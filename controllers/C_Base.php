<?php
  namespace controllers;

  abstract class C_Base extends C_Controller {
    protected $content;
    protected $title;
    protected $titleContent = '';
    protected $header;
    protected $footer;

    public function __construct() {
      $this->header = $this->templator('./views/v_header.php',
        array('menu' => array(
          array('title' => 'Главная', 'page' => ''),
          array('title' => 'Каталог', 'page' => 'catalog'),
          array('title' => 'Регистрация', 'page' => 'auth'))));
      $this->footer = $this->templator('./views/v_footer.php');
    }

    protected function render() {
      $vars = array(
        'title' => $this->title, 
        'content' => $this->content,
        'header' => $this->header,
        'footer' => $this->footer
      );
      $page = $this->templator('./views/v_main.php', $vars);
      echo $page;
    }
  }
?>