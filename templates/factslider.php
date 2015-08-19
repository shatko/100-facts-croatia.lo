<script type="text/javascript"> 

      var bla=3
      <?php
         $mladen = "<script>document.write(bla)</script>"; 
      ?>
</script>

<body>
   <?php
        echo $mladen; 
        $x = 2;
        include('factcontainer/fact_'.$mladen.'.php');
        switch($_GET['changePage']) { 
            default: 
            case 'default': 
            include('factcontainer/fact_1.php'); 
            break; 
            case 'page2':
            include('factcontainer/fact_'.$x.'.php');
        }
    ?>

    <div class="btn">
        <!-- <button type="button" class="btn">Next <span class="desno">(desna strelica)</span></button> -->
       <a href="?changePage=page2">Page2</a>
        <input type="button" value="Count" id="countButton" />
    </div>
    <script type="text/javascript">
      var count = 0;
      var button = document.getElementById("countButton");
      button.onclick = function(){
        count++;   
        console.log(count);
      }
    </script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>