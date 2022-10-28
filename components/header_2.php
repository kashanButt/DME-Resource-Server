<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            $companyName = "DME Resource Server";
            $seperator = " - ";
            if($_SERVER["REQUEST_URI"] != "/server/ui/") {
                echo  $companyName . $seperator . $pageTitle;
            }else{
                echo $companyName;
            }
        ?>
    </title>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Font awesome -->

    <!-- stylesheet -->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/allFiles.css">
    <link rel="stylesheet" href="../css/requests.css">
    <link rel="stylesheet" href="../css/pageUp.css">
    <link rel="stylesheet" href="../css/downloadables.css">
    <!-- stylesheet -->
</head>
<body>
    <div id="header">
        <nav>
            <ul>
                <li><a href="../all-files/">All Files</a></li>
                <li><a href="../requests/">Requests</a></li>
                <li><a href="../downloadables/">Downloadables</a></li>
            </ul>
        </nav>
        <div id="userProfile">
            <a href="../index.php">
                <img src="../img/avatar.jpg" alt="">
                <span><?php echo $_SESSION["username"]; ?></span>
            </a>
        </div>
    </div>
    <div id="page"></div>
