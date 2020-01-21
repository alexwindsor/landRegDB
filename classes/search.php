<?php

class Search extends DbConn {

  private $conn;


  function __construct() {
    $this->conn = $this->dbConnect();
  }



  function searchRows() {

    $sql_statement = "select * from landregistry where ";


    if ($_POST["title_no"] != "") {
      $sql_statement .= "title_no = '" . $_POST["title_no"] . "' and ";
    }

    if (isset($_POST["tenure"])) {
      $sql_statement .= "tenure = '" . $_POST["tenure"] . "' and ";
    }




    if ($_POST["property_address"] != "") {
      $sql_statement .= "match (property_address) against ('" . $_POST["property_address"] . "' in natural language mode) and ";
    }






    if ($_POST["postcode"] != "") {
      $sql_statement .= "postcode = '" . $_POST["postcode"] . "' and ";
    }

    if ($_POST["district"] != "") {
      $sql_statement .= "district = '" . $_POST["district"] . "' and ";
    }

    if ($_POST["county"] != "") {
      $sql_statement .= "county = '" . $_POST["county"] . "' and ";
    }

    if ($_POST["region"] != "") {
      $sql_statement .= "region = '" . $_POST["region"] . "' and ";
    }

    if ($_POST["proprietor_name_1"] != "") {
      $sql_statement .= "proprietor_name_1 like '%" . $_POST["proprietor_name_1"] . "%' and ";
    }




    if (substr($sql_statement, -5) == " and ") {
      $sql_statement = substr($sql_statement, 0, -4) . "limit 0, 10";
    }
    else {
      header("Location: index.php");
    }

    $sql = $this->conn->prepare($sql_statement);
    $sql->execute();

    $search_results = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

    return $search_results;

  }




}
