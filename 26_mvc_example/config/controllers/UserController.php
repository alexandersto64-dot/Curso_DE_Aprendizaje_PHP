<?php

require_once __DIR__ . '/../models/User.php';

class UserController
{
    public function index()
    {
        $userModel = new User();

        $users = $userModel->getAllUsers();

        require_once __DIR__ . '/../views/user_view.php';
    }
}
