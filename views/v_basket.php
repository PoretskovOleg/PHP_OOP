<p><a href="/">Главная</a> / <a href="./index.php?page=catalog">Каталог</a> / Корзина</p>
<div class="header">
  <h1><?=$titleContent?></h1>
</div>
<ul>
  <? foreach ($goods as $product) :?>
    <li>
      <?=$product['name']?>: <?=$product['quantity']?> ед., цена - <?=$product['price']?>, стоимость - <?=$product['total']?> руб. <br>
      <form action="./index.php?page=basket&id=<?=$product['id']?>" method="POST">
        <label>Количество</label>
        <input type="number" name="quantity" value="1">
        <button type="submit" name="btn_change">Изменить</button>
      </form>
      <form action="./index.php?page=basket&id=<?=$product['id']?>" method="POST">
        <button type="submit" name="btn_delete">Удалить</button>
      </form>
    </li>
  <? endforeach; ?>
</ul>
<span> Общая стоимость: <?=$sumGoodsInBasket?> руб. </span>
<div>
  <form action="" method="POST">
    <button type="submit" name="btn_to_order">Оформить заказ</button>
  </form>
</div>
