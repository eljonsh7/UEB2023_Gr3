<?php
    session_start();

    include("connection.php");

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $user_id = $_SESSION['user'];
    $content_id = $_POST['content_id'];

    $stmt = mysqli_prepare($conn, "DELETE FROM Watchlist WHERE User_ID = ? AND Content_ID = ?");
    mysqli_stmt_bind_param($stmt, "ii", $user_id, $content_id);
    mysqli_stmt_execute($stmt);

    $stmt->close();
    $mysqli->close();