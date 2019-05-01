<?php

class AdminDB extends Admin {
     private $_db;
    private $_array = array();
    
    public function __construct($db){
        $this->_db = $db;
    }
    
    public function AddAdmin(array $data){
        $query="select ajouter_admin(:login,:password,:statut) as retour";
        try{
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':login',$data['login'],PDO::PARAM_STR);
            $resultset->bindValue(':password',$data['mdp'],PDO::PARAM_STR);
            $resultset->bindValue(':statut',$data['statut'],PDO::PARAM_STR);
            $resultset->execute();
            $retour=$resultset->fetchColumn(0);
            return $retour;
        }
        catch(PDOException $e){
            print "<br/>Echec de l'insertion ";
            print $e->getMessage();
        }
        //var_dump($data);
       // $_db->commit();
    }
    
    public function getAdmin(){
        $query = "select * from admin";
        try{
            
            $resultset = $this->_db->prepare($query);
            //$resultset->bindValue(':login',$login,PDO::PARAM_STR);
            //$resultset->bindValue(':password',$password,PDO::PARAM_STR);
            $resultset->execute();      
        }
        catch(PDOException $e){
            print $e->getMessage();
        }
        while($data = $resultset->fetch()){
            try{
                $_array[] = $data;
            }
             catch(PDOException $e){
            print $e->getMessage();
        }   
           }
           return $_array;
        
        
    }
}
