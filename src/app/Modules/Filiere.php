<?php

declare(strict_types=1);

namespace App\Modules;

class Filiere
{

    /** @var int */
    private int $id;

    /** @var string  */
    private string  $label;

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @return null
     */
    public function groups_() 
    {
        // TODO implement here
        return null;
    }

    /**
     * 
     */
    public function save()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public function update()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public function delete()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public static function all()
    {
        // TODO implement here
    }

    /**
     * @param  $id
     */
    public static function findById( $id)
    {
        // TODO implement here
    }

    /**
     * @return null
     */
    public function groups() 
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
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of label
     *
     * @return  self
     */ 
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }
}
