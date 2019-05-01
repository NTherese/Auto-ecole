<hgroup>
  <h3 class="aligner txtGras">Entrez les informations sur les seances de cours</h3>
  </hgroup>
<div class="container register">
                <div class="row">
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
                                   <div class="row register-form">
                                    <div class="col-md">
                                        
                                        <div class="form-group">
                                            <?php
                                                //récupération des elements pour la liste déroulante
                                                $serie = new SerieDB($cnx);
                                                $series = $serie->getSerie();
                                                $cpt = count($series);
                                            ?>
                                            <select class="form-control">
                                                <option class="hidden" selected disabled>Informations sur la serie</option>
                                                 <?php
                                                    for ($i = 0; $i < $cpt; $i++) {?>
                                                <option><?php print $series[$i]->serieid;?></option>
                                                     <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" placeholder="Date de la seance *" value="" name="jour" id="jour" title="Entrez le date de la seance de cours "  required/>
                                          
                                        </div>
                                        <div class="form-group">
                                            <input type="time" class="form-control" placeholder="Heure de la seance *" value="" name="heure" id="heure" title="Entrez l'heure de la seance "  required/>
                                        </div>
                                    <div class="col-md">
                                        <input type="submit" class="btnRegister" name="submit_login" id="submit_login" value="Enregistrer"/>
                                    </div>
                                  </div>
								 </form>
                            </div>
                          </div>
                        </div>
                    </div>
    
                </div>
</div>

<br/><br/><br/><br/>

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

