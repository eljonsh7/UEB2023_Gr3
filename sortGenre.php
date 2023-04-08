<?php

include('connection.php');

$sql = "SELECT * FROM `movies`";
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

            $query = "SELECT * FROM movies limit $start_from, $results_per_page";
        } else {
            $query = "SELECT * FROM movies WHERE Genre LIKE '%$input%' limit $start_from, $results_per_page";
        }
    } else {
        $search = $_GET['search'];
        if ($search == "All") {
            $query = "SELECT * FROM movies limit $start_from, $results_per_page";
        } else {
            $query = "SELECT * FROM movies WHERE Title LIKE '%$search%' limit $start_from, $results_per_page";
        }
    }
} else if ($_GET['type'] == 'tvshow') {
    if (isset($_GET['genre'])) {
        $input = $_GET['genre'];
        if ($input == "All") {
            $query = "SELECT * FROM tvshows limit $start_from, $results_per_page";
        } else {
            $query = "SELECT * FROM tvshows WHERE Genre LIKE '%$input%' limit $start_from, $results_per_page ";
        }
    } else {
        $search = $_GET['search'];
        $query = "SELECT * FROM tvshows WHERE Title LIKE '%$search%' limit $start_from, $results_per_page";
    }
} else if ($_GET['type'] == 'All') {
    $search = $_GET['search'];
    $query = "SELECT Title, Cover, ID , Type, Genre FROM tvshows WHERE Title LIKE '%{$search}%' UNION SELECT Title, Cover, ID , Type, Genre FROM movies WHERE Title LIKE '%{$search}%' limit $start_from, $results_per_page";
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