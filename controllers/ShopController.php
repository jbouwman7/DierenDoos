<?php

class ShopController extends BaseController
{
    public function index()
    {
        $users = R::findAll('users');

        showTemplate('shops/index.twig', [
            "users" => $users,
        ]);
    }

    public function item()
    {
        showTemplate('shops/item.twig');
    }

    public function create()
    {
        $var = "tes";
        showTemplate('shops/item.twig', [
        "test" => $var,]);
    }


}
