<?php
include "constants.php";

class Database {
  private $server = LOCALHOST;
  private $username = DB_USERNAME;
  private $password = DB_PASSWORD;
  private $db = DB_NAME;
  private $conn;
  public function __construct(){
      try {
        $datasource = "mysql:host=" . $this->server . ";dbname=" . $this->db;
        $this->conn = new PDO($datasource,$this->username,$this->password);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

       
      } catch(DOException $exception){
        exit('Failed to connect to database!');
      }
  }
  public function connection(){
    return $this->conn;
  }
  
  public function query($sql,$param){
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute($param);
    
  }

  public function close(){
    return $this->conn = null;
  }
}

?>