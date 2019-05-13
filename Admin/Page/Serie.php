<?php
//PLACER LE TRAITEMENT AU-DESSUS DU FORMULAIRE
    if (isset($_POST['submit_login'])) {
        
        $req = $cnx->prepare("INSERT INTO serie(cdromid) VALUES(:cdromid)");
        /*$req->bindParam(':dateexamen',$dateexammen);
        $req->bindParam(':heureexamen',$heureexamen);
        $req->bindParam(':lieuexamen',$lieuexamen);
        $req->execute();
        //echo 'Vous'.$name.$surname.'avez bien été ajouté !';*/
    }
    ?>
<hgroup>
  <h3 class="aligner txtGras">Entrez les informations sur les series de questions</h3>
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
                                                $cd = new cd_romDB($cnx);
                                                $cds = $cd->getCdRom();
                                                $nbr = count($cds);
                                            ?>
                                            <select class="form-control">
                                                <option class="hidden" selected disabled>Informations sur le cd de cette serie</option>
                                                 <?php
                                                    for ($i = 0; $i < $nbr; $i++) {?>
                                                <option><?php print $cds[$i]->cdromid.' '.$cds[$i]->editeur ;?></option>
                                                     <?php } ?>
                                            </select>
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
    <h3 class="aligner txtGras">Informations sur les series</h3>
</hgroup>

<br/><br/>
<?php
include('lib/php/verifier_connexion.php');
//récupération des elements pour la liste déroulante
$typ = new SerieDB($cnx);
$types = $typ->getSerie();
$nbr_type = count($types);
?>


<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th scope="col"><span style="color:white;">Numero de la série</span></th>
                    <th scope="col"><span style="color:white;">Numero du cd de la serie</span></th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    for ($i = 0; $i < $nbr_type; $i++) {?>
                <tr>
                    <th scope="row"><span style="color:white;"><?php print $types[$i]->serieid;?></span></th>
                    <td><span style="color:white;"><?php  print $types[$i]->cdromid; ?></span></td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
    </form>
</div>

