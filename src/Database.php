<?php

class Database
{
  private $conn;

  public function __construct(){
    // Create (connect to) SQLite database in file
    $this->conn = new PDO('sqlite:src/db.sqlite3');

    //Development only - shows SQL errors / warnings
    $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
  }

/***************************/
/*General Methods          */
/***************************/
/*
* Sample data
*/
  public function saveEntrie($data)
  {
    $sql = "INSERT INTO entries (date, text) "
             ."VALUES (:date, :text)";
    $q = $this->conn->prepare($sql);
    $q->execute(array(':date'=>$data['date'],':text'=>$data['text']));
    return true;
  }


  public function getEntries()
  {
  
    $sql="SELECT * FROM entries";
    $q = $this->conn->query($sql) or die("failed!");
    while($r = $q->fetch(PDO::FETCH_ASSOC))
    {
        $data[]=$r;
    }
    return $data;
  }

  public function updateLastSave($date,$olddate){

    $sql = "UPDATE lastSave SET"
            . " date=:date"
            ." WHERE date=:olddate";
    $q = $this->conn->prepare($sql);
    $q->execute(array(':date'=>$date,':olddate'=>$olddate));
    var_dump($date);
    var_dump($olddate);
  }
  
  public function lastSave()
  {
  
    $sql="SELECT date FROM lastSave";
    $q = $this->conn->prepare($sql);
    $q->execute();
    $r = $q->fetch(PDO::FETCH_ASSOC);
    return $r['date'];

  }

  public function createTables()
  {

      $this->conn->exec("CREATE TABLE IF NOT EXISTS entries (date TEXT, text TEXT)");
      $this->conn->exec("CREATE TABLE IF NOT EXISTS lastSave (date TEXT)");
      $this->conn->exec("INSERT INTO lastSave (date) VALUES ('31.12.1999 12:59PM')");

  }
}