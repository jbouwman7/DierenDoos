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
        showTemplate('shops/shop.twig',[
            'items' => $items,
        ]);
    }

    public function shopPost()
    {
            $item = R::dispense('shoppingcart');
            $item->userId = $_SESSION['user']['id'];
            $item->itemId = $_POST['itemId'];
            $item->amount = $_POST['amount'];
            R::store($item);
            header('../shop/shop');
    }
}
