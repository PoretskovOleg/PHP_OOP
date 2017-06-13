<?php
  namespace controllers;

  abstract class C_Controller {
    abstract protected function before();
    abstract protected function render();

    public function Request($action) {
      $this -> before();
      $this -> $action();
      $this -> render();
    }

    protected function templator($temlate, $vars=array()) {
      foreach ($vars as $key => $value) {
        $$key = $value;
      }
      ob_start();
      include $temlate;
      return ob_get_clean();
    }

    public function __call($url, $method) {
      die('Page NOT FOUND');
    }
  }
?>