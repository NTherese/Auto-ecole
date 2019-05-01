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
                        <th scope="col"><span style="color:white;">Numero seance </span></th>
                        <th scope="col"><span style="color:white;"> Date</span></th>
                        <th scope="col"><span style="color:white;">Heure</span></th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    for ($i = 0; $i < $nbr_type; $i++) {?>
                <tr>
                    <th scope="row"><span style="color:white;"><?php print $types[$i]->seanceid;?></span></th>
                    <td><span style="color:white;"><?php  print $types[$i]->dateseance; ?></span></td>
                    <td><span style="color:white;"><?php print $types[$i]->heureseance; ?></Span></td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
    </form>
        
</div>

