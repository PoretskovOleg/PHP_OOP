<ul class="menu">
  <?php foreach ($menu as $item) : ?>
    <a href="./index.php?page=<?=$item['page']?>">
      <li class="menu_item"><?=$item['title']?></li>
    </a>
  <?php endforeach; ?>
</ul>
