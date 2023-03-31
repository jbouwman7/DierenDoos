<?php

class ShopController extends BaseController
{

    public function index()
    {
        $var = "je meoder";
        $getFucked = "got fucked";
        $who = ['iets', 'anders'];
        showTemplate('shops/index.twig', [
            "error" => $var,
            "ietsAnders" => $getFucked,
            "whoThis" => $who,
        ]);
    }
}
