<?php

declare(strict_types=1);

namespace App\Modules;
use App\Connection\Db;
use App\Modules\Competence;
use PDO;

class Module
{

    /** @var int */
    private int $id;

    /** @var int */
    private int $id_filiere;

    /** @var string */
    private string $label;
    private Db $db;

    /**
     * Default constructor
     */
    public function __construct()
    {
        $this->db = new Db();

    }

    public static function construct(int $id, string $label  , int $id_filiere)
    {
        $obj = new Module();
        $obj->setId($id);
        $obj->setlabel($label);
        $obj->setId_filiere($id_filiere);
        return $obj;
    }

    /**
     * @return void
     */
    public function save()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [void
     */
    public function update()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return bool
     */
    public function delete(): bool
    {
        // TODO implement here
        return false;
    }

    /**
     * @return void
     */
    public function all()
    {
        // TODO implement here
        return null;
    }

    /**
     * @param  $id 
     * @return [void
     */
    public static function findById(PDO $conn, int $id): Module|bool
    {
        try {
            $query = "SELECT * FROM `MODULE` WHERE `id` = ?";
            $pdoS = $conn->prepare($query);

            $pdoS->execute([
                $id
            ]);

            if ($pdoS->rowCount() > 0) {
                $module_row = $pdoS->fetch();
                return Module::construct($module_row->id, $module_row->label , $module_row->id_filiere);
            }

            return false;
        }
        catch (\Throwable $th) {
            print_r($th);
            return false;
        }
    }

    /**
     * @return void
     */
    public function formateurs()
    {
        // TODO implement here
        return null;
    }
    public function getCompetence()
    {
        try {
            $query = "SELECT * FROM `COMPETENCE` WHERE `id_module` = ?";
            $pdoS = $this->db->connection()->prepare($query);

            $pdoS->execute([
                $this->id
            ]);
            $competence = $pdoS->fetchAll(PDO::FETCH_CLASS, Competence::class);
            return $competence;
        }
        catch (\Throwable $th) {
            print_r($th);
            return [];
        }
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of label
     */
    public function getlabel()
    {
        return $this->label;
    }

    /**
     * Set the value of label
     *
     * @return  self
     */
    public function setlabel($label)
    {
        $this->label = $label;

        return $this;
    }



    /**
     * Get the value of id_filiere
     */ 
    public function getId_filiere()
    {
        return $this->id_filiere;
    }

    /**
     * Set the value of id_filiere
     *
     * @return  self
     */ 
    public function setId_filiere($id_filiere)
    {
        $this->id_filiere = $id_filiere;

        return $this;
    }
}
