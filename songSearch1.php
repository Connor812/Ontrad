<?php
require_once("config/db.php");
    // if(isset($_POST['search_query'])){
    //     $search = $_POST['search_query'];
    //     $ids = null;
    //     if (isset($_POST['transferred_ids'])) {
    //         $transferred_ids = $_POST['transferred_ids'];
    //         $ids = implode(",", $transferred_ids);

    //     }

    //     $sql = "SELECT * FROM `newtable` WHERE `Stitle` LIKE '%".$search."%'";

    //     if (!is_null($ids)) {
    //         $sql .= " AND `ID` NOT IN ($ids)";
    //     }
        
    //     $result = mysqli_query($conn, $sql);
    //         if ($result) {
    //             while ($row = mysqli_fetch_assoc($result)) {
    //                 echo "
    //                 <tr>
    //                     <td style='padding:0;'>
    //                         <label class='row-label song-label' data-song-id='" . $row['ID'] . "' for='" . $row['ID'] . "' style='margin:5px;'>
    //                             <input type='checkbox' class='song_checkbox' id='" . $row['ID'] . "' value='" . $row['ID'] . "'>
    //                             " . $row['Stitle'] . "
    //                         </label>
    //                     </td>
    //                 </tr>
    //             ";
    //             }
    //         } else {
    //             echo "No Result found";
    //         }
    // } else {
    //     echo " ";
    // }


    if(isset($_POST['search_query'])){
        $search = $_POST['search_query'];
        $ids = null;
        if (isset($_POST['transferred_ids'])) {
            $transferred_ids = $_POST['transferred_ids'];
            $ids = implode(",", $transferred_ids);
        }
    
        // $sql = "SELECT *, 
        //         (SELECT COUNT(*) FROM themes_songs WHERE themes_songs.song_id = newtable.ID) AS theme_count 
        //         FROM newtable 
        //         WHERE `Stitle` LIKE '%" . $search . "%'";

        $sql = "SELECT * FROM `newtable` 
        WHERE `Stitle` LIKE '%" . $search . "%'";
    
        if (!is_null($ids)) {
            $sql .= " AND `ID` NOT IN ($ids)";
        }
        
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Check if the song has less than 3 themes
                // if ($row['theme_count'] < 3) {
                    echo "
                    <tr>
                        <td style='padding:0;'>
                            <label class='row-label song-label' data-song-id='" . $row['ID'] . "' for='" . $row['ID'] . "' style='margin:5px;'>
                                <input type='checkbox' class='song_checkbox' id='" . $row['ID'] . "' value='" . $row['ID'] . "'>
                                " . $row['Stitle'] . "
                            </label>
                        </td>
                    </tr>
                    ";
                // }
            }
        } else {
            echo "No Song found";
        }
    } else {
        echo "No Song Found";
    }
    



    
?>