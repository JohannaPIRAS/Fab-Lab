<?php

session_start();

$mail = $_COOKIE['e_mail'];
$bd = "host=localhost port=5432 dbname=fablab1 user=admin password=admin";

$connect = pg_connect($bd);



function requetenom() {
    global $mail;
    $requeteNom = pg_fetch_array(pg_query("SELECT nom, prenom FROM utilisateur WHERE mail = '".$mail."';"));
    return $requeteNom[1];
}

function listederoulante($requete) {
    $textafficher = "";
    switch ($requete) {
        case 'utilisateur':
            // $textafficher = "";
            $requete ="SELECT nom, prenom, entreprise, mail FROM utilisateur WHERE id_statut = 2 order by nom ASC;";
            $resultat = pg_query($requete);
            
            while ($result = pg_fetch_array($resultat)) {
                $textafficher.= "<option value='".$result['mail']."'>".$result['nom']." ".$result['prenom']." ".$result['mail']." </option> ";
            }
            return $textafficher;
            break;

        case 'utilisateur_projet':
            $requete ="SELECT nom, prenom, entreprise, mail FROM utilisateur WHERE id_statut = 2 order by nom ASC;";
            $resultat3 = pg_query($requete);
            
            while ($result = pg_fetch_array($resultat3)) {
                $textafficher.= "<option value='".$result['mail']."'>".$result['nom']." ".$result['prenom']." ".$result['mail']." </option> ";
            }
            return $textafficher;
            break;

        case 'machine':
            $requete ="SELECT id_ma, libelle_ma FROM machine";
            $resultat = pg_query($requete);
            
            while ($result = pg_fetch_array($resultat)) {
                $textafficher.= "<option value='".$result['id_ma']."'>".$result['libelle_ma']." </option> ";
            }
            return $textafficher;
            break;

        case 'coutmachine':
           $requete ="SELECT unnest(enum_range(NULL::cout_machine))::cout_machine AS cout_machine;";
            $resultat = pg_query($requete);
            
            while ($result = pg_fetch_array($resultat)) {
                 $textafficher.= "<option value='".$result['cout_machine']."'>".$result['cout_machine']." </option>";
            }
            return $textafficher;
            break;

        case 'temps_utilisation':
            $requete ="SELECT unnest(enum_range(NULL::temps_util))::temps_util AS temps_util;";
            $resultat = pg_query($requete);
            
            while ($result = pg_fetch_array($resultat)) {
                 $textafficher.= "<option value='".$result['temps_util']."'>".$result['temps_util']." </option>";
            }
            return $textafficher;
            break;

        case 'consommable':
            $requete ="SELECT id_mat, libelle_mat
            FROM materiel order by id_mat DESC";
            $resultat = pg_query($requete);
            
            while ($result = pg_fetch_array($resultat)) {
                 $textafficher.= "<option value='".$result['id_mat']."'>".$result['libelle_mat']." </option> ";
            }
            return $textafficher;
            break;

        case 'prix_consommable':
            $requete ="SELECT unnest(enum_range(NULL::prix))::prix AS prix";
            $resultat = pg_query($requete);
            
            while ($result = pg_fetch_array($resultat)) {
                 $textafficher.= "<option value='".$result['prix']."'>".$result['prix']." </option>";
            }
            return $textafficher;
            break;

        case 'type_projet':
            $requete ="SELECT libelle_pro FROM projet;";
            $resultat = pg_query($requete);
            
            while ($result = pg_fetch_array($resultat)) {
                 $textafficher.= "<option value='".$result['libelle_pro']."'>".$result['libelle_pro']."</option> ";
            }
            return $textafficher;
            break;

        case 'type_accompagnement':
            $requete ="SELECT libelle_typ FROM type_accompagnement order by id_typ DESC";
            $resultat = pg_query($requete);
            
            while ($result = pg_fetch_array($resultat)) {
                 $textafficher.= '<option value="'.$result['libelle_typ'].'">'.$result['libelle_typ'].'</option> ';
            }
            return $textafficher;
            break;

        case 'temps_presence':
            $requete ="SELECT unnest(enum_range(NULL::temps_pres))::temps_pres AS temps_pres";
            $resultat = pg_query($requete);
            
            while ($result = pg_fetch_array($resultat)) {
                 $textafficher.= "<option value='".$result['temps_pres']."'>".$result['temps_pres']."</option> ";
            }
            return $textafficher;
            break;

        case 'cout_accompagnement':
            $requete ="SELECT unnest(enum_range(NULL::cout_machine))::cout_machine AS cout_machine";
            $resultat = pg_query($requete);
            
            while ($result = pg_fetch_array($resultat)) {
                 $textafficher.= "<option value='".$result['cout_machine']."'>".$result['cout_machine']."</option> ";
            }
            return $textafficher;
            break;
    }
}

?>