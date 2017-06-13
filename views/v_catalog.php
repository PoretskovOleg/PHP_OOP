<div class="catalog">
  <h1><?=$titleContent?></h1>
  <p>В Вашей <a href="./index.php?page=catalog&action=basket">КОРЗИНЕ</a> <?=$quantityGoodsInBasket?> товаров на сумму <?=$sumGoodsInBasket?> рублей</p>
  <ul>
    <?php foreach ($goods as $product) :?>
      <li>
        <?=$product['name']?> - <?=$product['price']?> рублей  
        <form action="./index.php?page=catalog&id=<?=$product['id']?>&quantity=<?=count($goods)?>" method="POST">
          <button type="submit" name="buy"> КУПИТЬ </button>
        </form>
      </li>
    <?php endforeach ?>
  </ul>
  <form action="./index.php?page=catalog&quantity=<?=count($goods)?>" method="POST">
    <button type="submit" name="add">Показать ЕЩЕ</button>
  </form>
</div>
