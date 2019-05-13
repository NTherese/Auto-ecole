<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientDB
 *
 * @author meril
 */
class ClientDB extends Client{
   private $_db;
    private $_array = array();
    
    public function __construct($db){
        $this->_db = $db;
    }
    public function AddClient(array $data){
        $query="select ajouter_client(:nom,:prenom,:adresse,:datenaiss,:login,:password,:email) as retour";
        try{
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':nom',$data['name'],PDO::PARAM_STR);
            $resultset->bindValue(':prenom',$data['surname'],PDO::PARAM_STR);
            $resultset->bindValue(':adresse',$data['adr'],PDO::PARAM_STR);
            $resultset->bindValue(':datenaiss',$data['dn'],PDO::PARAM_STR);
            $resultset->bindValue(':login',$data['login'],PDO::PARAM_STR);
            $resultset->bindValue(':password',$data['mdp'],PDO::PARAM_STR);
            $resultset->bindValue(':email',$data['mail'],PDO::PARAM_STR);
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
    
    //Ici on peut faire le CRUD specifique à la classe
    public function getClient(){
        try{
            $query = "select * from client ";
           // print $query;
            $resultset = $this->_db->prepare($query);
            $resultset->execute();

            while($data = $resultset->fetch()){
                $_array[] = new Client($data);
            }        
        }
        catch(PDOException $e){
            print $e->getMessage();
        }
        if(!empty($_array)){
            return $_array;
        }
        else {
            return null;
        }
    }
}
