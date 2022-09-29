<?php

declare(strict_types=1);
namespace App\Modules;


class Examen
{

    /** @var int */
    private int $id;

    /** @var int */
    private int $id_competence;

    /** @var int */
    private int $id_formatuer;

    /** @var string */
    private string $title;

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
     * @return void
     */
    public static function findByCode()
    {
        // TODO implement here
        return null;
    }




    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

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
}
