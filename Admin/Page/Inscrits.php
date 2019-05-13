<hgroup>
    <h3 class="aligner txtGras">Informations sur les clients</h3>
</hgroup>

<?php
include('lib/php/verifier_connexion.php');
//récupération des elements pour la liste déroulante
$typ = new ClientDB($cnx);
$types = $typ->getClient();
$nbr_type = count($types);
?>


<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th scope="col"><span style="color:white;">Numero du client</span></th>
                    <th scope="col"><span style="color:white;">Nom</span></th>
                    <th scope="col"><span style="color:white;">Prenom</span></th>
                    <th scope="col"><span style="color:white;">Adresse</span></th>
                    <th scope="col"><span style="color:white;">Date naissance</span></th>
                    <th scope="col"><span style="color:white;">Login</span></th>
                    <th scope="col"><span style="color:white;">Mot de passe</span></th>
                    <th scope="col"><span style="color:white;">Email</span></th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    for ($i = 0; $i < $nbr_type; $i++) {?>
                <tr>
                    <th scope="row"><span style="color:white;"><?php print $types[$i]->clienid;?></span></th>
                    <td><span style="color:white;"><?php  print $types[$i]->nom; ?></span></td>
                    <td><span style="color:white;"><?php print $types[$i]->prenom; ?></span></td>
                    <td><span style="color:white;"><?php  print $types[$i]->adresse; ?></span></td>
                    <td><span style="color:white;"><?php  print $types[$i]->datenaiss; ?></span></td>
                    <td><span style="color:white;"><?php  print $types[$i]->login; ?></span></td>
                    <td><span style="color:white;"><?php  print $types[$i]->password; ?></span></td>
                    <td><span style="color:white;"><?php  print $types[$i]->email; ?></span></td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
    </form>
</div>

