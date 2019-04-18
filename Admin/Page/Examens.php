<?php
//PLACER LE TRAITEMENT AU-DESSUS DU FORMULAIRE
    if (isset($_POST['submit_login'])) {
        
        $req = $cnx->prepare("INSERT INTO examen_code(dateexamen, heureexamen, lieuexamen) VALUES(:dateexamen, :heureexamen, :lieuexamen)");
        $req->bindParam(':dateexamen',$dateexammen);
        $req->bindParam(':heureexamen',$heureexamen);
        $req->bindParam(':lieuexamen',$lieuexamen);
        $req->execute();
        //echo 'Vous'.$name.$surname.'avez bien été ajouté !';
    }
    ?>
<hgroup>
  <h3 class="aligner txtGras">Entrez les informations sur les examens</h3>
  </hgroup>
<div class="container register">
                <div class="row">
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
                                   <div class="row register-form">
							
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control" placeholder="Date de l'examen *" value="" name="dateexamen" id="dateexamen" title="Entrez la date de l'examen"  required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Lieu de l'examen *" value="" name="lieuexamen" id="lieuexamen" title="Entrez le lieu de l'examen"  required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="datetime" class="form-control" placeholder="Heure de l'examen *" value="" name="heureexamen" id="heureexamen" title="Entrez l'heure de l'examen"  required />
                                        </div>
                                        <input type="submit" class="btnRegister" name="submit_login" id="submit_login" value="Enregistrer"/>
                                    </div>
                                  </div>
								 </form>
                            </div>
                          </div>
                        </div>
                    </div>
    
                </div>

<br/><br/><br/><br/>
<hgroup>
    <h3 class="aligner txtGras">Informations sur les examens</h3>
</hgroup>

<br/><br/>
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

