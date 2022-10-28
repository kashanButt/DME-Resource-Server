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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Font awesome -->

    <!-- stylesheet -->
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/header.css">
    <!-- stylesheet -->
</head>
<body>
    <?php session_start(); ?>
