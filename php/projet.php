<?php

	$bd = "host=localhost port=5432 dbname=fablab1 user=admin password=admin";
	$connect = pg_connect($bd);
	if ($connect) {
    	echo "connect";
	}
	else {
    	echo "error";
	}	

if (!isset ($_POST['paye2'])) {
	$_POST['paye2']='False';
}

$requete = "INSERT INTO utilisation 
	(libelle_utilcons, date_jour, idutilisateur, temps_pres, paye)
	SELECT 'True' , '".$_POST['date_suivi']."', *,'".$_POST['temps_presence1']."','".$_POST['paye2']."'
	FROM
	(SELECT idutilisateur FROM utilisateur WHERE mail = '".$_POST['utilisateur_projet']."') t;";

$concerne =" INSERT INTO concerne (id_ma_util, id_utilisation, id_typ, cout_accompagnement)
	SELECT *, '".$_POST['cout_accompagnement2']."'
	FROM
	(SELECT MAX (id_ma_util) FROM utilisation) r1,
	(SELECT id_pro FROM projet WHERE libelle_pro = '".$_POST['type_projet1']."') r2,
	(SELECT id_typ FROM type_accompagnement WHERE libelle_typ = '".$_POST['type_accompagnement1']."') r3";
	

pg_query($requete);
pg_query($concerne);


header('Location: ../administration.php');

		
?>