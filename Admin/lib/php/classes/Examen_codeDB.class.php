<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Examen_codeDB
 *
 * @author meril
 */
class Examen_codeDB extends Examen_code {
   private $_db;
    private $_array = array();
    
    public function __construct($db){
        $this->_db = $db;
    }
    //Ici on peut faire le CRUD specifique à la classe
    public function getExamenCode(){
        try{
            $query = "select * from examen_code ";
           // print $query;
            $resultset = $this->_db->prepare($query);
            $resultset->execute();

            while($data = $resultset->fetch()){
                $_array[] = new Examen_code($data);
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
