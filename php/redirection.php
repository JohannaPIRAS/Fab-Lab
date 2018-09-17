<?php

$bd = "host=localhost port=5432 dbname=fablab1 user=admin password=admin";

$connect = pg_connect($bd);

$mail = $_COOKIE['e_mail'];

$verif_cookie = pg_fetch_array(pg_query("SELECT id_statut FROM utilisateur WHERE mail = '".$mail."';"));

if($verif_cookie[0]==1) {
    header('Location: ../administration.php');
}
else{
    header('Location: ../index.php');
}

?>
