<?php
    //PLACER LE TRAITEMENT AU-DESSUS DU FORMULAIRE
    if (isset($_GET['submit_login'])) {
        extract($_GET,EXTR_OVERWRITE);
        if(empty($login)||empty($mdp)||empty($statut)){
            $erreur="<span class='txtRouge txtGras'> Veuillez remplir tous les champs</span>";
        }
        else{
            $ad=new AdminDB($cnx);
            $retour=$ad->AddAdmin($_GET);
            if($retour==1){
                echo "<script language=\"javascript\">";
                echo"alert('Encodé')";
                echo"</script>";
                //print "<br/> Encodé!!!";
            }
            else if($retour==2){
                echo "<script language=\"javascript\">";
                echo"alert('Deja encodé')";
                echo"</script>";
            }
            //var_dump($retour);
        }
    }
    ?>
    

<div class="container register">
                <div class="row">
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Nouveau administrateur</h3>
								<form action="<?php print $_SERVER['PHP_SELF'];?>" method="get" id="form_admin">
                                   <div class="row register-form">
							
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="" name="login" placeholder="Nom utilisateur *" id="login" title="Entrez votre nom d'utilisateur"  required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Mot de passe *" value="" name="mdp" id="mdp" title="Entrez votre mot de passe"  required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                       
                                        <div class="form-group">
                                            <input type="text"  name="statut" id="statut" class="form-control" placeholder="Statut *" value="" />
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
    <h3 class="aligner txtGras">Informations sur les administrateurs du site</h3>
</hgroup>

<br/><br/>
<?php
include('lib/php/verifier_connexion.php');
//récupération des elements pour la liste déroulante
$typ = new AdminDB($cnx);
$types = $typ->getAdmin();
$nbr_type = count($types);
?>


<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th scope="col"><span style="color:white;">Login</span></th>
                    <th scope="col"><span style="color:white;">Statut</span></th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    for ($i = 0; $i < $nbr_type; $i++) {?>
                <tr>
                    <th scope="row"><span style="color:white;"><?php print $types[$i]['login'];?></span></th>
                    <td><span style="color:white;"><?php  print $types[$i]['statut']; ?></span></td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
    </form>
</div>