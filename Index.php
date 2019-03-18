<!doctype html>
<?php
require './admin/lib/php/admin_liste_include.php';
$cnx = Connexion ::getInstance($dsn, $user, $pass);
 var_dump($cnx);
  $f1=new AccueilDB($cnx);
  $liste=$f1->getTexteAccueil();
  for($i=0;$i<count($liste);$i++) {
  print "<br/>Numero du client:  ".$liste[$i]->clienid." Nom et prenom :  ".$liste[$i]->nom.$liste[$i]->prenom." <br/> Son adresse est:  ".$liste[$i]->adresse." Sa date de naissance est : ".$liste[$i]->datenaiss."<br/>";
  }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title></title>
    </head>
    <body> 
        <!--<div class="container">
            <button type="button" class="btn btn-primary">Bouton</button>
        </div>-->
        <div class="container">
            <div class="row">
                <div class="col">
                    column 1
                </div>
                <div class="col">
                    column 2
                </div>
            </div>
            <div class="row">
                <div class="col">
                    column 1
                </div>
                <div class="col">
                    column 2
                </div>
                <div class="col">
                    column 3
                </div>
            </div>
        </div>
        <?php
        ?>
    </body>
</html>

