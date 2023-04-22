<?php $results_per_page = 8;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $results_per_page;
if (isset($_GET['genre'])) {
    $genreGET = $_GET['genre'];
    $sql = "SELECT content.Type, content.Trailer, content.Description, content.Length, content.ID, content.Title, content.Date, content.Status, content.Rating, content.Cover, director.Director, studio.Studio, GROUP_CONCAT(genre.Genre SEPARATOR ', ') as Genre
    FROM content
    JOIN director ON content.ID = director.ID
    JOIN studio ON content.ID = studio.ID
    JOIN genre ON content.ID = genre.ID
    WHERE content.Type IN ($type) and Genre like '%{$genreGET}%' $searchCondition
    GROUP BY content.ID
    LIMIT $start_from, $results_per_page";
    $sql1 = "SELECT content.Type, content.Trailer, content.Description, content.Length, content.ID, content.Title, content.Date, content.Status, content.Rating, content.Cover, director.Director, studio.Studio, GROUP_CONCAT(genre.Genre SEPARATOR ', ') as Genre
    FROM content
    JOIN director ON content.ID = director.ID
    JOIN studio ON content.ID = studio.ID
    JOIN genre ON content.ID = genre.ID
    WHERE content.Type IN ($type) and Genre like '%{$genreGET}%' $searchCondition
    GROUP BY content.ID;";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    $results_num = mysqli_num_rows($result1);
    $pages = ceil($results_num / $results_per_page);
} else {
    $sql = "SELECT content.Type, content.Trailer, content.Description, content.Length, content.ID, content.Title, content.Date, content.Status, content.Rating, content.Cover, director.Director, studio.Studio, GROUP_CONCAT(genre.Genre SEPARATOR ', ') as Genre
    FROM content
    JOIN director ON content.ID = director.ID
    JOIN studio ON content.ID = studio.ID
    JOIN genre ON content.ID = genre.ID
    WHERE content.Type IN ($type) $searchCondition
    GROUP BY content.ID
    limit $start_from, $results_per_page;";
    $sql1 = "SELECT content.Type, content.Trailer, content.Description, content.Length, content.ID, content.Title, content.Date, content.Status, content.Rating, content.Cover, director.Director, studio.Studio, GROUP_CONCAT(genre.Genre SEPARATOR ', ') as Genre
    FROM content
    JOIN director ON content.ID = director.ID
    JOIN studio ON content.ID = studio.ID
    JOIN genre ON content.ID = genre.ID
    WHERE content.Type IN ($type) $searchCondition
    GROUP BY content.ID;";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    $results_num = mysqli_num_rows($result1);
    $pages = ceil($results_num / $results_per_page);
}
