<!-- javascript for the next and previous arrow -->
<script type="text/javascript">
    window.addEventListener("keydown", goNext, false); 
    function goNext(e) {
        switch(e.keyCode) {
            case 39:
                var buttonNext = document.getElementById('button-next');
                document.location.href = buttonNext.href;
                break;
            case 37:
                var buttonPrev = document.getElementById('button-prev');
                document.location.href = buttonPrev.href;
                break;
        }   
    }
</script>
<!-- PHP starts -->
<?php 
// database stuff 
    $sql = "SELECT croid FROM crofacts";
    $data = mysqli_query($conn, $sql);
// puts the key  => value of croid column into an array
    while($row = mysqli_fetch_array($data)){
        $croid_array[] = $row['croid'];
    }
/* shortcode for the if loop so we get a false value on initial entry not a NULL*/ 
    $factId = isset($_GET['fact']) ? $_GET['fact'] : false;
    if ($factId == false) {
        $randomCroid = array_rand($croid_array);
        $factId = $croid_array[$randomCroid];
    }
/* sql2 references to the row by selected id */
    $sql2 = "SELECT * FROM crofacts WHERE croid = $factId";
    $result2 = $conn->query($sql2);
    while ($row = $result2->fetch_assoc()) {
        $display_image = $row['croimages'];
        $display_explained = $row['croexplained'];
        $display_link = $row['crolink'];
        $display_name = $row['croname'];
    }
    $conn->close();
/* random select fact button function */ 
    function getRandomFactId($currentId, $EveryCroid) {
        $currentId = array_rand($EveryCroid);
        $randomFactId = $EveryCroid[$currentId];
        return $randomFactId;
    }
/* increment by one fact, button */
    function getNextFactId($currentId, $EveryCroid) {
        reset($EveryCroid);
        while (!in_array(current($EveryCroid), [$currentId, null])) {
           next($EveryCroid);
        }
        $nextFactId = next($EveryCroid);
        if ($nextFactId == false) {
            $nextFactId = reset($EveryCroid);
        }
        return $nextFactId;
    }
/* decrement by one fact, button */ 
    function getPrevFactId($currentId, $EveryCroid) {
        reset($EveryCroid);
        while (!in_array(current($EveryCroid), [$currentId, null])) {
           next($EveryCroid);
        }
        $prevFactId = prev($EveryCroid);
        $EndString = 1;
        if ($prevFactId < $EndString) {
            $prevFactId = end($EveryCroid);
        }
        return $prevFactId;
    }
?>
<body>
<!-- main container start -->
    <div class="container">
        <div class="facts"> 
            <div class="row 
            ">
<!-- image area -->
                <div class="col-md-6 imgholder">
                    <img src="img/<?php echo $display_image; ?>" alt="<?php echo $display_name; ?>">
                    <p></p>
                </div>
<!-- explaination text area -->
                <div class="col-md-6">
                    <h2>
                        <?php
                            echo $display_explained;
                        ?>
                    </h2>
                </div>
            </div>
<!-- want to know more link area -->
            <p> Želim znati više: <a class="linkmore" href="<?php echo $display_link;?>" target=_blank>link!</a></p>
<!-- buttons -->
            <div class="buttons-container">
                <a id="button-next" class="buttons" href="?fact=<?php echo getNextFactId($factId, $croid_array); ?>">sljedeći &#8594;</a>
                <a class="buttons" href="?fact=<?php echo getRandomFactId($factId, $croid_array); ?>">slučajni</a>
                <a id="button-prev" class="buttons" href="?fact=<?php echo getPrevFactId($factId, $croid_array); ?>">&#8592; predhodni</a>
            </div>
        </div>
    </div>
<!-- main container end -->
</body>