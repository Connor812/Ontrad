<?php

require_once ("config/db.php");

    // Retrieve the search query and selected options
    $searchQuery = $_POST["searchQuery"];

    $instrumentals = isset($_POST["instrumentals"]) ? $_POST["instrumentals"] : false;
    $images = isset($_POST["images"]) ? $_POST["images"] : false;
    $circa = $_POST["circa"];
    
    $region = $_POST["region"];

    // Construct the SQL query based on the search criteria
    $sql = "SELECT * FROM newTable WHERE shortanno LIKE '%$searchQuery%' ";

    // Add additional conditions based on the selected options
    if ($instrumentals ==1) 
    {
        $sql .= " AND checkbox = 1";
    }
    
    if (!empty($circa)) 
    {
        $sql .= " AND circa = '$circa'";
    }

    if (!empty($region)) 
    {
        $sql .= " AND region = '$region'";
    }
    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Display the search results
    if (mysqli_num_rows($result) > 0) 
    {
        while ($row = mysqli_fetch_assoc($result)) 
        {
            // Output each search result
            $title = $row['Stitle'];
            $image = $row['imageFull'];
            $id = $row['ID'];
            echo "<div class='row pt-0'>
                    <div class='col-sm-3'><img style='width:80px;' src='images/$image' /></div>
                    <div class='col-sm-5'>$title</div>
                    <div class='col-sm-2'><a class='btn btn-info' href='edit.php?id=$id'>Open</a></div>
                </div>";
            echo "<hr style='margin-top: 0;'>";
        }
    } else {
        echo "No results found.";
    }
    // Close the database connection
    mysqli_close($conn);
?>
