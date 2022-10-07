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


            }
            elseif ($type === 'staigaire') {
                $user = Stagiaire::login($this->db->connection(), $email, $password);
            }
            print_r($user);
            if ($user) {
                header('location:dashboard');
                $_SESSION['user']['obj'] = serialize($user) ;
                $_SESSION['user']['type'] = $type;
                return;
            }
            header('location:login?status=error');

        }
        else {
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
        session_unset();
        session_destroy();
        header('location:login');
    }
}
