<?php
require_once 'vendor/autoload.php';

$r = R::setup('mysql:host=localhost;dbname=dierendoos', 'bit_academy', 'bit_academy');
R::nuke();

$users = [
    [
        'username' => 'admin',
        'password' => 'admin',
    ],
    [
        'username' => 'test',
        'password' => 'test',
    ],
    [
        'username' => 'persoon1',
        'password' => 'wachtwoord',
    ],
];

$categories = [
    [
        'name'  => 'hond',
        'image' => '646f672e706e67.png',
    ],
    [
        'name'  => 'kat',
        'image' => '6361742e706e67.png',
    ],
    [
        'name'  => 'knaagdieren',
        'image' => '6b6e61616764696572656e2e706e67.png',
    ],
    [
        'name'  => 'reptielen',
        'image' => '7265707469656c656e2e706e67.png',
    ],
];

$shop_items = [
    [
        'name'          => 'voedsel1',
        'description'   => 'Dit is voedsel voor iets levends',
        'price'         => 9.99,
        'image'         => '7465737470726f64756374312e6a7067.jpeg',
        'category'      => 'hond'
    ],
    [
        'name'          => 'iets',
        'description'   => 'Dit is iets',
        'price'         => 4.99,
        'image'         => '1543518615468184919415181.png',
        'category'      => 'kat'
    ]
];


foreach ($users as $r) {
    $user = R::dispense('users');
    $user->username = $r['username'];
    $user->password = password_hash($r['password'], PASSWORD_DEFAULT);
    R::store($user);
}

foreach ($categories as $r) {
    $cat = R::dispense('categories');
    $cat->name = $r['name'];
    $cat->image = $r['image'];
    R::store($cat);
}

foreach ($shop_items as $r) {
    $item = R::dispense('shopitems');
    $item->name = $r['name'];
    $item->description = $r['description'];
    $item->price = $r['price'];
    $item->image = $r['image'];
    $item->category = $r['category'];
    R::store($item);
}

echo count($users) . " rows inserted" . PHP_EOL;
echo count($categories) . " rows inserted" . PHP_EOL;
echo count($shop_items) . " rows inserted" . PHP_EOL;
