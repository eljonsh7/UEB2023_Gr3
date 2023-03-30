<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'moviedb';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

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


    echo '<img src="'.$row['Cover'].'" width = 300px>';



?>