<?php

declare(strict_types=1);
namespace App\Modules;

use PDO;
class Competence
{

    /** @var int */
    private int $id;
    /** @var int */
    private int $id_module;

    /** @var String */
    private string $label;

    /**
     * Default constructor
     */
    public function __construct()
    {
       
    }
    public static function construct(int $id, string $label , int $id_module)
    {
        $obj = new Competence();
        $obj->setId($id) ;
        $obj->setlabel($label);
        $obj->setId_module($id_module);
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
     * @return void
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
    public static function all()
    {
        // TODO implement here
        return null;
    }

    /**
     * @param int $id 
     * @return Competence|bool
     */
    public static function findById(PDO $conn, int $id)
    {
        try {
            $query = "SELECT * FROM `COMPETENCE` WHERE  `id` = ?";
            $pdoS = $conn->prepare($query);

            $pdoS->execute([
                $id
            ]);

            if ($pdoS->rowCount() > 0) {
                $competence_row = $pdoS->fetch();
                return  Competence::construct($competence_row->id, $competence_row->label,$competence_row->id_module);
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
    public function module()
    {
        // TODO implement here
        return null;
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
     * Get the value of id_module
     */ 
    public function getId_module()
    {
        return $this->id_module;
    }

    /**
     * Set the value of id_module
     *
     * @return  self
     */ 
    public function setId_module($id_module)
    {
        $this->id_module = $id_module;

        return $this;
    }
}
