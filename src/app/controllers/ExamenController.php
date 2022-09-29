<?php

namespace App\Controllers;
use App\Connection\Db;

class ExamenController
{

    private Db $db;
    public function __construct()
    {
        $this->db = new Db();
    }
    public function index()
    {
    }
    public function create()
    {
    }
    public function store()
    {
    }
    public function show()
    {
        if (!isset($_SESSION['user']) && empty($_SESSION['user']['obj'])) {
            require_once('views/404.php');
            die();
        }
        $user = unserialize($_SESSION['user']['obj']);
        $userType = $_SESSION['user']['type'];
        $examens = $user->getExamen($this->db->connection());
        require_once 'views/dashboard/examen/index.php';
    }
    public function edit()
    {
    }
    public function update()
    {
    }
    public function destroy()
    {
    }
}
