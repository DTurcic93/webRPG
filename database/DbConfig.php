<?php
class DbConfig {
  private static $instance = null;
  public static function getInstance() {
    if(self::$instance == null) {
      try {
     self::$instance = new PDO("mysql:host=localhost;dbname=mmorts",
      'root','');
      } catch (PDOException $e) {
        die("Error while connecting to database!");
      }
    }
    return self::$instance;
  }
}
