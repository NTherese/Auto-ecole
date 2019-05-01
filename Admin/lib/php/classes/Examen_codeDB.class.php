<?php

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
    
    public function AddExamen($data){
        //$_db->beginTransaction();
        try{
            $query="insert into examen_code ";
            $query.=" (dateexamen,heureexamen,lieuexamen)";
            $query.=" values(:dateexamen,:heureexamen,:lieuexamen)";
            $resultset=$this->_db->prepare($query);
            $resultset->bindValue(':dateexamen',$data['dateexamen']);
            $resultset->bindValue(':heureexamen',$data['heureexamen']);
            $resultset->bindValue(':lieuexamen',$data['lieuexamen']);
            $resultset->execute();
            //print "Insertion effectuée!!!!";
        }
        catch(PDOException $e){
            print "Echec de l'insertion ".$e->getMessage();
        }
        //var_dump($data);
       // $_db->commit();
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
