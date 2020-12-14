<?php
  // define("DB_HOST","localhost");
  // define("DB_USER","root");
  // define("DB_NAME","archiconnect");
  // define("DB_PASS","");
  // $mysqli=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_USER);
  //
  // //check connection
  // if ($mysqli===false) {
  //   die("Could not connect to database.".$mysqli->connect_error);
  // }
  /**
   *
   */
  class Database
  {
    private $host="localhost";
    private $db_name="archiconnect";
    private $username="root";
    private $password="";
    private $conn;

    public  function getConnection()
    {
      $this->conn=null;
      try {
          // $this->conn=new PDO("mysql:host=".$this->host,"dbname".$this->db_name,$this->username,$this->password);
          $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);

      } catch (PDOException $e) {
          echo "Connection error".$e->getMessage();
      }
        return $this->conn;
    }
  }

 ?>
