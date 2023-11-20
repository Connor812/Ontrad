        <?php 
            $query = " select * from imagemain ";
            $result = mysqli_query($db, $query);
    
            while ($data = mysqli_fetch_assoc($result)) {
        ?>
        <img src="./image/<?php echo $data['filename']; ?>">
 
        <?php
        }
        ?>