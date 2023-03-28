<?php

class BaseController
{
    public function getBeanById($typeOfBean, $queryStringKey)
    {
        $bean = R::findOne($typeOfBean, 'id =' . $queryStringKey);
        return $bean;
    }

    public function validUser()
    {
        $users = R::findAll('users');
        foreach ($users as $user) {
            if ($user['username'] == $_POST['username']) {
                if (password_verify($_POST['password'], $user['password'])) {
                    $userChecked = R::findOne('users', 'username = ? AND password = ? ', [$user['username'], $user['password']]);
                }
            }
        }
        return $userChecked;
    }

    public function authorizeUser()
    {
        if (!isset($_SESSION['user'])) {
            header('location:../user/login');
            exit;
        }
    }

    public function loginUser()
    {
        $userChecked = $this->validUser();
        $_SESSION['user']['id'] = $userChecked['id'];
        $_SESSION['user']['name'] = $userChecked['username'];
    }

    public function validRegister()
    {
        unset($_SESSION['errors']);
        if ($_POST['username'] == '' || $_POST['password'] == '') {
            $_SESSION['errors']['register'][] = 'All fields are required';
        }

        $user = R::FindOne('users', 'username = ? ', [$_POST['username']]);

        if ($_POST['username'] == $user['username']) {
            $_SESSION['errors']['register'][] = 'Username is already in use';
        }

        if ($_POST['password'] != $_POST['r-password']) {
            $_SESSION['errors']['register'][] = 'Passwords did not match';
        }

        return empty($_SESSION['errors']);
    }

    public function validAccountEdit()
    {
        unset($_SESSION['errors']);
        if ($_POST['username'] == '') {
            $_SESSION['errors']['edit'][] = 'Username is required';
        }

        $user = R::FindOne('users', 'username = ? AND username != ?', [$_POST['username'], $_SESSION['user']['name']]);

        if ($user['username']) {
            $_SESSION['errors']['edit'][] = 'Username is already in use';
        }

        if ($_POST['password'] != $_POST['r-password']) {
            $_SESSION['errors']['edit'][] = 'Passwords did not match';
        }

        return empty($_SESSION['errors']);
    }

    public function moveUploadedImg()
    {
        $tmpName = $_FILES['img']['tmp_name'];
        $name = strtolower(basename($_FILES['img']['name']));
        $targetDir = "$_SERVER[DOCUMENT_ROOT]/public/uploads/$name";
        move_uploaded_file($tmpName, "$targetDir");
    }

    public function editAccount()
    {
        $user = R::load('users', $_SESSION['user']['id']);
        $user->id = $user['id'];

        $user->username = $_POST['username'];
        if ($_POST['password'] != '') {
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        R::store($user);
    }

    public function loadAccount()
    {
        $_SESSION['user']['name'] = $_POST['username'];
    }

    public function validCreateItem()
    {
        unset($_SESSION['errors']);
        if ($_POST['name'] == '' || $_POST['description'] == '' || $_POST['price'] == '' || $_POST['image'] == '' || $_POST['category'] == '') {
            $_SESSION['errors']['items'][] = 'All fields are required';
        }

        if (strlen($_POST['description']) > 300) {
            $_SESSION['errors']['items'][] = "Description can't be longer than 300 characters";
        }

        $items = R::FindOne('shop_items', 'name= ? ', [$_POST['name']]);

        if ($_POST['name'] == $items['name']) {
            $_SESSION['errors']['items'][] = 'Name is already in use';
        }

        return empty($_SESSION['errors']);
    }

    public function validCreateCategories()
    {
        unset($_SESSION['errors']);
        if ($_POST['name'] == '' || $_POST['description'] == '' || $_POST['price'] == '' || $_POST['image'] == '' || $_POST['category'] == '') {
            $_SESSION['errors']['categories'][] = 'All fields are required';
        }

        if (strlen($_POST['description']) > 300) {
            $_SESSION['errors']['categories'][] = "Description can't be longer than 300 characters";
        }

        $categories = R::FindOne('categories', 'name= ? ', [$_POST['name']]);

        if ($_POST['name'] == $categories['name']) {
            $_SESSION['errors']['categories'][] = 'Name is already in use';
        }

        return empty($_SESSION['errors']);
    }
}
