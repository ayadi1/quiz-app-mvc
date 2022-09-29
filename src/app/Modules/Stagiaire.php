<?php

declare(strict_types=1);
namespace  App\Modules;

use PDO;
class Stagiaire
{

    /** @var int */
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
    public function __construct($id, $nom, $email, $password)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
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
     * @return array
     */
    public static function all(): array
    {
        // TODO implement here
        return [];
    }

    /**
     * @param int $id 
     * @return void
     */
    public static function findByid(int $id)
    {
        // TODO implement here

        return null;
    }

    /**
     * @return void
     */
    public function group()
    {
        // TODO implement here
        return null;
    }

    /**
     * @return void
     */
    public function filiere()
    {
        // TODO implement here
        return null;
    }
    // login

    public static function login(PDO $conn, string $email, string $password): Stagiaire | bool
    {
        try {
            $query = "SELECT * FROM `STAGIAIRE` WHERE `email` = ? ";
            $pdoS = $conn->prepare($query);
            $pdoS->execute([
                $email
            ]);
            if ($pdoS->rowCount() > 0) {
                $staigaire_row = $pdoS->fetch();
                if ($staigaire_row->password == $password) {
                    return new self($staigaire_row->id, $staigaire_row->nom, $staigaire_row->email, $staigaire_row->password);
                }
            }

            return false;
        } catch (\Throwable $th) {
            return false;
        }
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
}
