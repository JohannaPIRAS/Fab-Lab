<?php
    
    session_start();

    $mail = $_POST['mail'];
    
if(isset($mail)){
    
        setcookie('e_mail',$mail,time()+365*24*3600,null,null,false,true);
            
        $bd = "host=localhost port=5432 dbname=fablab1 user=admin password=admin";
        $connect = pg_connect($bd);
       
        if ($connect) {
     echo "connect";
} else {
     echo "error";
}
        $requete = pg_query("SELECT id_statut FROM utilisateur WHERE mail = '".$mail."';");
        $resultat = pg_fetch_array($requete);
            if($resultat[0]==1) {
                header('Location: administration.php');
            }
            else{
                header('Location: index.php');
            }
    }
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
</head>

<body>
    <h1 id="titresite" class="h2g2">FAB LAB ARTISANAT MÉTIERS ET ÉCHANGES</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><img src="img/captlogo.png" class="logo_max">      
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container-fluid">
            <div class="collapse navbar-collapse row" id="navbarNav">
                <ul class="navbar-nav navfull">
                    <li class="nav-item row navfull">
                        <a class="btn btn-primary navbtn navbtnperso" href="http://www.cm-ariege.fr/">
                            <div class=flexRow trait"><img src="img/ma.jpg" class="logo_min">
                                <p class="navTypo ">&nbsp; CMA</p>
                            </div>
                            <span class="sr-only"></span>
                        </a>
                        <a class="btn btn-primary navbtn navbtnperso" href="https://www.facebook.com/fablab.flame">
                            <div class="flexRow trait">
                                <i class="fab fa-facebook fa-2x" class="logo_min"> </i>
                                <p class="navTypo">&nbsp; FACEBOOK</p>
                            </div>
                            <span class="sr-only"></span>
                        </a>
                        <a class="btn btn-primary navbtn navbtnperso" href="pdf/flyer.pdf">
                            <div class="flexRow"> <i class="far fa-file-pdf fa-2x" class="logo_min"> </i>
                                <p class="navTypo">&nbsp; FLYER</p>
                            </div>
                            <span class="sr-only"></span>
                        </a>
                        <a class="btn btn-primary navbtn navbtnperso" href="index.php">
                            <div class="flexRow trait">
                                <i class="fas fa-undo-alt fa-2x" class="logo_min"> </i>
                                <p class="navTypo">&nbsp; RETOUR</p>
                            </div>
                            <span class="sr-only"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
    </div>
    <div class="container-fluid visibleOnDesc">
        <div class="col-10 offset-1 rounded carou mt-5 mb-5">
            <div class="row">
                <div id="lock" class="col-12 caroutxt">
                    <img src="img/lockbis.png">
                    <img src="img/lock.png">
                    <img src="img/lockbis.png">
                </div>
                <div id="log" class="col-md-12">
                    <div class="container">
                        <form id="logform" method="post" action="">
                            <div class="form-group">
                                <label for="mail">E-mail:</label>
                                <input type="email" class="form-control" id="mail" placeholder="entrer votre e-mail" name="mail" required="">
                                <label for="password">Mot de passe:</label>
                                <input type="password" class="form-control" id="password" placeholder="entrer votre mot de passe" name="password" required="">
                                <br>
                                <br>
                                <input type="submit" class="btn btn-dark" name="connexion" value="Connexion" id="connexion">
                            </div>
                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <footer>
        <div id="simplon2" class="col-md-12">
                    <img src="img/logosimplon.png">
                </div>
    </footer>
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>       

</html>
