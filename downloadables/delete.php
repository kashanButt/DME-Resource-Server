<?php  
session_start();
$fileName = $_GET["fileName"];

include "../database/database.php";

$database = new Database();
$db = $database->connect();

$username = $_SESSION['username'];

$query = "DELETE FROM downloads WHERE `downloads`.`File_Name` = '$fileName' and `downloads`.`user` = '$username'";
$stmt = $db->prepare($query);
$stmt->execute();

header("location: ./download.php?fileName=../admin/files/$fileName");

?>  