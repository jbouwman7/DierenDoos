<?php

class ShopController extends BaseController
{

    public function index()
    {
        showTemplate('shops/index.twig');
    }
}
