<?php
  namespace models;
  use models\db;

  class M_Goods {

    static public function getGoods($num) {
      if (!$num) $num = 2;
      $query = "SELECT id, name, price FROM products LIMIT $num";
      $goods = db::getInstance()->select($query);
      return $goods;
    }

    static public function getGood($id) {
      $query = "SELECT * FROM products WHERE id = '$id'";
      $product = db::getInstance()->select($query);
      return $product;
    }

    static public function setBasket($quantityGoodsInCatalog, $productId, $quantity = 1) {
      $sum = $_COOKIE['basket']['sum'] + self::getGood($productId)[0]['price'];
      $quantity = $_COOKIE['basket']["$productId"] + $quantity;
      setcookie("basket[$productId]", "$quantity");
      setcookie("basket[sum]", "$sum");
      header("Location: ./index.php?page=catalog&quantity=$quantityGoodsInCatalog");
    }

    static public function getBasketGoods($cookieBasket) {
      unset($cookieBasket['sum']);
      foreach ($cookieBasket as $id => $quantity) {
        $arrayId[] = $id;
      }
      $query = 'SELECT id, name, price FROM products WHERE id IN ('.implode(',', $arrayId).')';
      $goods = db::getInstance()->select($query);
      foreach ($goods as $key => $product) {
        $goods[$key]['quantity'] = $cookieBasket[$product['id']];
        $goods[$key]['total'] = $cookieBasket[$product['id']] * $product['price'];
      }
      return $goods;
    }

  }
?>
