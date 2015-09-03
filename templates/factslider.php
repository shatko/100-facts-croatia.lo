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

<body>
    <?php 
        $sql1 = "SELECT * FROM crofacts";
        $result1 = $conn->query($sql1);
        $factIdMin = 1;
        $factIdMax = $result1->num_rows;
        $factId = isset($_GET['fact']);
        if ($factId == NULL) {
            $factId = rand($factIdMin,$factIdMax);
        }
        $sql2 = "SELECT * FROM crofacts WHERE croid = $factId";
        $result2 = $conn->query($sql2);
        while ($row = $result2->fetch_assoc()) {
            $display_image = $row['croimages'];
            $display_explained = $row['croexplained'];
            $display_link = $row['crolink'];
        }
        $conn->close();
    ?>
    <?php 
    function getRandomFactId($randomIdMin, $randomIdMax) {
        $randomFactId = rand($randomIdMin, $randomIdMax);
        return $randomFactId;
    }
    function getNextFactId($currentId, $factIdMaxNext) {
        $nextFactId = $currentId + 1;
        if ($nextFactId > $factIdMaxNext) {
            $nextFactId = 1;
        }
        return $nextFactId;
    }
    function getPrevFactId($currentId, $factIdMaxNext) {
        $prevFactId = $currentId - 1;
        if ($prevFactId < 1) {
            $prevFactId = $factIdMaxNext;
        }
        return $prevFactId;
    }
    ?>
    <div class="container">
        <div class="facts"> 
            <div class="row ">
                <div class="col-md-6 imgholder">
                    <img src="<?php echo $display_image; ?>" alt="">
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
            <p> Želim znati više: <a class="linkmore" href="<?php echo $display_link;?>" target=_blank>link!</a></p>
            <div class="buttons-container">
                <a id="button-next" class="buttons" href="?fact=<?php echo getNextFactId($factId, $factIdMax); ?>">sljedeći</a>
                <a class="buttons" href="?fact=<?php echo getRandomFactId($factIdMin, $factIdMax); ?>">slučajni</a>
                <a id="button-prev" class="buttons" href="?fact=<?php echo getPrevFactId($factId, $factIdMax); ?>">predhodni</a>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
