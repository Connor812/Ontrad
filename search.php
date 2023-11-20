<?php
require_once ("config/db.php");
$searchTerm = $_POST['search'];

//run query
$sql = "SELECT * FROM newtable WHERE Stitle LIKE '$searchTerm'";

$result =mysqli_query($conn, $sql);

//display results
if($result->num_rows > 0){
	  echo '<p class = "contain search-rs my-3">Search Results</p> <div class="search-result cont my-3">';
     
       echo '<table><tbody><tr>';
       	echo '<th>Songnum</th>';
       	echo "<th>Title</th>";
       	echo "<th>Song Year</th>";
       	echo "<th>Song Composer	</th>";
       	echo "<th>Song Artist	</th>";
       	echo "<th>Circa	</th>";
       	echo "<th>Region</th>";
       	echo "<th>Short Anno	</th>";
       	echo "<th>Long Anno		</th>";
       	echo "<th>Image Anno	</th>";
       	echo "<th>Image Full		</th>";
       	echo "<th>Image Thumbr		</th>";
       	echo "<th>Sheet Anno			</th>";
       	echo "<th>Sheet Music 		</th>";
       	echo "<th>Audio Anno			</th>";
       	echo "<th>Audio 1			</th>";
       	echo "<th>Audio 2		</th>";
       	echo "<th>Video Anno			</th>";
       	echo "<th>Video 1		</th>";
       	echo "<th>Video 2		</th>";
       	echo "<th>Theme 1			</th>";
       	echo "<th>Theme 2			</th>";
       	echo "<th>Theme 3			</th>";
       	echo "<th>File To Upload			</th>";
       	echo "</tr>";
    while($row = $result->fetch_assoc()){
      

       echo "<tr>";
      	echo '<td>'.$row['songnum'].'</td>';
        echo '<td>' . $row['Stitle'] . '</td>';
        echo '<td>' . $row['songcomposer'] . '</td>';

        echo '<td>' . $row['songartist'] . '</td>';

        echo '<td>' . $row['circa'] . '</td>';

        echo '<td>' . $row['region'] . '</td>';

        echo '<td>' . $row['shortanno'] . '</td>';

        echo '<td>' . $row['longanno'] . '</td>';

        echo '<td>' . $row['imageanno'] . '</td>';

        echo '<td>' . $row['imageFull'] . '</td>';

        echo '<td>' . $row['imageThumb'] . '</td>';

        echo '<td>' . $row['sheetanno'] . '</td>';

        echo '<td>' . $row['sheetmusic'] . '</td>';

        echo '<td>' . $row['audioanno'] . '</td>';

        echo '<td>' . $row['audio1'] . '</td>';

        echo '<td>' . $row['audio2'] . '</td>';

        echo '<td>' . $row['videoanno'] . '</td>';

        echo '<td>' . $row['video1'] . '</td>';
        echo '<td>' . $row['video2'] . '</td>';
        echo '<td>' . $row['theme1'] . '</td>';
        echo '<td>' . $row['theme2'] . '</td>';
        echo '<td>' . $row['theme3'] . '</td>';
       	echo '<td>' . $row['fileToUpload'] . '</td>';
       	echo "</tr>";
       
    }
     echo '</tbody></table>';
} else {
    echo '<p class = "contain my-3 nf">No results found.</p>';
}

$conn->close();

?>