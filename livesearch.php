<?php
if (isset($_POST['input'])) {
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'moviedb';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, 3307);

    $input = mysqli_real_escape_string($conn, $_POST['input']);

    $query = "SELECT content.Type, content.Trailer, content.Description, content.Length, content.ID, content.Title, content.Date, content.Status, content.Rating, content.Cover, director.Director, studio.Studio, GROUP_CONCAT(genre.Genre SEPARATOR ', ') as Genre
    FROM content
    JOIN director ON content.ID = director.ID
    JOIN studio ON content.ID = studio.ID
    JOIN genre ON content.ID = genre.ID
    where content.Title like '%{$input}%'
    GROUP BY content.ID";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // echo '<table class="table  table-striped" style = "position: absolute; background-color: rgba(18,21,30, 0.7);">
        //     <thead>
        //     </thead>
        //     <tbody>';
        echo '<div style = "diplay: block; position: fixed;">';
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $i++;
            $title = $row['Title'];
            $poster = $row['Cover'];
            $id = $row['ID'];
            $type = $row['Type'];
            if ($i > 3) {
                echo '<div id = "searchMore" style="display: flex;margin-top:1%;" >
                        <center style="width:100%;">
                            <a onclick="submitForm()" id="myAnchorTag" style="width:100%;">
                                <h6 >Show More</h6>
                            </a>
                        </center>
                    </div>
                    <hr>';
                break;
            } else {
                echo '<div style="display: flex;align-items: flex-start;margin-top:1%;" >
                        <a href="movie-details.php?id=' . $id . '&type=' . $type . '">
                            <img src="' . $poster . '" alt="" style = "width: 50px;float: left;">
                        </a>
                        <a href="movie-details.php?id=' . $id . '&type=' . $type . '">
                            <h6 style="margin-top: 0;text-align:center;">' . $title . '</h6>
                        </a>
                    </div>
                    <hr>
                        ';
            }
        }
        echo '</div>';
        // echo '</tbody>
        // </table>';
    } else {
        echo "<h6 class='text-danger text-center mt-3' style = 'position: absolute;' >No Movies or TV shows found! </h6>";
    }
};
