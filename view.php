<?php
require_once ("config/db.php");
require_once ("php/header.php");
?>
<style>

</style>
<div class = "bg-dark navbar-dark py-3">
  <form class = "contain d-flex align-items-center">
    <h4 class = "label serch"><label for="search">Search:</label></h4>
    <input class = "search-frm" type="text" id="search" name="search" placeholder = "Search Here">
  </form>
</div>
<div class="cont mt-5">


<?php
// Prepare the SQL statement to select data from the database
$sql = "SELECT * FROM newTable";

// Execute the SQL statements
$result = mysqli_query($conn, $sql);

// Check if any data was returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row in a table
    echo " <table><tr>
    <th>Song Num</th>
    <th>Title</th>
    <th>Song Year</th>
    <th>Song Composer</th>
    <th>Song Artist</th>
    <th>Circa</th>
    <th>Region</th>
    <th>Short Anno</th>
    <th>Long Anno</th>
    <th>Image Anno</th>
    <th>Image Full</th>
    <th>Image Thumbr</th>
    <th>Sheet Anno</th>
    <th>Sheet Music</th>
    <th>Audio Anno</th>
    <th>Audio 1</th>
    <th>Audio 2</th>
    <th>Video Anno</th>
    <th>Video 1</th>
    <th>Video 2</th>
    <th>Theme 1</th>
    <th>Theme 2</th>
    <th>Theme 3</th>
    <th>File To Upload</th>
    
    </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" 
        . $row["songnum"] . 
        "</td><td>" 
        . $row["Stitle"] . 
        "</td><td>" 
        . $row["songyear"] . 
        "</td><td>" 
        . $row["songcomposer"] . 
        "</td><td>"
        . $row["songartist"] . 
        "</td><td>" 
        . $row["circa"] . 
        "</td><td>"
        . $row["region"] . 
        "</td><td>" 
        . $row["shortanno"] . 
        "</td><td>"
        . $row["longanno"] . 
        "</td><td>" 
        . $row["imageanno"] . 
        "</td><td>"
        . $row["imageFull"] . 
        "</td><td>" 
        . $row["imageThumb"] . 
        "</td><td>"
        . $row["sheetanno"] . 
        "</td><td>" 
        . $row["sheetmusic"] . 
        "</td><td>"
        . $row["audioanno"] . 
        "</td><td>" 
        . $row["audio1"] .
        "</td><td>"
        . $row["audio2"] . 
        "</td><td>" 
        . $row["videoanno"] . 
        "</td><td>".
         $row["video1"] . 
         "</td><td>" 
         . $row["video2"] . 
         "</td><td>"
         . $row["theme1"] . 
         "</td><td>" 
         . $row["theme2"] . 
         "</td><td>"
         . $row["theme3"] . 
         "</td><td>" 
         . $row["fileToUpload"] . 
         "</td><td>" 
         .  $row["longanno"]. 
         
         "</td><td><a href=edit.php?id="
         . $row["ID"] . 
         
         
           ">Edit</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "No data available";
}
?>
    
    </div>
    <div id="search-results">
    </div>
    <script>
jQuery(document).ready(function(){
    jQuery('#search').on('input', function(){
        var inputVal = jQuery(this).val();
        if(inputVal){
            jQuery.ajax({
                url: 'search.php',
                type: 'POST',
                data: {search: inputVal},
                success: function(data){
                    //display search results
                    //for example:
                    jQuery('#search-results').html(data);
                }
            });
        } else {
            //clear search results
            $('#search-results').empty();
        }
    });
});
</script>
