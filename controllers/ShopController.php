<?php

class ShopController extends BaseController
{
    public function index()
    {
        $categories = R::findAll('categories');
        $items = R::findAll('shopitems');
        showTemplate('shops/index.twig', [
            "categories" => $categories,
            "items" => $items,
        ]);

        showTemplate('shops/index.twig');
    }
}
