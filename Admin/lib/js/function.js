$(document).ready(function(){
    
    //PREMIER AJAX : afficher les données du client
    //Code pour alimentation automatique des champs
    $('#password').blur(function () {
        login= $('#login').val();
        statut = $('#statut').val();
        
        if (($.trim(login) != '' && $.trim(statut != '')) ) {
            //alert("email1 = "+email1+" et email2 = "+email2+ " et password = "+password);
            var recherche = "login=" + login + "&statut=" + statut;           
            $.ajax({
                type: 'GET',
                data: recherche,
                dataType: "json",
                url: './admin/lib/php/ajax/RechercheAdmin.php',
                success: function (data) { // retournÃ© par le fichier php
                    $('#login').val(data[0].login);
                    $('#statut').val(data[0].statut);
                    
                    console.log(data[0].login);
                }
            });
           
        }
    });
    });