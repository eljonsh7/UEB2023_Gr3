<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/img/logo2.png" />
    <title>Details</title>
    <style>
    .details {
        margin: 2% 2% 2%;
        font-size: 17;
    }
    </style>
</head>

<body>
    <?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'moviedb';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name,3307);

    if(!isset($_GET['detailsID'])){
        header("Location:add".$_GET['type'].".php");
    }
    

    $ID= $_GET['detailsID'];

    if($_GET['type']=="Movie"){
        $sql = "SELECT * FROM `movies` WHERE `ID` = $ID";
    }else if($_GET['type']=="Show"){
        $sql = "SELECT * FROM `tvshows` WHERE `ID` = $ID";
    }
   
    $result = mysqli_query( $conn, $sql);
    $row = mysqli_fetch_array($result);

    class input{
        public $value;
        public $id;


        function __construct($value,$id){
            $this->value = $value;
            $this->id = $id;
        }
    }

    echo '<button><a href="add'.$_GET['type'].'.php">Go back</a></button>';

    if($_GET['type']=="Movie" && $_GET['mode']=="info"){
        echo '
            <div style = "display:flex;" >
            <img src="'.$row['Cover'].'" width = 350px height=500px>
            <div>
                <div id="viewDetails">
                    <p id="title" class="details">Title: <br>'.$row['Title'].'</p>
                    <p id="date" class="details">Date: <br>'.$row['Date'].'</p>
                    <p id="rating" class="details">Rating: <br>'.$row['Rating'].'</p>
                    <p id="director" class="details">Director: <br>'.$row['Director'].'</p>
                    <p id="studio" class="details">Studio: <br>'.$row['Studio'].'</p>
                    <p id="cover" class="details">Cover: <br>'.$row['Cover'].'</p>
                    <p id="trailer" class="details">Trailer: <br>'.$row['Trailer'].'</p>
                    <p id="description" class="details">Description: <br>'.$row['Description'].'</p>
                    <p id="genre" class="details">Genre: <br>'.$row['Genre'].'</p>
                    <p id="length" class="details">Length: <br>'.$row['Length'].'</p>
                </div>
                <a href="editDetails.php?detailsID='.$ID.'&type=Movie&mode=edit"><button style = "margin-left:2%;" onclick="edit()" href="" id="editBtn">Edit</button></a>
            </div>
            
            </div>
        ';
    }  
    else if($_GET['type']=="Movie" && $_GET['mode']=="edit"){
        echo '
            <div style = "display:flex;" >
            <img src="'.$row['Cover'].'" width = 350px>
            <div>
                <form id="movie-edit" method="post">
					<label for="title">Title:</label><br>
                    <input class="form-control" value="'.$row['Title'].'" type="text" id="title" placeholder="Title:" name="title"><br>

                    <label for="date">Date:</label><br>
                    <input class="form-control" value="'.$row['Date'].'" type="date" id="date" placeholder="Date:" name="date"><br>

                    <label for="rating">Rating:</label><br>
                    <input class="form-control" value="'.$row['Rating'].'" type="text" id="rating" placeholder="Rating:" name="rating"><br>

                    <label for="director">Director:</label><br>
                    <input class="form-control" value="'.$row['Director'].'" type="text" id="director" placeholder="Director:" name="director"><br>

                    <label for="studio">Studio:</label><br>
                    <input class="form-control" value="'.$row['Studio'].'" type="text" id="studio" placeholder="Studio:" name="studio"><br>

                    <label for="cover">Cover Link:</label><br>
                    <input class="form-control" value="'.$row['Cover'].'" type="text" id="cover" placeholder="Cover Link:" name="cover"><br>

                    <label for="trailer">Trailer Link:</label><br>
                    <input class="form-control" value="'.$row['Trailer'].'"type="text" id="trailer" placeholder="Trailer Link:" name="trailer"><br>
					
					<label for="description">Description:</label><br>
                    <textarea class="form-control" id="description" placeholder="Description:" name="description" style="color:black;width:300px; height:150px;" maxlength="1000">'.$row['Description'].'</textarea><br>

                    <label for="genre">Genre:</label>
                    <input class="form-control" value="'.$row['Genre'].'" type="text" id="genre" placeholder="Genre:" name="genre"><br>

                    <label for="length">Length:</label>
                    <input class="form-control" value="'.$row['Length'].'" type="text" id="length" placeholder="Length:" name="length"><br>

                    <input class="form-control submit" type="submit" value="Submit" name="movie_submit">
				</form>';
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // check which form was submitted
                    
                        // get the form data
                        $title = new input($_POST['title'],"title");
                        $date = new input($_POST['date'],"date");
                        $rating = new input($_POST['rating'],"rating");
                        $director = new input($_POST['director'],"director");
                        $studio = new input($_POST['studio'],"studio");
                        $cover = new input($_POST['cover'],"cover");
                        $trailer = new input($_POST['trailer'],"trailer");
                        $description = new input($_POST['description'],"description");
                        $genre = new input($_POST['genre'],"genre");
                        $length = new input($_POST['length'],"length");
                        $inputs = [$title,$date,$rating,$director,$studio,$cover,$trailer,$description,$genre,$length];
                        $temp = false;
                        for($i = 0; $i < sizeof($inputs) ; $i++){
                            if(empty($inputs[$i]->value)){
                                echo '<script>document.getElementById("'.$inputs[$i]->id.'").style.border="2px solid red";</script>';
                                $temp = true;
                            }else{
                                echo '<script>document.getElementById("'.$inputs[$i]->id.'").value="'.$inputs[$i]->value.'";</script>';
                            }
                            if(($i == sizeof($inputs)-1) && $temp == true){
                                echo "<h3>Please fill out every information about the movie!</h3>";
                            }
                        }
                        if($temp == false){
                            // edit the data in the movies table
                            $sql = "UPDATE movies SET Title=?, Date=?, Rating=?, Director=?, Studio=?, Trailer=?, Description=?, Cover=?, Genre=?, Length=? WHERE ID=?";
                            $stmt = mysqli_prepare($conn, $sql);
                            mysqli_stmt_bind_param($stmt, "sssssssssdd", $title->value, $date->value, $rating->value, $director->value, $studio->value, $trailer->value, $description->value, $cover->value, $genre->value,$length->value, $ID);
                            mysqli_stmt_execute($stmt);
                            echo '<script>window.location.href = "editDetails.php?detailsID='.$ID.'&type=Movie&mode=info";</script>';
                        }
                }
    }
    else if($_GET['type']=="Show" && $_GET['mode']=="info"){
        echo '
            <div style = "display:flex;" >
            <img src="'.$row['Cover'].'" width = 350px height = 400px>
            <div>
                <div id="viewDetails">
                    <p id="title" class="details">Title: <br>'.$row['Title'].'</p>
                    <p id="date" class="details">Start Date: <br>'.$row['StartDate'].'</p>
                    <p id="date" class="details">Status: <br>'.$row['Status'].'</p>
                    <p id="rating" class="details">Rating: <br>'.$row['Rating'].'</p>
                    <p id="director" class="details">Director: <br>'.$row['Director'].'</p>
                    <p id="studio" class="details">Studio: <br>'.$row['Studio'].'</p>
                    <p id="cover" class="details">Cover: <br>'.$row['Cover'].'</p>
                    <p id="trailer" class="details">Trailer: <br>'.$row['Trailer'].'</p>
                    <p id="trailer" class="details">Description: <br>'.$row['Description'].'</p>
                    <p id="genre" class="details">Genre: <br>'.$row['Genre'].'</p>
                </div>
                <a href="editDetails.php?detailsID='.$ID.'&type=Show&mode=edit"><button style = "margin-left:2%;" onclick="edit()" href="" id="editBtn">Edit</button></a>
            </div>
            
            </div>
        ';
    }else if($_GET['type']=="Show" && $_GET['mode']=="edit"){
        echo '
            <div style = "display:flex;" >
            <img src="'.$row['Cover'].'" width = 350px>
            <div>
                <form id="movie-edit" method="post">
					<label for="title">Title:</label><br>
                    <input class="form-control" value="'.$row['Title'].'" type="text" id="title" placeholder="Title:" name="title"><br>

                    <label for="date">Start Date:</label><br>
                    <input class="form-control" value="'.$row['StartDate'].'" type="date" id="startdate" placeholder="Date:" name="startdate"><br>

                    <label for="date">Status:</label><br>
                    <input class="form-control" value="'.$row['Status'].'" type="text" id="status" placeholder="Date:" name="status"><br>

                    <label for="rating">Rating:</label><br>
                    <input class="form-control" value="'.$row['Rating'].'" type="text" id="rating" placeholder="Rating:" name="rating"><br>

                    <label for="director">Director:</label><br>
                    <input class="form-control" value="'.$row['Director'].'" type="text" id="director" placeholder="Director:" name="director"><br>

                    <label for="studio">Studio:</label><br>
                    <input class="form-control" value="'.$row['Studio'].'" type="text" id="studio" placeholder="Studio:" name="studio"><br>

                    <label for="cover">Cover Link:</label><br>
                    <input class="form-control" value="'.$row['Cover'].'" type="text" id="cover" placeholder="Cover Link:" name="cover"><br>

                    <label for="trailer">Trailer Link:</label><br>
                    <input class="form-control" value="'.$row['Trailer'].'"type="text" id="trailer" placeholder="Trailer Link:" name="trailer"><br>
					
					<label for="description">Description:</label><br>
                    <textarea class="form-control" id="description" placeholder="Description:" name="description" style="color:black;width:300px; height:150px;" maxlength="1000">'.$row['Description'].'</textarea><br>

                    <label for="genre">Genre:</label>
                    <input class="form-control" value="'.$row['Genre'].'" type="text" id="genre" placeholder="Genre:" name="genre"><br>

                    <input class="form-control submit" type="submit" value="Submit" name="movie_submit">
				</form>';
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // check which form was submitted
                        // get the form data
                        $title = new input($_POST['title'],"title");
                        $startdate = new input($_POST['startdate'],"startdate");
                        $status = new input($_POST['status'],"status");
                        $rating = new input($_POST['rating'],"rating");
                        $director = new input($_POST['director'],"director");
                        $studio = new input($_POST['studio'],"studio");
                        $cover = new input($_POST['cover'],"cover");
                        $trailer = new input($_POST['trailer'],"trailer");
                        $description = new input($_POST['description'],"description");
                        $genre = new input($_POST['genre'],"genre");
                        $inputsTV = [$title,$startdate,$status,$rating,$director,$studio,$cover,$trailer,$description,$genre];
                        $temp = false;
                        for($i = 0; $i < sizeof($inputsTV) ; $i++){
                            if(empty($inputsTV[$i]->value)){
                                echo '<script>document.getElementById("'.$inputsTV[$i]->id.'").style.border="2px solid red";</script>';
                                $temp = true;
                            }else{
                                echo '<script>document.getElementById("'.$inputsTV[$i]->id.'").value="'.$inputsTV[$i]->value.'";</script>';
                            }
                            if(($i == sizeof($inputsTV)-1) && $temp == true){
                                echo "<h3>Please fill out every information about the show!</h3>";
                            }
                        }
                        if($temp == false){
                            // edit the data in the shows table
                            $sql = "UPDATE tvshows SET Title=?, StartDate=?,Status=?, Rating=?, Director=?, Studio=?, Cover=?, Trailer=?,Description=?, Genre=? WHERE ID=?";
                            $stmt = mysqli_prepare($conn, $sql);
                            mysqli_stmt_bind_param($stmt, "ssssssssssd", $title->value, $startdate->value, $status->value, $rating->value, $director->value, $studio->value, $cover->value, $trailer->value, $description->value,$genre->value, $ID);
                            mysqli_stmt_execute($stmt);
                            echo '<script>window.location.href = "editDetails.php?detailsID='.$ID.'&type=Show&mode=info";</script>';
                        }
                }
    }

    
    



?>

</body>

</html>