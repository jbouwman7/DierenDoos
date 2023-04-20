<?php

class ShopController extends BaseController
{
    public function index()
    {
        $items = R::findAll('shopitems');
        $users = R::findAll('users');
        showTemplate('shops/index.twig', [
            "users" => $users,
            "items" => $items,
        ]);

        showTemplate('shops/index.twig');
    }


}
