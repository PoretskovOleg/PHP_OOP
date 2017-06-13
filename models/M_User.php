<?php
  namespace models;
  use models\db;

  class M_User {

    static public function setUser($login, $pass) {
      $query = "INSERT INTO customers (login, password) VALUES ('$login', '$pass')";
      db::getInstance()->query($query);
    }

    static public function findUser($login) {
      $query = "SELECT id, login, password FROM customers WHERE login = '$login'";
      $user = db::getInstance()->select($query);
      return $user[0];
    }
  }
?>
