<?php

$bd =  "host=localhost port=5432 dbname=fablab1 user=admin password=admin";

$connect = pg_connect($bd);


$insertutilisateur = "INSERT INTO utilisateur (date_adhesion, nom, prenom, entreprise, adresse, mail, telephone, id_statut) VALUES ('$_POST[date_adhesion]','$_POST[nom]',
'$_POST[prenom]','$_POST[entreprise]','$_POST[adresse]','$_POST[mail]',
'$_POST[telephone]',2)";

$result = pg_query($insertutilisateur); 

echo $insertutilisateur;

header('Location: ../administration.php');
?>

