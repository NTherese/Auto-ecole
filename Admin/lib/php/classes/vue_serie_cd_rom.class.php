<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vue_serie_cd_rom
 *
 * @author meril
 */
class vue_serie_cd_rom {
    private $_db;
    private $_array = array();
    
    public function __construct($db){
        $this->_db = $db;
    }
    
    public function getAllCdSerie(){
        try{
            $query = "select * from vue_serie_cd_rom";
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
