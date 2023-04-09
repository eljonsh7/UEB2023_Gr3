<?php

include('connection.php');

$sql = "SELECT * FROM `content` where type = 'movie'";
$result = mysqli_query($conn, $sql);
$results_per_page = 4;
$results_num = mysqli_num_rows($result);
$pages = ceil($results_num / $results_per_page);

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * 4;

if ($_GET['type'] == 'movie') {

    if (isset($_GET['genre'])) {
        $input = $_GET['genre'];
        //SELECT *, Type FROM tvshows WHERE Genre LIKE '%{$input}%' UNION
        echo '
        <script>
        console.log("Is this working?");
        </script>';
        if ($input == "All") {

            $query = "SELECT * FROM content where type = 'movie' limit $start_from, $results_per_page";
        } else {
            $query = "SELECT * FROM content where type = 'movie' and Genre LIKE '%$input%' limit $start_from, $results_per_page";
        }
    } else {
        $search = $_GET['search'];
        if ($search == "All") {
            $query = "SELECT * FROM content where type = 'movie' limit $start_from, $results_per_page";
        } else {
            $query = "SELECT * FROM content where type = 'movie' and Title LIKE '%$search%' limit $start_from, $results_per_page";
        }
    }
} else if ($_GET['type'] == 'tvshow') {
    if (isset($_GET['genre'])) {
        $input = $_GET['genre'];
        if ($input == "All") {
            $query = "SELECT * FROM content where type = 'tv show' limit $start_from, $results_per_page";
        } else {
            $query = "SELECT * FROM content  WHERE type = 'tv show' and Genre LIKE '%$input%' limit $start_from, $results_per_page ";
        }
    } else {
        $search = $_GET['search'];
        $query = "SELECT * FROM content where type = 'tv show' and Title LIKE '%$search%' limit $start_from, $results_per_page";
    }
} else if ($_GET['type'] == 'All') {
    $search = $_GET['search'];
    $query = "SELECT Title, Cover, ID , Type, Genre FROM content WHERE Title LIKE '%{$search}%'";
}

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['Title'];
        $poster = $row['Cover'];
        $id = $row['ID'];
        $type = $row['Type'];
        $genre = $row['Genre'];
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