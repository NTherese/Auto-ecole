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
