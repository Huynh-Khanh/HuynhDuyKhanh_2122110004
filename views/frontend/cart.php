<?php

use App\Models\Product;

use App\Libraries\Cart;
$listcart = Cart::cartContent();
if (isset($_REQUEST['addcart'])) {require_once 'views/frontend/cart-addcart.php';}
else{
   if(isset($_REQUEST['updatecart']))
   {
      require_once 'views/frontend/cart-updatecart.php';
   }
   else
   {
      if(isset($_REQUEST['deletecart']))
      {
         require_once 'views/frontend/cart-deletecart.php';
      }else{
      require_once 'views/frontend/cart-cartcontent.php';
      }
   }
}
