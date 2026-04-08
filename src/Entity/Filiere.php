<?php
namespace App\Entity;

class Filiere
{
    private $id;
    private $code;
    private $libelle;

    public function __construct($id, $code, $libelle)
    {
        $this->id = $id;
        $this->code = $code;
        $this->libelle = $libelle;
    }

    public function getId() { return $this->id; }
    public function getCode() { return $this->code; }
    public function getLibelle() { return $this->libelle; }

    public function setCode($c) { $this->code = $c; }
    public function setLibelle($l) { $this->libelle = $l; }
}