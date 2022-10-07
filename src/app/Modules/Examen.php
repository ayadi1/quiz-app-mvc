<?php

declare(strict_types=1);
namespace App\Modules;

use PDO;

class Examen
{

    /** @var int */
    private int $id;

    /** @var int */
    private int $id_competence;

    /** @var int */
    private int $id_formatuer;

    /** @var string */
    private string $label;

    /** @var string */
    private string $dateCreation;

    /** @var string */
    private string $datePassation;
    /**
     * Default constructor
     */
    public function __construct()
    {
    // ...
    }

    /**
     * @return void
     */
    public function save(PDO $conn)
    {
        try {
            $query = "UPDATE `EXAMEN` SET `label`=?,`datePassation`=? WHERE `id` = ?";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([
                $this->label,
                $this->datePassation,
                $this->id,
            ]);

        }
        catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * @return void
     */
    public function update(PDO $conn, string $label, string $datePassation)
    {
        $this->setDatePassation($datePassation);
        $this->setlabel($label);
        $this->save($conn);
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
     * @return array | bool
     */
    public static function findById(PDO $conn, int $id)
    {
        try {
            $query = "SELECT * FROM `EXAMEN` WHERE `id` = ?";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([
                $id
            ]);
            return $pdoS->fetchAll(PDO::FETCH_CLASS, Examen::class);
        }
        catch (\Throwable $th) {
            return false;
        }

    }

    public static function create(PDO $conn, string $label, $competence, string $datePassation, $idFormatuer)
    {

        try {
            $query = "INSERT INTO `EXAMEN`(`id_competence`, `id_formatuer`, `label`, `dateCreation`, `datePassation`) VALUES (?,?,?,?,?)";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([
                $competence,
                $idFormatuer,
                $label,
                date('Y-m-d'),
                $datePassation
            ]);
            return true;
        }
        catch (\Throwable $th) {
            throw $th;
        }
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
     * Get the value of id_formatuer
     */
    public function getId_formatuer()
    {
        return $this->id_formatuer;
    }

    /**
     * Set the value of id_formatuer
     *
     * @return  self
     */
    public function setId_formatuer($id_formatuer)
    {
        $this->id_formatuer = $id_formatuer;

        return $this;
    }

    /**
     * Get the value of id_competence
     */
    public function getId_competence()
    {
        return $this->id_competence;
    }

    /**
     * Set the value of id_competence
     *
     * @return  self
     */
    public function setId_competence($id_competence)
    {
        $this->id_competence = $id_competence;

        return $this;
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
     * Get the value of dateCreation
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     *
     * @return  self
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get the value of datePassation
     */
    public function getDatePassation()
    {
        return $this->datePassation;
    }

    /**
     * Set the value of datePassation
     *
     * @return  self
     */
    public function setDatePassation($datePassation)
    {
        $this->datePassation = $datePassation;

        return $this;
    }
}