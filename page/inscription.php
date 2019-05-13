<?php
//PLACER LE TRAITEMENT AU-DESSUS DU FORMULAIRE
    if (isset($_GET['submit_login'])) {
        extract($_GET, EXTR_OVERWRITE);
        //var_dump($_GET);
        if(empty($name)||empty($surname)||empty($adr) ){
            $erreur="<span class='txtRouge txtGras'> Veuillez remplir tous les champs</span>"; 
        }
        
        else{
            $ad=new ClientDB($cnx);
            $retour=$ad->AddClient($_GET);
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
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>Texte de bienvenue</p>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Inscription</h3>
								<form action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
                                   <div class="row register-form">
							
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nom *" value="" name="name" id="name" title="Entrez votre nom" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Prenom *" value=""  name="surname" id="surname" title="Entrez votre prenom"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Adresse *" value=""  name="adr" id="adr" title="Entrez votre adresse (nom rue, numero, code postal et ville)" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="" name="login" placeholder="Nom utilisateur *" id="login" title="Entrez votre nom d'utilisateur" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Mot de passe *" value="" name="mdp" id="mdp" title="Entrez votre mot de passe" />
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="Homme" checked>
                                                    <span style="color:black;"> Homme </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="Femme">
                                                    <span style="color:black;">Femme </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="date" class="form-control" placeholder="Date de naissance *" value="" name="dn" id="dn" title="Entrez votre date de naissance" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Adresse mail *" value="" name="mail" id="mail" title="Entrez votre adresse mail"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Telephone *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option class="hidden" selected disabled>Veuillez choisir votre question de securite</option>
                                                <option>Le nom de votre meilleur ami?</option>
                                                <option>Le nom de votre animal de compagnie</option>
                                            </select>
                                        </div>
                                        <div class="form-group" >
                                            <input type="text" class="form-control" placeholder="Veuillez entrer votre reponse " value="" title="Optionnel" />
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