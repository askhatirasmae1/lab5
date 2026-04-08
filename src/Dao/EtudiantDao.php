<?php
namespace App\Dao;

use App\Entity\Etudiant;
use PDO;

class EtudiantDao
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Etudiant $e)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO etudiant(cne, nom, prenom, email, filiere_id)
             VALUES(?,?,?,?,?)"
        );
        $stmt->execute([
            $e->getCne(),
            $e->getNom(),
            $e->getPrenom(),
            $e->getEmail(),
            $e->getFiliereId()
        ]);
    }

    public function findAllWithFiliere()
    {
        return $this->pdo->query(
            "SELECT e.nom,e.prenom,f.code,f.libelle
             FROM etudiant e
             JOIN filiere f ON e.filiere_id=f.id"
        )->fetchAll();
    }

    public function createWithTransaction(Etudiant $e)
    {
        try {
            $this->pdo->beginTransaction();
            $this->create($e);
            $this->pdo->commit();
        } catch (\Exception $ex) {
            $this->pdo->rollBack();
            throw $ex;
        }
    }
}