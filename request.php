<?php
    include "./database/database.php";
    session_start();

    $id = $_GET["id"];

    $database = new Database();
    $db = $database->connect();

    $query = "SELECT * FROM `all_files` WHERE id=$id";
    $stmt = $db->prepare($query);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    extract($row);

    $user = $_SESSION["username"];

    $query = "INSERT INTO `requests`(`File_Name`, `User`) VALUES ('$File_Name','$user')";
    $stmt = $db->prepare($query);
    $stmt->execute();

    $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO `request_timeline`(`file_Name`, `user`, `time`) VALUES ('$File_Name','$user','$date')";
    $stmt = $db->prepare($query);
    $stmt->execute();

    header("location: ./requests/");
