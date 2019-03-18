
<!DOCTYPE html>

<?php
require './Admin/lib/php/admin_liste_include.php';
$cnx = Connexion:: getInstance($dsn, $user, $pass);
/* var_dump($cnx);

  $fleur = new AccueilDB($cnx);
  $liste = $fleur->getTexteAccueil();
  var_dump($liste);
  print "Nom de la fleur : ".$liste[0]->nom_fleur; */
?>



<html>
    <head> <meta charset="UTF-8">        

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous"/>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="./admin/lib/css/Style.css"/>
        <title></title>
    </head>

    <body>
        <header>
            <div class ="container">
                <?php
                if (file_exists('./lib/php/p_menu.php')) {
                    require './lib/php/p_menu.php';
                }
                ?>

            </div>
        </header>


    </body>


</html> 

