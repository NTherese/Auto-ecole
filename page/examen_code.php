<hgroup>
    <h3 class="aligner txtGras">Informations sur les examens</h3>
</hgroup>

<?php
//récupération des elements pour la liste déroulante
$typ = new Examen_codeDB($cnx);
$types = $typ->getExamenCode();
$nbr_type = count($types);
?>


<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Numero d'examen</th>
                  <th scope="col">Date</th>
                  <th scope="col">Heure</th>
                  <th scope="col">Lieu</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    for ($i = 0; $i < $nbr_type; $i++) {?>
                <tr>
                  <th scope="row"><?php print $types[$i]->passage_codeid;?></th>
                  <td><?php  print $types[$i]->dateexamen; ?></td>
                  <td><?php print $types[$i]->heureexamen; ?></td>
                  <td><?php  print $types[$i]->lieuexamen; ?></td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
    </form>
</div>

