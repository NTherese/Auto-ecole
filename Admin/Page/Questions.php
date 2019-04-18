<?php
//PLACER LE TRAITEMENT AU-DESSUS DU FORMULAIRE
    if (isset($_POST['submit_login'])) {
        
        $req = $cnx->prepare("INSERT INTO question(intitule,reponse,niveaudif,theme) VALUES(:intitule,:reponse,:niveaudif,:theme)");
        /*$req->bindParam(':dateexamen',$dateexammen);
        $req->bindParam(':heureexamen',$heureexamen);
        $req->bindParam(':lieuexamen',$lieuexamen);
        $req->execute();
        //echo 'Vous'.$name.$surname.'avez bien été ajouté !';*/
    }
    ?>
<hgroup>
  <h3 class="aligner txtGras">Entrez les informations sur les questions</h3>
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
                                            <input type="text" class="form-control" placeholder="Intitule de la question *" value="" name="intitule" id="intitule" title="Entrez l'intule de la question "  required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Reponse à la question *" value="" name="reponse" id="reponse" title="Entrez la reponse à la question"  required/>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option class="hidden" selected disabled>Veuillez choisir le niveau de difficulte de la question</option>
                                                <option>Facile</option>
                                                <option>Moyen</option>
                                                <option>Difficile</option>
                                            </select>
                                        </div>

                                    <div class="col-md">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Theme de la question *" value="" name="theme" id="theme" title="Entrez le theme de la question"  required />
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
</div>
<br/><br/><br/><br/>
<hgroup>
    <h3 class="aligner txtGras">Informations sur les questions</h3>
</hgroup>

<br/><br/>
<?php
//récupération des elements pour la liste déroulante
$typ = new QuestionDB($cnx);
$types = $typ->getQuestion();
$nbr_type = count($types);
?>


<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Numero de la question</th>
                  <th scope="col">Intitule</th>
                  <th scope="col">Reponse</th>
                  <th scope="col">Niveau de difficulte</th>
                  <th scope="col">Theme de la question</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    for ($i = 0; $i < $nbr_type; $i++) {?>
                <tr>
                  <th scope="row"><?php print $types[$i]->questionid;?></th>
                  <td><?php  print $types[$i]->intitule; ?></td>
                  <td><?php print $types[$i]->reponse; ?></td>
                  <td><?php  print $types[$i]->niveaudif; ?></td>
                  <td><?php  print $types[$i]->theme; ?></td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
    </form>
</div>

