<?php

namespace App\Controllers;
use App\Connection\Db;
use App\Modules\Module;
use App\Modules\ModuleAssurer;

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
        if (!isset($_SESSION['user'], $_SESSION['user']['type']) && empty($_SESSION['user']['obj']) && $_SESSION['user']['type'] == 'formateur') {
            require_once('views/404.php');
            die();
        }
        $user = unserialize($_SESSION['user']['obj']);
        $userType = $_SESSION['user']['type'];
        $filieres = $user->getFiliere($this->db->connection());
        $modules = [];
        $competenses = [];
        $idFiliere = null;
        $idModule = null;
        $idCompetence = null;
        if (isset($_SESSION['examen']['idFiliere']) && !empty($_SESSION['examen']['idFiliere'])) {
            $idFiliere = $_SESSION['examen']['idFiliere'];
            $modules = ModuleAssurer::getModulesByFiliereFormateur($this->db->connection(), $idFiliere, $user->getId());
        }
        if (isset($_SESSION['examen']['idModule']) && !empty($_SESSION['examen']['idModule'])) {
            $idModule = $_SESSION['examen']['idModule'];
            $module = Module::findById($this->db->connection(), $idModule);
           

            $competenses = $module->getCompetence($this->db->connection(), $idModule, $user->getId());
        }
        require_once 'views/dashboard/examen/add.php';
    }
    public function store()
    {
        if (!isset($_SESSION['user']) && empty($_SESSION['user']['obj']) && $_SESSION['user']['type'] == 'formateur') {
            require_once('views/404.php');
            die();
        }
        $user = unserialize($_SESSION['user']['obj']);
        if (isset($_POST['filiere'])) {
            $_SESSION['examen']['idFiliere'] = $_POST['filiere'];
            header('location:add');
        }
        if (isset($_POST['module'])) {
            $_SESSION['examen']['idModule'] = $_POST['module'];
            header('location:add');
        }
        if (isset($_POST['competence'])) {
            $_SESSION['examen']['idCompetence'] = $_POST['competence'];
            header('location:add');
        }

    }
    public function show()
    {
        if (!isset($_SESSION['user']) && empty($_SESSION['user']['obj']) && $_SESSION['user']['type'] == 'formateur') {
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