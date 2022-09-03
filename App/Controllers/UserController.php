<?php

namespace App\Controllers;

use App\Models\UserModel;
use JetBrains\PhpStorm\NoReturn;

class UserController extends BaseController
{
    /**
     * @return void
     */
    public function index()
    {
        echo "<h2>Here the " . __METHOD__ . " method will be implemented</h2>";
    }

    /**
     * @return void
     */
    public function create(): void
    {
        $isCreated = UserModel::createUser($_POST);

        if ($isCreated) {
            header('Location: ' . $_ENV['APP_URL'] . 'user');
            exit(0);
        }

        echo "An error occurred while creating the user";
        exit(1);
    }

    /**
     * @return bool
     */
    #[NoReturn] public function update(): void
    {
        if (empty($_POST)) {
            $lastUser = current(UserModel::getLastOne());
            $this->view('user/update', $lastUser);
            exit(0);
        }
        $isUpdate = UserModel::updateUser($_POST);

        if ($isUpdate) {
            header('Location: ' . $_ENV['APP_URL'] . 'user');
            exit(0);
        }

        echo "An error occurred while updating the user";
        exit(1);
    }

    /**
     * @return void
     */
    public function login()
    {
        echo "<h2>Here the " . __METHOD__ . " method will be implemented</h2>";
    }

    /**
     * @return void
     */
    public function delete()
    {
        echo "<h2>Here the " . __METHOD__ . " method will be implemented</h2>";
    }


    /**
     * @return bool
     */
    public function register(): bool
    {
        return $this->view('user/register', []);
    }


}