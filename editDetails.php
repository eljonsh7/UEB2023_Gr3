<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <style>
        .details{
            margin:2% 2% 2%;
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



    if($_GET['type']=="Movie"){
        echo '
            <div style = "display:flex;" >
            <img src="'.$row['Cover'].'" width = 350px>
            <div>
                <div id="viewDetails">
                    <p id="title" class="details">Title: <br>'.$row['Title'].'</p>
                    <p id="date" class="details">Date: <br>'.$row['Date'].'</p>
                    <p id="rating" class="details">Rating: <br>'.$row['Rating'].'</p>
                    <p id="director" class="details">Director: <br>'.$row['Director'].'</p>
                    <p id="studio" class="details">Studio: <br>'.$row['Studio'].'</p>
                    <p id="cover" class="details">Cover: <br>'.$row['Cover'].'</p>
                    <p id="trailer" class="details">Trailer: <br>'.$row['Trailer'].'</p>
                </div>
                <button style = "margin-left:2%;" onclick="edit()" id="editBtn">Edit</button>
                <form id="movie-edit" method="post" style="display:none;">
					<label for="title">Title:</label><br>
                    <input class="form-control" type="text" id="title" placeholder="Title:" name="title"><br>

                    <label for="date">Date:</label><br>
                    <input class="form-control" type="date" id="date" placeholder="Date:" name="date"><br>

                    <label for="rating">Rating:</label><br>
                    <input class="form-control" type="text" id="rating" placeholder="Rating:" name="rating"><br>

                    <label for="director">Director:</label><br>
                    <input class="form-control" type="text" id="director" placeholder="Director:" name="director"><br>

                    <label for="studio">Studio:</label><br>
                    <input class="form-control" type="text" id="studio" placeholder="Studio:" name="studio"><br>

                    <label for="cover">Cover Link:</label><br>
                    <input class="form-control" type="text" id="cover" placeholder="Cover Link:" name="cover"><br>

                    <label for="trailer">Trailer Link:</label><br>
                    <input class="form-control" type="text" id="trailer" placeholder="Trailer Link:" name="trailer"><br>
					
					<label for="description">Description:</label><br>
                    <textarea class="form-control" id="description" placeholder="Description:" name="description" style="color:black;" maxlength="1000"></textarea><br>

                    <input class="form-control submit" type="submit" value="Submit" name="movie_submit">
				</form>
            </div>
            
            </div>
        ';
        class input{
			public $value;
			public $id;


			function __construct($value,$id){
				$this->value = $value;
				$this->id = $id;
			}
		}
        $title = new input($row['Title'],"title");
		$date = new input($row['Date'],"date");
		$rating = new input($row['Rating'],"rating");
		$director = new input($row['Director'],"director");
		$studio = new input($row['Studio'],"studio");
		$cover = new input($row['Cover'],"cover");
		$trailer = new input($row['Trailer'],"trailer");
		$description = new input($row['Description'],"description");
		$inputs = [$title,$date,$rating,$director,$studio,$cover,$trailer,$description];
		$temp = false;
        for($i = 0; $i < sizeof($inputs) ; $i++){
			echo '<script>document.getElementById("'.$inputs[$i]->id.'").value="'.$inputs[$i]->value.'";</script>';
		}
		// for($i = 0; $i < sizeof($inputs) ; $i++){
		// 	if(empty($inputs[$i]->value)){
		// 		echo '<script>document.getElementById("'.$inputs[$i]->id.'").style.border="2px solid red";</script>';
		// 		$temp = true;
		// 	}else{
		// 		echo '<script>document.getElementById("'.$inputs[$i]->id.'").value="'.$inputs[$i]->value.'";</script>';
		// 	}
		// 	if(($i == sizeof($inputs)-1) && $temp == true){
		// 		echo "<h3>Please fill out every information about the movie!</h3>";
		// 	}
		// }
    }else if($_GET['type']=="Show"){

    }

    
    



?>


<script>
    function edit(){
        document.getElementById("viewDetails").style.display="none";
        document.getElementById("editBtn").style.display="none";
        document.getElementById("movie-edit").style.display="inline";
    }

</script>
    
</body>
</html>




