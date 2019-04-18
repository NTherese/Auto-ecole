<hgroup>
    <h3 class="aligner txtGras">Informations sur les clients</h3>
</hgroup>

<?php
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
                  <th scope="col">Numero du client</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Prenom</th>
                  <th scope="col">Adresse</th>
                  <th scope="col">Date naissance</th>
                  <th scope="col">Login</th>
                  <th scope="col">Mot de passe</th>
                  <th scope="col">Email</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    for ($i = 0; $i < $nbr_type; $i++) {?>
                <tr>
                  <th scope="row"><?php print $types[$i]->clienid;?></th>
                  <td><?php  print $types[$i]->nom; ?></td>
                  <td><?php print $types[$i]->prenom; ?></td>
                  <td><?php  print $types[$i]->adresse; ?></td>
                  <td><?php  print $types[$i]->datenaiss; ?></td>
                  <td><?php  print $types[$i]->login; ?></td>
                  <td><?php  print $types[$i]->password; ?></td>
                  <td><?php  print $types[$i]->email; ?></td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
    </form>
</div>

