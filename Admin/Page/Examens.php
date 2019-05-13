<?php
    //PLACER LE TRAITEMENT AU-DESSUS DU FORMULAIRE
    if (isset($_GET['submit'])) {
        extract($_GET,EXTR_OVERWRITE);
        if(empty($dateexamen)||empty($heureexamen)||empty($lieuexamen)){
            $erreur="<span class='txtRouge txtGras'> Veuillez remplir tous les champs</span>";
        }
        else{
            $ad=new Examen_codeDB($cnx);
            $retour=$ad->AddExamen($_GET);
        }
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
								<form action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
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
                                            <input type="time" class="form-control" placeholder="Heure de l'examen *" value="" name="heureexamen" id="heureexamen" title="Entrez l'heure de l'examen"  required />
                                        </div>
                                        <input type="submit" class="btnRegister" name="submit" id="submit" value="Enregistrer"/>
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
include('lib/php/verifier_connexion.php');
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

