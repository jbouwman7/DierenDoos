<?php

use RedBeanPHP\Util\Dump;

class ShopController extends BaseController
{
    public function index()
    {

        showTemplate('shops/index.twig');
    }

    public function shop()
    {
        $items = R::findAll('shopitems');
        showTemplate('shops/shop.twig', [
            'items' => $items,
        ]);
    }
    public function shopPost()
    {
        if (isset($_SESSION['user']['id'])) {
            $item = R::dispense('shoppingcart');
            $item->userId = $_SESSION['user']['id'];
            $item->itemId = $_POST['itemId'];
            $item->amount = $_POST['amount'];
            R::store($item);
        }
        header('../shop/shop');
    }
    public function cart()
    {
        $cart = R::findAll('shoppingcart');
        $i = 0;
        foreach ($cart as $item) {
            $name = R::find('shopitems', $item[2]);
            echo $item[2];
            $cart[$i][2] = $name;
            $i++;
        }
        showTemplate('shops/cart.twig', [
            'cart' => $cart,
        ]);
    }
}
