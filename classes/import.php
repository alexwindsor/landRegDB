<?php

class Import extends DbConn {

  private $conn;
  private $created_rows = 0;
  private $deleted_rows = 0;

  function __construct() {
    $this->conn = $this->dbConnect();
  }


  // there's only one table in the databases - it is not relational
  function importCsvFile() {

    if (isset($_POST["csv_file"]) && isset($_POST["list_type"])) {



      // so when the user imports a csv they also have the option of wiping everything first
      // this gives us the option of experimenting with different indexes in the code here, so that it gets tracked with git, rather than through phpmyadmin
      if (isset($_POST["delete"])) {

        // delete the table if it exists
        $this->conn->query("drop table if exists landregistry");

        // create the table
        $this->conn->query("CREATE TABLE `landregistry` (
          `title_no` varchar(16) DEFAULT NULL,
          `tenure` varchar(10) DEFAULT NULL,
          `property_address` varchar(255) DEFAULT NULL,
          `district` varchar(32) DEFAULT NULL,
          `county` varchar(32) DEFAULT NULL,
          `region` varchar(32) DEFAULT NULL,
          `postcode` varchar(12) DEFAULT NULL,
          `multi_address_indicator` varchar(1) DEFAULT NULL,
          `price_paid` int(10) UNSIGNED DEFAULT NULL,
          `proprietor_name_1` varchar(64) DEFAULT NULL,
          `company_reg_no_1` varchar(32) DEFAULT NULL,
          `proprietorship_cat_1` varchar(64) DEFAULT NULL,
          `country_1` varchar(64) DEFAULT NULL,
          `proprietor_1_add_1` varchar(255) DEFAULT NULL,
          `proprietor_1_add_2` varchar(255) DEFAULT NULL,
          `proprietor_1_add_3` varchar(255) DEFAULT NULL,
          `proprietor_name_2` varchar(64) DEFAULT NULL,
          `company_reg_no_2` varchar(32) DEFAULT NULL,
          `proprietorship_cat_2` varchar(64) DEFAULT NULL,
          `country_2` varchar(64) DEFAULT NULL,
          `proprietor_2_add_1` varchar(255) DEFAULT NULL,
          `proprietor_2_add_2` varchar(255) DEFAULT NULL,
          `proprietor_2_add_3` varchar(255) DEFAULT NULL,
          `proprietor_name_3` varchar(64) DEFAULT NULL,
          `company_reg_no_3` varchar(32) DEFAULT NULL,
          `proprietorship_cat_3` varchar(64) DEFAULT NULL,
          `country_3` varchar(64) DEFAULT NULL,
          `proprietor_3_add_1` varchar(255) DEFAULT NULL,
          `proprietor_3_add_2` varchar(255) DEFAULT NULL,
          `proprietor_3_add_3` varchar(255) DEFAULT NULL,
          `proprietor_name_4` varchar(64) DEFAULT NULL,
          `company_reg_no_4` varchar(32) DEFAULT NULL,
          `proprietorship_cat_4` varchar(64) DEFAULT NULL,
          `country_4` varchar(64) DEFAULT NULL,
          `proprietor_4_add_1` varchar(255) DEFAULT NULL,
          `proprietor_4_add_2` varchar(255) DEFAULT NULL,
          `proprietor_4_add_3` varchar(255) DEFAULT NULL,
          `date_added` date DEFAULT NULL,
          `more_proprietors` varchar(1) DEFAULT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

        // add the indexes
        $this->conn->query("
        ALTER TABLE `landregistry`
          ADD KEY `postcode` (`postcode`);
        ALTER TABLE `landregistry` ADD FULLTEXT KEY `property_address` (`property_address`);
        ");

      }

      // make the code to import the data from potentially very large csv files
      $import_sql = "LOAD DATA LOCAL INFILE '" . $_POST["csv_file"] . "' INTO TABLE landregistry FIELDS TERMINATED by ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n' IGNORE 1 LINES ";
      $import_sql .= "(@col1, @col2, @col3, @col4, @col5, @col6, @col7, @col8, @col9, @col10, @col11, @col12, @col13, @col14, @col15, @col16, @col17, @col18, @col19, @col20, @col21, @col22, @col23, @col24, @col25, @col26, @col27, @col28, @col29, @col30, @col31, @col32, @col33, @col34, @col35";

      if ($_POST["list_type"] == "offshore") {
        $import_sql .= ", @col36, @col37, @col38, @col39";
      }
      $import_sql .= ")";
      $import_sql .= "SET title_no = @col1, tenure = @col2, property_address = @col3, district = @col4, county = @col5, region = @col6, postcode = @col7, multi_address_indicator = @col8, price_paid = nullif(@col9,''), proprietor_name_1 = @col10, company_reg_no_1 = @col11, proprietorship_cat_1 = @col12, ";
      if ($_POST["list_type"] == "offshore") {
        $import_sql .= "country_1 = @col13, proprietor_1_add_1 = @col14, proprietor_1_add_2 = @col15, proprietor_1_add_3 = @col16, proprietor_name_2 = @col17, company_reg_no_2 = @col18, proprietorship_cat_2 = @col19, country_2 = @col20, proprietor_2_add_1 = @col21, proprietor_2_add_2 = @col22, proprietor_2_add_3 = @col23, proprietor_name_3 = @col24, company_reg_no_3 = @col25, proprietorship_cat_3 = @col26, country_3 = @col27, proprietor_3_add_1 = @col28, proprietor_3_add_2 = @col29, proprietor_3_add_3 = @col30, proprietor_name_4 = @col31, company_reg_no_4 = @col32, proprietorship_cat_4 = @col33, country_4 = @col34, proprietor_4_add_1 = @col35, proprietor_4_add_2 = @col36, proprietor_4_add_3 = @col37, date_added = concat(substring(@col38, -4, 4), substring(@col38, -7, 2), substring(@col38, 1, 2)), more_proprietors = @col39";
      }
      elseif ($_POST["list_type"] == "uk") {
        $import_sql .= "country_1 = '', proprietor_1_add_1 = @col13, proprietor_1_add_2 = @col14, proprietor_1_add_3 = @col15, proprietor_name_2 = @col16, company_reg_no_2 = @col17, proprietorship_cat_2 = @col18, country_2 = '', proprietor_2_add_1 = @col19, proprietor_2_add_2 = @col20, proprietor_2_add_3 = @col21, proprietor_name_3 = @col22, company_reg_no_3 = @col23, proprietorship_cat_3 = @col24, country_3 = '', proprietor_3_add_1 = @col25, proprietor_3_add_2 = @col26, proprietor_3_add_3 = @col27, proprietor_name_4 = @col28, company_reg_no_4 = @col29, proprietorship_cat_4 = @col30, country_4 = '', proprietor_4_add_1 = @col31, proprietor_4_add_2 = @col32, proprietor_4_add_3 = @col33, date_added = concat(substring(@col34, -4, 4), substring(@col34, -7, 2), substring(@col34, 1, 2)), more_proprietors = @col35";
      }


      $this->conn->query($import_sql);

      $this->created_rows = $this->conn->affected_rows;

      header("Location: index.php?created_rows=" . $this->created_rows);

    }




  }




}
