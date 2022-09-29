<?php

declare(strict_types=1);

namespace App\Modules;

use App\Modules\Examen;
use App\Modules\Filiere;
use PDO;
class Formateur
{

    /** @var int id    */
    private int $id;

    /** @var string */
    private string $nom;

    /** @var string */
    private string $email;

    /** @var string */
    private string $password;

    /**
     * Default constructor
     */
    public function __construct(int $id, string $nom, string $email, string $password)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return [object Object]
     */
    public function save()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return [object Object]
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
     * @return array
     */
    public static function all(): array
    {
        // TODO implement here
        return [];
    }

    /**
     * @return [object Object]
     */
    public static function findByid(int $id)
    {
        // TODO implement here
        return $id;
    }

    /**
     * @return array
     */
    public function modules(): array
    {
        // TODO implement here
        return [];
    }

    // login

    public static function login(PDO $conn, string $email, string $password)
    {
        try {
            $query = "SELECT * FROM `FORMATEUR` WHERE `email` = ? ";
            $pdoS = $conn->prepare($query);

            $pdoS->execute([
                $email
            ]);
            if ($pdoS->rowCount() > 0) {
                $formateur_row = $pdoS->fetch();

                if ($formateur_row->password == $password) {
                    return new self(
                        $formateur_row->id,
                        $formateur_row->nom,
                        $formateur_row->email,
                        $formateur_row->password
                        );
                }
            }
            return false;
        }
        catch (\Throwable $th) {
            print_r($th);
            return false;
        }
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getid()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setid($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    public function getExamen(PDO $conn)
    {
        try {
            $query = "SELECT * FROM `EXAMEN` WHERE `id_formatuer` = ?";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([
                $this->id
            ]);
            return $pdoS->fetchAll(PDO::FETCH_CLASS, Examen::class);
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }
    public function getFiliere(PDO $conn)
    {
        try {
            $query = "SELECT * FROM `FILIERE` 
            WHERE id in (select ff.id_filiere from FORMATEUR_FILIERE ff WHERE ff.id_formatuer = ?)";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([
                $this->id
            ]);
            return $pdoS->fetchAll(PDO::FETCH_CLASS, Filiere::class);
        }
        catch (\Throwable $th) {
            throw $th;
        }
    }
}