<?php 
    
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'moviedb';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name,3307);


if($_GET['type']=='movie'){
    if (isset($_GET['genre'])) {
        $input = $_GET['genre'];

        
        //SELECT *, Type FROM tvshows WHERE Genre LIKE '%{$input}%' UNION

        if ($input == "All") {
            $query = "SELECT * FROM movies";
        } else {
            $query = "SELECT * FROM movies WHERE Genre LIKE '%$input%'";
        }
    }else{
        $search = $_GET['search'];
        if ($search == "All") {
            $query = "SELECT * FROM movies";
        }else{
            $query = "SELECT * FROM movies WHERE Title LIKE '%$search%'";
        }
        
    }
}else if($_GET['type']=='tvshow'){
    if (isset($_GET['genre'])) {
        $input = $_GET['genre'];
        if ($input == "All") {
            $query = "SELECT * FROM tvshows";
        } else {
            $query = "SELECT * FROM tvshows WHERE Genre LIKE '%$input%' ";
        }
    }else {
        $search = $_GET['search'];
        $query = "SELECT * FROM tvshows WHERE Title LIKE '%$search%'";
        
    }
}else if($_GET['type']=='All'){
    $search = $_GET['search'];
    $query = "SELECT Title, Cover, ID , Type, Genre FROM tvshows WHERE Title LIKE '%{$search}%' UNION SELECT Title, Cover, ID , Type, Genre FROM movies WHERE Title LIKE '%{$search}%'";
} 
    
    $result = mysqli_query( $conn, $query );

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['Title'];
            $poster = $row['Cover'];
            $id = $row['ID'];
            $type = $row['Type'];
            $genre=$row['Genre'];
            echo '<div class="contentDiv' . $genre . '" style="margin-top:15%;">
                    <div>
                        <div>
                            <center>
                                <a href = "movie-details.php?id=' . $id . '&type=' . $type . '">
                                    <img id="imgContent" src="' . $poster . '" alt="portfolio" style="border-radius:15px;"/>
                                </a>
                            </center>
                        </div>
                        <div class="portfolio-content">
                            <a href = "movie-details.php?id=' . $id . '&type=' . $type . '">
                                <h5 style = "text-align:center;">' . $title . '</h5>
                            </a>
                        </div>
                    </div>
                    </a>
                </div>';
        
        }
        
    }

    
