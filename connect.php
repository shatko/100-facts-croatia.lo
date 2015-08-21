<?php

  // basic way to connect to a DB:  mysql_connect('localhost','root','Zagreb2010') or die ("NOT connected to a database!!!");

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "Zagreb2010";
  $dbname = "mladen";
  $dberror1 = "Not connected to a DB";

  $conn =mysql_connect($dbhost, $dbuser, $dbpass, $dbname) or die($dberror1);

  if ($conn == true) {
    echo "Connection to a DB is OK!";
  }

  $select_db =mysql_select_db('mladen') or die ("   Database not selected!");

?>