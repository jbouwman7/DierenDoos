<?php

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
        if ($_POST['addCart']) {
            
        }
    }
}
