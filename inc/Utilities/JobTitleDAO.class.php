<?php 
class JobTitleDAO{
    private static $_db;

    static function initialize()    {
      self::$_db= new PDOService("Jobtitle");

        
    }

    static function getJobTiles(){
      $sql="SELECT * FROM title;";
       self::$_db->query( $sql);
       self::$_db->execute();
    return  self::$_db->resultSet();


    }

    static function getJobTile(int $id){
      $sql="SELECT * FROM title WHERE JobTitleId=:id;";
       self::$_db->query( $sql);
       self::$_db->bind(":id",$id);
       self::$_db->execute();
    return  self::$_db->singleResult();


    }









  }
?>