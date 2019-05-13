<hgroup>
    <h3 class="aligner txtGras">Gestion des administrateurs</h3>
</hgroup>
<?php
include('lib/php/verifier_connexion.php');
//2016-2017
//récupération des produits
$admin = new AdminDB($cnx);
$liste = array();
$liste = null;
$liste=$admin->getAdmin();
$nbr=count($liste);

?>
<br/>

<h2 id="titre">Illustration d'un tableau dynamique</h2>


<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">Id Admin</th>
            <th class="ecart">Login</th>
            
            <th class="ecart">Mot de passe</th>
            <th class="ecart">Statut </th>
            
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td class="ecart"><?php print $liste[$i]['id_admin']; ?></td>
                
                <td><span contenteditable="true" name="login" class="ecart" id="<?php print $liste[$i]['id_admin']; ?>">
                        <?php print $liste[$i]['login']; ?></span>
                </td>
                               
                <td><span contenteditable="true" name="password" class="ecart" id="<?php print $liste[$i]['id_admin']; ?>">
                        <?php print $liste[$i]['password']; ?></span>
                </td>
                <td><span contenteditable="true" name="statut" class="ecart" id="<?php print $liste[$i]['id_admin']; ?>">
                        <?php print $liste[$i]['statut']; ?></span>
                </td>
               
            </tr>
            <?php
        }
        ?>
    </table>  
</div>