<?php
namespace App\Dao;

use App\Entity\Filiere;
use PDO;

class FiliereDao
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Filiere $f)
    {
        $stmt = $this->pdo->prepare("INSERT INTO filiere(code, libelle) VALUES(?, ?)");
        $stmt->execute([$f->getCode(), $f->getLibelle()]);
    }

    public function findAll()
    {
        $res = $this->pdo->query("SELECT * FROM filiere");
        return $res->fetchAll();
    }
}