<?php
  namespace controllers;
  use models\M_Goods;

  class C_Catalog extends C_Base {
    private $goods;
    private $basketGoods;
    private $quantity;
    private $sumBasket;
    private $quantityGoodsInCatalog;

    public function __construct() {
      parent::__construct();
    }

    protected function before() {
      $this->title = 'Cтраница Товаров';
      $this->titleContent = 'КАТАЛОГ ТОВАРОВ';

      if (isset($_POST['buy']) && isset($_SESSION['user'])) {
        M_Goods::setBasket($_GET['quantity'],$_GET['id']);
      }

      if (isset($_POST['add'])) {
        $this->quantityGoodsInCatalog = $_GET['quantity'] + 2;
      } else { $this->quantityGoodsInCatalog = $_GET['quantity']; }

      $this->goods = M_Goods::getGoods($this->quantityGoodsInCatalog);

      if ($_SESSION['user']) {
        $this->quantity = isset($_COOKIE['basket']) ? count($_COOKIE['basket']) - 1 : '0';
        $this->sumBasket = isset($_COOKIE['basket']) ? $_COOKIE['basket']['sum'] : '0';
      } else {
        $this->quantity = 0;
        $this->sumBasket = 0;
      }

      if ($_GET['action'] == 'basket') {
        $this->basketGoods = isset($_COOKIE['basket']) ? M_Goods::getBasketGoods($_COOKIE['basket']) : array();
      }
    }

    public function action_index() {
      if (isset($_POST['buy']) && !$_SESSION['user']) {
        $this->content = 'Сначала нужно зарегистрироваться!';
      } else {
        $this->content = $this->templator('./views/v_catalog.php',
        array(
          'titleContent' => $this->titleContent,
          'goods' => $this->goods,
          'quantityGoodsInBasket' => $this->quantity,
          'sumGoodsInBasket' => $this->sumBasket
        ));
      }
    }

    public function action_basket() {
      if ($_SESSION['user']) {
        $this->content = $this->templator('./views/v_basket.php',
          array(
            'titleContent' => 'КОРЗИНА ТОВАРОВ',
            'goods' => $this->basketGoods,
            'sumGoodsInBasket' => $this->sumBasket
          ));
      } else {
        $this->content = 'Сначала нужно зарегистрироваться!';
      }
    }
  }
?>