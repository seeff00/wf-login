<?php

namespace App\Controller;

use App\Model\User;
use App\Repository\DB;
use App\Repository\UserRepository;

class UserController extends BaseController
{
    public function index()
    {
        $this->render('user/index', $_COOKIE);
    }

    public function login()
    {
        if (isset($_COOKIE["is_logged"]) && $_COOKIE["is_logged"]) {
            header("Location: /");
            die();
        }

        $this->render('user/login', $_COOKIE);
    }

    public function loginPost()
    {
        $email = trim($_POST['email']);
        $pass = $_POST['password'];

        $userRepo = new UserRepository(DB::getInstance());
        $user = $userRepo->getByEmailAndPass($email, hash_hmac('sha256', $pass, "mysecretkey"));

        header("Content-Type: application/json");
        echo json_encode($user);
    }

    public function register()
    {
        if (isset($_COOKIE["is_logged"]) && $_COOKIE["is_logged"]) {
            header("Location: /");
            die();
        }

        $this->render('user/register', $_COOKIE);
    }

    public function registerPost()
    {
        header("Content-Type: application/json");

        $fname = trim($_POST['first_name']);
        $lname = trim($_POST['last_name']);
        $pass = $_POST['password'];
        $repeatPass = $_POST['repeat_password'];
        $email = trim($_POST['email']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email address";
            exit;
        }

        if ($pass !== $repeatPass) {
            echo "Passwords not match";
            exit;
        }

        if (strlen($pass) < 8) {
            echo "Password must be at least 8 characters";
            exit;
        }

        $newUser = new User();
        $newUser->setFirstName($fname);
        $newUser->setLastName($lname);
        $newUser->setPassword(hash_hmac('sha256', $pass, "mysecretkey"));
        $newUser->setEmail($email);
        $newUser->setCreatedAt(date('Y-m-d H:i:s', time()));

        $userRepo = new UserRepository(DB::getInstance());

        echo $userRepo->insert($newUser);
    }

    public function logout()
    {
        if (isset($_COOKIE["is_logged"]) && $_COOKIE["is_logged"]) {
            setcookie('is_logged', '', -1, '/');
            setcookie('user_name', '', -1, '/');

            header("Location: /");
            die();
        }
    }
}