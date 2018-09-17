<?php
include('requetes.php')
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">moment.locale('fr');</script>
    <script type="text/javascript" src="js/moment-with-locales.js"></script>
    <script src="js/app.js"></script>
    <title>page administration</title>
</head>

    <body>
    <h1 id="titresite" class="h2g2">FAB LAB ARTISANAT MÉTIERS ET ÉCHANGES</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">  
        <a class="navbar-brand" href="#" href="#">
        </a>
        <img src="img/logo_flame.jpg" class="logo_max">      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="php_np">
            <!-- Requete pour afficher nom et prenom -->
             BIENVENUE <?php echo requetenom();?>
        
        <a class="navbar-brand" href="php/deco.php" >
            <button class="btn btn-danger" type="button" name="boutondeco" id="bouton_deconnexion" value="Déconnexion"> DECONNEXION
            </button> 
        </a>
        </div>
    </nav>
    <div class="container">
        <h2>Administration</h2>
        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link1 active" data-toggle="tab" href="#home">Fiche utilisation Machine</a>
            </li>
            &nbsp; &nbsp;
            <li class="nav-item">
                <a class="nav-link2" data-toggle="tab" href="#menu1">Fiche suivi de projet</a>
            </li>
            &nbsp; &nbsp;
            <li class="nav-item">
                <a class="nav-link3" data-toggle="tab" href="#menu2">Bulletin d'adhésion</a>
            </li>
            &nbsp; &nbsp;
            <li class="nav-item">
                <a class="nav-link4" data-toggle="tab" href="#menu3">Fiche réservation machine</a>
            </li>
            &nbsp; &nbsp;
            <li class="nav-item">
                <a class="nav-link4" data-toggle="tab" href="#menu4">Fiches de Report</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">

            <div id="home" class="container tab-pane active">
                <br>
                <h3>FICHE UTILISATION MACHINE</h3>
                <form action="php/utilisation.php" method="post">
                    <div class="row">
                        <div id="image" class="col-md-2">
                            <img src="img/groupe.png" style="width: 100%">
                            <a type="button" class="btn btn-warning" href="#" onclick="window.print(); return false;">Imprimer
                            </a>
                        </div>
                        <br>
                        <div id="formulaire" class="col-md-10">
                            <label for="date">Date:
                            </label>
                            <input type="Date" class="form-control1" id="date" name="date_jour" required="">
                            
                            <br>
                            <label for="utilisateur">Identification adhérent:
                            </label>     
                            <select class="form-control" name="utilisateur">
                                <?php
                                echo listederoulante('utilisateur');
                                 ?>
                            </select>
                            <br>
                            <label for="type_projet">Type de projet:
                                    </label>
                                    <td>
                                        <select class="form-control" name="type_projet">   
                                            <?php
                                echo listederoulante('type_projet');
                                 ?>      
                                        </select>
                                    </td>
                        </div>  
                        <h2>TEMPS MACHINE</h2>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>Machines</th>
                                    <th>Prix unitaire temps machine</th>
                                    <th>Temps passé</th>
                                    <th></th>
                                    <th>Total</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>          
                                        <select class="form-control" name="machine">
                                            <?php
                                echo listederoulante('machine');
                                 ?>
                                        </select>
                                    </td>
                   
                                    <td>          
                                        <select class="cout" name="coutmachine">
                                            <?php
                                echo listederoulante('coutmachine');
                                 ?>
                                        </select>
                                    </td>

                                    <td>          
                                        <select class="temps" name="temps_utilisation">
                                             <?php
                                echo listederoulante('temps_utilisation');
                                 ?>
                                            
                                        </select>
                                    </td>

                                    <td>
                                        <input type="button" value="=" onClick='afficher_resultat();'>
                                    </td>

                                    <td class="resultat">
                                        <?php
                                        echo $resultat;
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                            <h2>TYPE D'ACCOMPAGNEMENT EN HEURE</h2>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Temps</th>
                                    <th>Tarif accompagnement</th>
                                    <th></th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control" name="type_accompagnement">  
                                        <?php
                                echo listederoulante('type_accompagnement');
                                 ?>      
                                        </select>   
                                    </td>
                                    <td>          
                                        <select class="temps_presence4" name="temps_presence">
                                            <?php
                                echo listederoulante('temps_presence');
                                 ?>      
                                        </select>
                                    </td>
                                    <td>          
                                        <select class="cout_accompagnement4" name="cout_accompagnement">
                                            <?php
                                echo listederoulante('cout_accompagnement');
                                 ?>      
                                        </select>
                                    </td>
                                    <td>
                                        <input type="button" value="=" onClick='afficher_resultat3("4");'>
                                    </td>
                                    <td class="resultat4">
                                        <?php
                                        echo $resultat3;
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h2>COÛT CONSOMMABLE</h2>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>Consommables</th>
                                    <th>Prix unitaire consommable</th>
                                    <th>Surface consommée</th>
                                    <th></th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control" name="consommable">
                                           <?php
                                echo listederoulante('consommable');
                                 ?> 
                                        </select>
                                    </td>
                                    <td>          
                                        <select class="prix_consommable" name="prix_consommable">
                                             <?php
                                echo listederoulante('prix_consommable');
                                 ?> 
                                                 
                                        </select>
                                    </td>
                                    <td>
                                        <input class="surface" type="number" name="surface_consommee" required="">
                                    </td>
                                    <td>
                                        <input type="button" value="=" onClick='afficher_resultat2();'>
                                    </td>

                                    <td class="resultat2">
                                        <?php
                                        echo $resultat2;
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h2>COMMENTAIRE GÉNÉRAL</h2>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>Commentaire</th>
                                    <th>Payé?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <label for="commentaire"></label>
                                        
                                    <td>
                                        <input type="text" size="100" name="commentaire" value="" > 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="paye" value="True" required=""> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Enregistrer</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-light">Enregistrer
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
                <p> Signature de l'accompagnant
                        </p>    
                        <p> &nbsp;
                            <input type="text" name="signature">
                        </p>
                        <p> Signature du porteur de projet
                        </p>
                        <p> &nbsp;
                            <input type="text" name="signature">
                        </p>
            </div>
            <div id="menu1" class="container tab-pane fade">
                <br>
                <h3>FICHE SUIVI DE PROJET</h3>
                <form action="php/projet.php" method="post">
                    <div class="row">
                        <div id="image" class="col-md-2">
                            <img src="img/logoinpo.jpg" style="width: 100%">
                            <br>
                            <img src="img/coopart.jpg" style="width:100%">
                            <br>
                            <br>
                            <a type="button" class="btn btn-warning" href="#" onclick="window.print(); return false;">Imprimer 
                            </a>
                        </div>
                        <div id="formulaire" class="col-md-10">
                            <div class="container">
                                <div class="form-group">
                                    <label for="date">Date:
                                    </label>
                                    <input type="Date" class="form-control1" name="date_suivi">
                                    <br>
                                    <script type="text/javascript"> 
                                        var datedujour = moment().format('YYYY-MM-DD');
                                        $('.form-control1').val(datedujour);
                                    </script>
                                    <br>
                                    <label for="utilisateur">Identification adhérent:
                                    </label>     
                                    <select class="form-control" name="utilisateur_projet">
                                        <?php
                                echo listederoulante('utilisateur');
                                 ?>      
                                    </select>
                                    <br>
                                    <label for="type_projet">Type de projet:
                                    </label>
                                    <td>
                                        <select class="form-control" name="type_projet1">   
                                            <?php
                                echo listederoulante('type_projet');
                                 ?>      
                                        </select>
                                    </td>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <h2>TYPE D'ACCOMPAGNEMENT EN HEURE</h2>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Temps</th>
                                    <th>Tarif accompagnement</th>
                                    <th></th>
                                    <th>Total</th>
                                    <th>Commentaire</th>
                                    <th>Payé?</th>
                                    <th>Enregistrer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control" name="type_accompagnement1">  
                                        <?php
                                echo listederoulante('type_accompagnement');
                                 ?>      
                                        </select>   
                                    </td>
                                    <td>          
                                        <select class="temps_presence3" name="temps_presence1">
                                            <?php
                                echo listederoulante('temps_presence');
                                 ?>      
                                        </select>
                                    </td>
                                    <td>          
                                        <select class="cout_accompagnement3" name="cout_accompagnement2">
                                            <?php
                                echo listederoulante('cout_accompagnement');
                                 ?>      
                                        </select>
                                    </td>
                                    <td>
                                        <input type="button" value="=" onClick="afficher_resultat3('3');">
                                    </td>
                                    <td class="resultat3">
                                        <?php
                                        echo $resultat3;
                                        ?>
                                    </td>
                                    <td>
                                        <input type="text" name="comment"> 
                                    </td>
                                    <td>
                                        <input type="checkbox" name="paye2" value="True"> 
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-dark" value="Enregistrer">Enregistrer
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                        <p> Signature de l'accompagnant
                        </p>    
                        <p> &nbsp;
                            <input type="text" name="signature">
                        </p>
                        <p> Signature du porteur de projet
                        </p>
                        <p> &nbsp;
                            <input type="text" name="signature">
                        </p>
                    </div> 
            </div>
            <div id="menu2" class="container tab-pane fade">
                <br>
                <h3>BULLETIN D'ADHÉSION 2018</h3>
                <div class="row">
                    <div id="image" class="col-md-2">
                        <img src="img/logo_flame.jpg" style="width: 100%">
                        <br>
                        <br>
                        <a class="btn btn-warning" href="#" onclick="window.print(); return false;">Imprimer
                        </a>
                    </div>
                    <div id="formulaire" class="col-md-10">
                        <div class="container">
                            <form method="post" action="php/adhesion.php">
                                <div class="form-group">
                                    <label for="date_adhesion">Date:
                                    </label>
                                    <input type="Date" class="form-control1" id="date_adhesion" name="date_adhesion" required="">
                                    <script type="text/javascript"> 
                                        var datedujour = moment().format('YYYY-MM-DD');
                                        $('.form-control1').val(datedujour);
                                    </script>
                                    <br>
                                    <label for="nom">Nom:
                                    </label>
                                    <input type="text" class="form-control" id="nom" name="nom" required="">
                                    <label for="prenom">Prénom:
                                    </label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" required="">
                                    <label for="entreprise">Entreprise:
                                    </label>
                                    <input type="text" class="form-control" id="entreprise" name="entreprise" required="">
                                    <label for="adresse">Adresse:
                                    </label>
                                    <input type="text" class="form-control" id="adresse" name="adresse" required="">
                                    <label for="mail">E-mail:
                                    </label>
                                    <input type="mail" class="form-control" id="mail" name="mail" required="">
                                    <label for="telephone">Téléphone:
                                    </label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" required="">
                                    <br>
                                    <input type="submit" class="btn btn-dark">
                                </div>
                            </form>
                        </div>
                        <p> J'autorise la CMA09 à utiliser sans but lucratif, des photos de moi en activité au FABLAB
                        </p>
                        <p> &nbsp;
                            <input type="checkbox" name="yes" required> oui &nbsp;
                            <input type="checkbox" name="no" required> non
                        </p>
                        <p> J'autorise la CMA09 à utiliser sans but lucratif, des photos de mes projets en cours ou réalisés
                        </p>
                        <p> &nbsp;
                            <input type="checkbox" name="yes"> oui &nbsp;
                            <input type="checkbox" name="no"> non
                        </p>
                        <p> Signature
                        </p>
                        <p> &nbsp;
                            <input type="text" name="signature">
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div id="grpimg" class="col-md-12">
                        <img src="img/prefetariege.jpg"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <img src="img/occitanie.png"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <img src="img/ariege09.png"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <img src="img/groupe.png"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <img src="img/edf.jpg">
                    </div>
                </div>
            </div>
            <div id="menu3" class="container tab-pane fade">
                <br>
                <h3>FICHE RÉSERVATION MACHINE</h3>
                <div class="row">
                    <div id="image" class="col-md-2">
                        <img src="img/machines.png" style="width: 100%">
                        <br>
                        <br>
                        <a class="btn btn-warning" href="#" onclick="window.print(); return false;">Imprimer</a>
                    </div>
                    <div id="formulaire" class="col-md-10">
                        <div class="container">
                            <div class="form-group">
                                <a href="https://calendar.google.com/calendar/b/1/r/month/2018/6/1?cid=ZmFibGFiZmxhbWUwOUBnbWFpbC5jb20"> CLIQUER POUR RESERVER 
                                </a> 
                                <br>
                                <br>
                                <label for="date">Date:
                                </label>
                                <iframe src="https://calendar.google.com/calendar/b/1/embed?showTitle=0&amp;showTabs=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=fablabflame09%40gmail.com&amp;color=%231B887A&amp;src=fr.french%23holiday%40group.v.calendar.google.com&amp;color=%23125A12&amp;ctz=Europe%2FParis" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no">
                                </iframe>
                            </div>
                            <p> Signature
                            </p>
                            <p> &nbsp;
                                <input type="text" name="signature">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu4" class="container tab-pane fade">
                <br>
                <h3>REPORT</h3>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link4 active" data-toggle="tab" href="#menu4-1"> Liste adhérents
                        </a>
                    </li>
                    &nbsp; &nbsp;
                    <li class="nav-item">
                        <a class="nav-link5" data-toggle="tab" href="#menu4-2"> Report d'activité général
                        </a>
                    </li>
                    &nbsp; &nbsp;
                    <li class="nav-item">
                        <a class="nav-link5" data-toggle="tab" href="#menu4-3"> Utilisation impayée
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div id="menu4-1" class="container tab-pane fade">
                <br>
                <h2>LISTE ADHÉRENTS</h2>
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-warning" href="#" onclick="window.print(); return false;">Imprimer
                        </a>
                    </div>
                </div> 
                <br>
                <br>   
                <div class="col-md-10">
                    <?php
                    $requeteadherent=pg_query('SELECT date_adhesion, nom, prenom, entreprise from utilisateur where id_statut = 2 order by entreprise, date_adhesion ASC ');
                    while($resultat8=pg_fetch_array($requeteadherent) ){ 
                        echo$resultat8 ["date_adhesion"]; 
                        echo "\n";
                        echo "/";
                        echo$resultat8 ["nom"];
                        echo "\n";
                        echo "/";
                        echo$resultat8 ["prenom"];
                        echo "\n";
                        echo "/";
                        echo$resultat8 ["entreprise"];
                        echo "</br>";
                    }; 
                    ?> 
                    <br>
                    <?php
                    $requetetotaladherent=pg_query('SELECT COUNT(idutilisateur) AS nombre_total_adherent FROM utilisateur WHERE id_statut = 2');
                    while($resultat9=pg_fetch_array($requetetotaladherent) ){  
                        echo$resultat9 ["nombre_total_adherent"]; 
                        echo "\n";
                        echo "</br>";
                    }; 
                    ?> 
                </div>
            </div>
            <div id="menu4-2" class="container tab-pane fade">
                <br>
                <h2>REPORTING PAR UTILISATEUR (TEMPS PRESENCE, TEMPS MACHINE, COUT UTILISATION, COUT MAT 1ERE)</h2>
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-warning" href="#" onclick="window.print(); return false;">Imprimer
                        </a>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-10">
                          <?php

                    $requetereport1=pg_query('SELECT nom, prenom, date_jour, temps_pres, cout_accompagnement, cout_machine, temps_util, surface, prix
                        FROM utilisation
                        INNER JOIN utilisateur ON utilisation.idutilisateur = utilisateur.idutilisateur
                        LEFT JOIN concerne ON utilisation.id_ma_util = concerne.id_ma_util
                        LEFT JOIN machine ON utilisation.id_ma = machine.id_ma
                        LEFT JOIN utilisation_machine ON utilisation.id_ma_util = utilisation_machine.id_ma_util
                        LEFT JOIN mat_machine ON utilisation_machine.id_ut_ma = mat_machine.id_ut_ma;');
                        
                        while($resultat13=pg_fetch_array($requetereport1) ){ 
                                echo$resultat13["date_jour"];
                                echo "\n";
                                echo "/";
                                echo$resultat13["nom"];
                                echo "\n";
                                echo "/";
                                echo$resultat13["prenom"];
                                echo "\n";
                                $temps_pres = floatval($resultat13["temps_pres"]);
                                echo "\n";
                                $temps_util =  floatval($resultat13["temps_util"]);
                                echo "\n";
                                $cout_machine =  floatval($resultat13["cout_machine"]);
                                echo "\n";
                                $surface = floatval($resultat13 ["surface"]);
                                echo "\n";
                                $prix_consommable = floatval($resultat13["prix"]);

                                $cout_utilisation_machine =$temps_util*$cout_machine;
                                $cout_matieres_premieres =$surface*$prix_consommable;
                                $cout_presence =$temps_pres *$cout_machine;

                                echo "<br>"; 
                                $temps_pres= array($resultat13["temps_pres"]);
                                echo "\n";  
                                echo ("total temps de présence" . array_sum($temps_pres) . "<br>");
                                echo ("total temps d'utilisation" . array_sum($temps_util) . "<br>");
                                $temps_util= array($resultat13["temps_util"]);
                                echo "\n";
                                echo ("cout utilisation machine".$cout_utilisation_machine."€"."<br>");
                                echo ("cout matières premières".$cout_utilisation_machine."€"."<br>");
                                echo ("cout présence ". $cout_presence."€"."<br>");
                            }; 
                            ?> 
                </div>

                </div> 
             
                <br>
                <h2>REPORTING GLOBAL (TEMPS DE PRESENCE, TEMPS UTILISATION, COUT MACHINE, COUT MAT 1ERE)</h2>
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-warning" href="#" onclick="window.print(); return false;">Imprimer
                        </a>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-10">
                    <?php
                    $requetereport2=pg_query('SELECT date_jour, temps_pres, cout_accompagnement, cout_machine, temps_util, surface, prix
                        FROM utilisation
                        INNER JOIN utilisateur ON utilisation.idutilisateur = utilisateur.idutilisateur
                        LEFT JOIN concerne ON utilisation.id_ma_util = concerne.id_ma_util
                        LEFT JOIN machine ON utilisation.id_ma = machine.id_ma
                        LEFT JOIN utilisation_machine ON utilisation.id_ma_util = utilisation_machine.id_ma_util
                        LEFT JOIN mat_machine ON utilisation_machine.id_ut_ma = mat_machine.id_ut_ma
                        ;');
                        while($resultat12=pg_fetch_array($requetereport2) ){ 
                                echo$resultat12["date_jour"];
                                echo "\n";
                                $temps_pres = floatval($resultat12["temps_pres"]);
                                echo "\n";
                                $temps_util =  floatval($resultat12["temps_util"]);
                                echo "\n";
                                $cout_machine =  floatval($resultat12["cout_machine"]);
                                echo "\n";
                                $surface = floatval($resultat12["surface"]);
                                echo "\n";
                                $prix_consommable = floatval($resultat12["prix"]);

                                $total1 =$temps_pres*$cout_machine;
                                $total2 =$temps_util*$cout_machine;

                                echo "<br>"; 
                                $temps_pres= array($resultat12["temps_pres"]);
                                echo "\n";  
                                echo ("total temps de présence" . array_sum($temps_pres) . "\n");
                                $temps_util= array($resultat12["temps_util"]);
                                echo "\n";  
                                echo ("total temps d'utilisation" . array_sum($temps_util) . "\n");
                                echo ("cout utilisation machine".$total1."€"."<br>");
                                echo ("cout matières premières".$total2."€"."<br>");
                            }; 
                            ?> 
                </div>
                </div>
            </div>
            <div id="menu4-3" class="container tab-pane fade">
                <br>
                <h2>UTILISATIONS IMPAYÉES</h2>
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-warning" href="#" onclick="window.print(); return false;">Imprimer
                        </a>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-10">
                    <?php
                    $requetereport3=pg_query('SELECT nom, prenom, date_jour, temps_pres, cout_accompagnement, cout_machine, temps_util, surface, prix, paye
FROM utilisation
INNER JOIN utilisateur ON utilisation.idutilisateur = utilisateur.idutilisateur
LEFT JOIN concerne ON utilisation.id_ma_util = concerne.id_ma_util
LEFT JOIN machine ON utilisation.id_ma = machine.id_ma
LEFT JOIN utilisation_machine ON utilisation.id_ma_util = utilisation_machine.id_ma_util
LEFT JOIN mat_machine ON utilisation_machine.id_ut_ma = mat_machine.id_ut_ma
WHERE paye = false
;');
                            while($resultat13=pg_fetch_array($requetereport3) ){ 
                                echo$resultat13["date_jour"];
                                echo "\n";
                                echo "/";
                                echo$resultat13["nom"];
                                echo "\n";
                                echo "/";
                                echo$resultat13["prenom"];
                                echo "\n";
                                echo "/";
                                $temps_pres = floatval($resultat13["temps_pres"]);
                                echo "\n";
                                $temps_util =  floatval($resultat13["temps_util"]);
                                echo "\n";
                                $cout_machine =  floatval($resultat13["cout_machine"]);
                                echo "\n";
                                $surface = floatval($resultat13 ["surface"]);
                                echo "\n";
                                $prix_consommable = floatval($resultat13["prix"]);
                                echo$resultat13["paye"];
                                echo "\n";

                                $cout_utilisation_machine =$temps_pres*$cout_machine;
                                $cout_matieres_premieres =$temps_util*$cout_machine;

                                echo "<br>"; 
                                $temps_pres= array($resultat13["temps_pres"]);
                                echo "\n";  
                                echo ("total temps de présence" . array_sum($temps_pres) . "\n");
                                $temps_util= array($resultat13["temps_util"]);
                                echo "\n";  
                                echo ("total temps d'utilisation" . array_sum($temps_util) . "\n");
                                echo ("cout utilisation machine".$cout_utilisation_machine."€"."<br>");
                                echo ("cout matières premières".$cout_matieres_premieres."€"."<br>");
                            }; 
                            ?> 
                </div>
                </div>
        </div>
        <script>
        $(document).ready(function() {
            $(".nav-tabs a").click(function() {
                $(this).tab('show');
            });
        });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>        
    </body>
</html>
