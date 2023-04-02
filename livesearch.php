<?php 
if(isset($_POST['input'])){
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'moviedb';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name,3307);

    $input = mysqli_real_escape_string($conn, $_POST['input']);

    $query = "SELECT Title, Cover, ID, Type FROM tvshows WHERE Title LIKE '%{$input}%' UNION SELECT Title, Cover, ID, Type FROM movies WHERE Title LIKE '%{$input}%' ";
    
    $result = mysqli_query( $conn, $query );

    if(mysqli_num_rows($result) > 0){
        echo '<table class="table  table-striped" style = "position: absolute; z-index: 10000;">
            <thead>
            </thead>
            <tbody>';
            while($row = mysqli_fetch_assoc($result)){
                $title = $row['Title'];
                $poster = $row['Cover'];
                $id = $row['ID'];
                $type = $row['Type'];
                echo '<tr><td><a href="movie-details.php?id='.$id.'&type='.$type.'"><img src="'.$poster.'" alt="" style = "width: 100px;"></a></td><td><a href="movie-details.php?id='.$id.'&type='.$type.'">'.$title.'</a></td></tr>';
            }
        
        echo '</tbody>
        </table>';
    }
    else{
        echo "<h6 class='text-danger text-center mt-3' style = 'position: absolute;' >No Movies or TV shows found! </h6>";
    }
};

?>
