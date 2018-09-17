<?php

	$bd = "host=localhost port=5432 dbname=fablab1 user=admin password=admin";
	$connect = pg_connect($bd);
	if ($connect) {
    	echo "connect";
	}
	else {
    	echo "error";
	}

if (!isset ($_POST['paye'])) {
	$_POST['paye']='False';
}
	
$requete = "INSERT INTO utilisation 
	(libelle_utilcons, date_jour, idutilisateur, id_ma, temps_pres, paye)
	SELECT 'True' , '".$_POST['date_jour']."', *,".$_POST['machine'].",'".$_POST['temps_presence']."', ".$_POST['paye']."
	FROM
	(SELECT idutilisateur FROM utilisateur WHERE mail = '".$_POST['utilisateur']."') t;";
	
		
$requete2 = "INSERT INTO utilisation_machine 
	(id_ma_util, cout_machine, temps_util, commentaire)
	SELECT *,'".$_POST['coutmachine']."','".$_POST['temps_utilisation']."','".$_POST['commentaire']."'
	FROM
	(SELECT MAX (id_ma_util) FROM utilisation) r1;";



$requete3 = "INSERT INTO mat_machine 
	(id_ut_ma, id_mat, surface, prix)
	SELECT *,".$_POST['consommable'].", '".$_POST['surface_consommee']."', '".intval($_POST['prix_consommable'])."'
	FROM 
	(SELECT MAX (id_ut_ma) FROM utilisation_machine) r1;";

$concerne = "INSERT INTO concerne (id_ma_util, id_utilisation, id_typ, cout_accompagnement)
	SELECT *, '".$_POST['cout_accompagnement']."'
	FROM
	(SELECT MAX (id_ma_util) FROM utilisation) r1,
	(SELECT id_pro FROM projet WHERE libelle_pro = '".$_POST['type_projet']."') r2,
	(SELECT id_typ FROM type_accompagnement WHERE libelle_typ = '".$_POST['type_accompagnement']."') r3";


pg_query($requete);
pg_query($requete2);


if ($_POST['consommable']!='12' ){

	pg_query($requete3);
}

if ($_POST['type_accompagnement']!="pas d'accompagnement"){

	pg_query($concerne);	
}		


header('Location: ../administration.php');

		
?>