<?php

use App\Models\Menu;

$mod_footermenu = Menu::where([['position', '=', 'footermenu'], ['status', '=', 1]])
   ->orderBy('sort_order', 'ASC')
   ->get();
?>

<h3 class="widgettilte">
   <strong><a href="index.php?option=contact">Liên hệ</a></strong>
</h3>
<ul class="footer-menu">
   <?php foreach ($mod_footermenu as $rowmenu) : ?>
      <li><a href="<?= $rowmenu->link; ?>"><?= $rowmenu->name; ?></a></li>
   <?php endforeach; ?>
</ul>