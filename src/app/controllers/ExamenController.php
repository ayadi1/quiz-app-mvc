<?php

namespace App\Controllers;

use App\Connection\Db;
use App\Modules\Examen;
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
        if (isset($_SESSION['examen']['idCompetence'])) {
            $idCompetence = $_SESSION['examen']['idCompetence'];
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
        if (isset($_POST['label'], $_POST['competence'], $_POST['datePassation'])) {
            $label = $_POST['label'];
            $competence = $_POST['competence'];
            $datePassation = $_POST['datePassation'];
            // validation start
            $isValid = true;
            if (empty($label)) {
                $_SESSION['errors']['addExam']['label'] = 'label is required';
                $isValid = false;
            }
            if (strlen($label) > 255) {
                $_SESSION['errors']['addExam']['label'] = 'The label is too long "max:255"';
                $isValid = false;
            }
            if (empty($datePassation)) {
                $_SESSION['errors']['addExam']['datePassation'] = 'date de passation is required';
                $isValid = false;
            }
            if (empty($competence)) {
                $_SESSION['errors']['addExam']['competence'] = 'competence is required';
                $isValid = false;
            }
            if ($isValid) {
                Examen::create($this->db->connection(), $label, $competence, $datePassation, $user->getId());
                header('location:../examen');
            }
            else {
                header('location:' . $_SERVER['HTTP_REFERER']);
            }
        // validation end

        }

    }
    public function show()
    {
        if (!isset($_SESSION['user']) && empty($_SESSION['user']['obj']) && $_SESSION['user']['type'] == 'formateur') {
            require_once('views/404.php');
            die();
        }
        $user = unserialize($_SESSION['user']['obj']);
        $examens = $user->getExamen($this->db->connection());
        require_once 'views/dashboard/examen/index.php';
    }
    public function edit()
    {
    }
    public function update(...$args)
    {
        if (!isset($args['id'], $_POST['label'], $_POST['datePassation'])) {
            require_once('views/404.php');
            die();
        }
        $id = $args['id'];
        $label = $_POST['label'];
        $datePassation = $_POST['datePassation'];
        $examen = Examen::findById($this->db->connection(), $id);

        if ($examen) {
            $examen[0]->update($this->db->connection(), $label, $datePassation);
            header('location:' . $_SERVER['HTTP_REFERER']);
        }



    }
    public function destroy()
    {
    }
}