<hgroup>
    <h3 class="aligner txtGras">Informations sur les seances de formations </h3>
</hgroup>

<?php
//récupération des elements pour la liste déroulante
$typ = new Seance_codeDB($cnx);
$types = $typ->getSeanceCode();
$nbr_type = count($types);
?>


<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Numero seance</th>
                  <th scope="col">Date</th>
                  <th scope="col">Heure</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    for ($i = 0; $i < $nbr_type; $i++) {?>
                <tr>
                  <th scope="row"><?php print $types[$i]->seanceid;?></th>
                  <td><?php  print $types[$i]->dateseance; ?></td>
                  <td><?php print $types[$i]->heureseance; ?></td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
    </form>
</div>

