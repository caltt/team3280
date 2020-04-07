<?php
 
 class EmployeeDAO{
    private static $_db;

    static function initialize()    {
      self::$_db= new PDOService("Employee");

        
    }

    static function getEmployees(){
      $sql="SELECT * FROM employee;";
       self::$_db->query( $sql);
       self::$_db->execute();
    return  self::$_db->resultSet();


    }
    static function getEmployee(string $id){
      $sql="SELECT * FROM employee WHERE EmployeeUserId=:id;";
       self::$_db->query( $sql);
       self::$_db->bind(":id",$id);
       self::$_db->execute();
    return  self::$_db->singleResult();


    }

    







 }







?>