<?php
    require "../database/database.php";
    $id = $_GET["id"];
    $database = new Database();
    $db = $database->connect();

    $query = "INSERT INTO `downloads` SELECT * FROM `requests` WHERE id=$id;DELETE FROM `requests` WHERE id=$id;";
    $stmt = $db->prepare($query);
    $stmt->execute();

    header("location: ../requests/");