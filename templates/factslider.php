<script type="text/javascript"> 
</script>

<body>
    <div class="container">
        <?php

        $selector = 1;

        $query = "SELECT * FROM crofacts WHERE croid = $selector";
        
        if ($is_query_running = mysql_query($query)) {
            echo "query running !!".'<br>';
        }
        else {
            echo "query NOT running !!";
        }

        
        while ($query_execute = mysql_fetch_assoc($is_query_running)){
            $display_image = ('<img src = "'.$query_execute['croimages'].'"');
            $display_explained = ($query_execute['croexplained']);
            $display_link = ($query_execute['crolink']);
            }
        ?>



        <div class="row ">
            <div class="col-md-6 imgholder">
                <?php
                    echo $display_image;
                ?>
                <p></p>
            </div>
            <div class="col-md-6">
                <h2>
                    <?php
                        echo $display_explained;
                    ?>
                </h2>
            </div>
        </div>
        <?php
            echo $display_link;
        ?>
    </div>



    <div class="btn">
        <button type="button" class="btn">Next <span class="desno">(desna strelica)</span></button>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
