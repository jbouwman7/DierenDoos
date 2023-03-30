<?php

// class UserController extends BaseController
// {
//     private $error = '';
//     private array $users;

//     public function __construct()
//     {
//         $this->users = R::findAll('users');
//     }

//     public function login()
//     {
//         if (isset($_SESSION['errors']['login'])) {
//             $this->error = $_SESSION['errors']['login'][0];
//             unset($_SESSION['errors']);
//         }

//         showTemplate('users/login.twig', [
//             'users' => $this->users,
//             'error' => $this->error,
//         ]);
//     }

//     public function loginPost()
//     {
//         $userChecked = $this->validUser();

//         if ($userChecked) {
//             $this->loginUser();
//             header('location:../binsta');
//         } else {
//             $_SESSION['errors']['login'][] = "Invalid username or password";
//             header('location:login');
//         }
//     }

//     public function register()
//     {
//         if (isset($_SESSION['errors']['register'])) {
//             $this->error = $_SESSION['errors']['register'][0];
//             unset($_SESSION['errors']);
//         }

//         showTemplate('users/register.twig', [
//             'error' => $this->error,
//         ]);
//     }

//     public function registerPost()
//     {
//         if ($this->validRegister()) {
//             $user = R::dispense('users');
//             $user->username = $_POST['username'];
//             $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//             R::store($user);
//             header('location:login');
//         } else {
//             $this->validRegister();
//             header('location:register');
//         }
//     }
// }
