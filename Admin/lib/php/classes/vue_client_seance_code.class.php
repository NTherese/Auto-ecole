<?php

class vue_client_seance_code {
    private $_db;
    private $_array = array();
    
    public function __construct($db){
        $this->_db = $db;
    }
    
    public function getAllCodeClient(){
        try{
            $query = "select * from vue_client_seance_code";
           // print $query;
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            //verifier si ligne ci-dessous est ok
            //$data=$resultset->fetchAll();
            while($data = $resultset->fetch()){
                $_array[] =$data;
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
