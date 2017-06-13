<?php
  include 'autoload.php';
  include 'config.php';
  
  use controllers\C_Index;
  use controllers\C_Catalog;
  use controllers\C_Auth;
  use models\db;

  db::getInstance()->connect(HOST, LOGIN, PASS, DBASE);
  session_start();

  $action = 'action_';
  $action.= isset($_GET['action']) ? $_GET['action'] : 'index';
  
  switch ($_GET['page']) {
    case 'catalog':
      $controller = new C_Catalog();
      break;
    case 'auth':
      $controller = new C_Auth();
      break;
    default:
      $controller = new C_Index();
      break;
  }

  $controller->Request($action);
  db::getInstance()->close();
?>
