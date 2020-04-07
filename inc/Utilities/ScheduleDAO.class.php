<?php
class ScheduleDAO{

    private static $_db;

    static function initialize()    {
      self::$_db= new PDOService("Schedule");

        
    }

    

}
?>