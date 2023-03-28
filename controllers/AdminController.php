<?php

class AdminController extends BaseController
{
    public function items()
    {
        showTemplate('admin/items.twig');
    }

    public function itemsPost()
    {
        // Verwerk hier post
        if ($this->validCreateItem()) {
            $item = R::dispense('shop_items');
            $item->name = $_POST['name'];
            $item->name = $_POST['description'];
            $item->name = $_POST['price'];
            $item->name = $_POST['image'];
            $item->name = $_POST['category'];

            R::store($item);
            header('location:../shops/index');
        } else {
            $this->validCreateItem();
            header('location:items');
        }
    }


    public function categories()
    {
        showTemplate('admin/categories.twig');
    }

    public function categoriesPost()
    {
        if ($this->validCreateCategories()) {
            $categorie = R::dispense('categories');
            $categorie->name = $_POST['name'];
            $categorie->image = $_POST['image'];

            R::store($categorie);
            header('location:../shops/index');
        } else {
            $this->validCreateCategories();
            header('location:categories');
        }
    }
    // Maak hier alles aan voor de categories
}
