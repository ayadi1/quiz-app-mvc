<?php

namespace App\Controllers;

use App\Connection\Db;
use App\Modules\Formateur;
use App\Modules\Stagiaire;

class LoginController
{
    private Db $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    /**
     *
     * @return mixed
     */
    function index()
    {
    }

    /**
     *
     * @return mixed
     */
    function create()
    {
    }


    function store(): void
    {
        if (isset($_POST['email'], $_POST['password'], $_POST['type'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $type = $_POST['type'];
            $user = null;

            if ($type === 'formateur') {
                $user = Formateur::login($this->db->connection(), $email, $password);
                $_SESSION['user']['type'] = 'formateur';
            } elseif ($type === 'staigaire') {
                $user = Stagiaire::login();
                $_SESSION['user']['type'] = 'staigaire';
            }
            if ($user) {
                header('location:dashboard');
            }

        } else {
            header('location:login');

        }
    }

    /**
     *
     * @return mixed
     */
    function show()
    {
        require_once 'views/login.php';
    }

    /**
     *
     * @return mixed
     */
    function edit()
    {
    }

    /**
     *
     * @return mixed
     */
    function update()
    {
    }

    /**
     *
     * @return mixed
     */
    function destroy()
    {
    }
}