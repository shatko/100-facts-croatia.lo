<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>TEST</title>
  </head>
  <body>
    <?php

      include ('connect.php');

      // gets data
      $selector = 2;

      $query = "SELECT * FROM crofacts WHERE croid = $selector";
      if ($is_query_running = mysql_query($query)) {
        echo "query running !!".'<br>';
      }
      else {
        echo "query NOT running !!";
      }
      while ($query_execute = mysql_fetch_assoc($is_query_running)){
        echo '<img src = "'.$query_execute['croimages'].'"'.'<br>'.$query_execute['croexplained'];
      }

    ?>
  </body>
</html>