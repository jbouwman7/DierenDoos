<?php

class AdminController extends BaseController
{
    private $error;
    public function items()
    {
        if (isset($_SESSION['errors']['items'])) {
            $this->error = $_SESSION['errors']['items'][0];
            unset($_SESSION['errors']);
        }
        // Haal voor de items de categorieën op
        $categories = R::findAll('categories');
        showTemplate('admin/items.twig',[
            "categories" => $categories,
            "error" => $this->error,
        ]);
    }

    public function itemsPost()
    {
        if ($this->validCreateItem()) {
            $item = R::dispense('shopitems');
            $item->name = $_POST['name'];
            $item->description = $_POST['description'];
            $item->price = $_POST['price'];

            $fileType = substr($_FILES['image']['type'], strrpos($_FILES['image']['type'], '/') + 1);
            $item->image = strtolower(bin2hex($_FILES['image']['name']) . '.' . $fileType); 
            
            $item->category = $_POST['category'];
            
            R::store($item);
            $this->moveUploadedImg("items");
            header('location:items');
        } else {
            $this->validCreateItem();
            header('location:items');
        }
    }


    public function categories()
    {
        if (isset($_SESSION['errors']['categories'])) {
            $this->error = $_SESSION['errors']['categories'][0];
            unset($_SESSION['errors']);
        }
        showTemplate('admin/categories.twig',[
            "error" => $this->error,
        ]);
    }

    public function categoriesPost()
    {
        if ($this->validCreateCategories()) { 
 
            $categorie = R::dispense('categories');
            $categorie->name = $_POST['name'];

            $fileType = substr($_FILES['image']['type'], strrpos($_FILES['image']['type'], '/') + 1);
            $categorie->image = strtolower(bin2hex($_FILES['image']['name']) . '.' . $fileType); 
            
            
            R::store($categorie);
            $this->moveUploadedImg("categories");

            header('location:categories'); 
        } else {
            $this->validCreateCategories();
            header('location:categories');
        }
    }
}