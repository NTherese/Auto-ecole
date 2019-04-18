<?php
//PLACER LE TRAITEMENT AU-DESSUS DU FORMULAIRE
    if (isset($_POST['submit_login'])) {
        
        $req = $cnx->prepare("INSERT INTO admin(login, password, statut) VALUES(:login, :mdp, :statut)");
        $req->bindParam(':login',$login);
        $req->bindParam(':mdp',$mdp);
        $req->bindParam(':statut',$statut);
        $req->execute();
        //echo 'Vous'.$name.$surname.'avez bien été ajouté !';
    }
    ?>

<div class="container register">
                <div class="row">
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Nouveau administrateur</h3>
								<form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
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
                                            <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Statut *" value="" />
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