<?php
// j'appel ma classe Etudiant
require_once('Etudiant.php');

// J'instancie ma class Etudiant

$etudiant = new Etudiant;

$etudiant->setPrenom('Yannis');
$etudiant->setNom('Aribot');
$etudiant->setEmail('yannis.aribot@lepoles.com');
$etudiant->setTelephone('06 99 99 99 99');

$e = $etudiant->getInfos();

?>

<h2 class="display-4 text-center">Etudiant : <strong><?= $e['prenom'] .' ' . $e['nom']?></strong></h2><hr><br>
Prénom : <strong><?= $e['prenom'] ?></strong><br>
Nom : <strong><?= $e['nom'] ?></strong><br>
Email : <strong><?= $e['email'] ?></strong><br>
Telephone : <strong><?= $e['telephone'] ?></strong><br>
