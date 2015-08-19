<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Increment count when button is clicked</title>
  </head>

  <body>
    <input type="button" value="Count" id="countButton" />


    <script type="text/javascript">
      var count = 0;
      var button = document.getElementById("countButton");
      button.onclick = function(){
        count++;   
        console.log(count);
      }

    </script>
  </body>
</html>