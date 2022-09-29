<?php

namespace App\Controllers;

class DashboardController
{
    public function show()
    {
        if (!isset($_SESSION['user']) && empty($_SESSION['user']['obj'])) {
            require_once('views/404.php');
            die();
        }
        $user = unserialize($_SESSION['user']['obj']);
        $userType = $_SESSION['user']['type'];
        require_once 'views/dashboard/index.php';
    }
}