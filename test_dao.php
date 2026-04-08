<?php

require_once 'bootstrap.php';

use App\Database\DBConnection;
use App\Log\Logger;
use App\Entity\Filiere;
use App\Entity\Etudiant;
use App\Dao\FiliereDao;
use App\Dao\EtudiantDao;

$logger = new Logger('logs/pdo_errors.log');

DBConnection::init($logger);
$pdo = DBConnection::get();

echo "Connexion réussie\n";

// FILIERE
$fDao = new FiliereDao($pdo);

try {
    $fDao->create(new Filiere(null,'TEST','Test Filiere'));
    echo "Filiere ajoutée\n";
} catch (Exception $e) {
    echo "Filiere existe deja\n";
}

// ETUDIANT
$eDao = new EtudiantDao($pdo);

try {
    $eDao->createWithTransaction(
        new Etudiant(null, "N479980", "Asmae", "Askhatir", "askhatir@gmail.com", 1)
    );
    echo "Etudiant ajouté\n";
} catch (Exception $e) {
    echo "Etudiant existe deja\n";
}

// AFFICHAGE
echo "\n--- RESULTAT FINAL ---\n";

$list = $eDao->findAllWithFiliere();

foreach ($list as $row) {
    echo $row['nom']." ".$row['prenom']." | ".
         $row['code']." - ".$row['libelle']."\n";
}