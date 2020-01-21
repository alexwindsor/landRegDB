<?php

class DbConn {

  private $server;
  private $username;
  private $password;
  private $database;


  protected function dbConnect() {

    $this->server = "localhost";
    $this->username = "root";
    $this->password = "street";
    $this->database = "landregistry";

    $conn = new mysqli($this->server, $this->username, $this->password, $this->database);

    return $conn;

  }


}
