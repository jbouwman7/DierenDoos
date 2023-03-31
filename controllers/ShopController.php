<?php

class ShopController extends BaseController
{
    public function index()
    {
        $categories = R::findAll('categories');
        $items = R::findAll('shopitems');
        $users = R::findAll('users');
        showTemplate('shops/index.twig', [
            "users" => $users,
            "categories" => $categories,
            "items" => $items,
        ]);
    }


}