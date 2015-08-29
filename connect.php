<?php

  // basic way to connect to a DB:  mysql_connect('localhost','root','Zagreb2010') or die ("NOT connected to a database!!!");

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "Zagreb2010";
  $dbname = "mladen";
  $dberror1 = "Not connected to a DB";

  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  if (!$conn->set_charset("utf8")) {
      printf("Error loading character set utf8: %s\n", $conn->error);
  } else {
      //printf("Current character set: %s\n", $conn->character_set_name());
  }
?>