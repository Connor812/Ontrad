<?php
require_once("config/db.php");

if (isset($_POST['search_query'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search_query']);

    $sql = "SELECT * FROM newtable WHERE `Stitle` LIKE '%" . $search . "%'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
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
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo ""; // This empty echo might not be necessary
}
