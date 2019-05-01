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
                    <th scope="col"><span style="color:white;">Numero d'examen</span></th>
                    <th scope="col"><span style="color:white;">Date</span></th>
                    <th scope="col"><span style="color:white;">Heure</span></th>
                    <th scope="col"><span style="color:white;">Lieu</span></th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    for ($i = 0; $i < $nbr_type; $i++) {?>
                <tr>
                    <th scope="row"><span style="color:white;"><?php print $types[$i]->passage_codeid;?></span></th>
                    <td><span style="color:white;"><?php  print $types[$i]->dateexamen; ?></span></td>
                    <td><span style="color:white;"><?php print $types[$i]->heureexamen; ?></span></td>
                    <td><span style="color:white;"><?php  print $types[$i]->lieuexamen; ?></span></td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
    </form>
</div>

