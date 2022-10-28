<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            $companyName = "Admin";
            $seperator = " - ";
            if($_SERVER["REQUEST_URI"] != "/server/ui/admin/") {
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
    <link rel="stylesheet" href="../css/view-records.css">
    <link rel="stylesheet" href="../css/add-user.css">
    <link rel="stylesheet" href="../css/view-users.css">
    <link rel="stylesheet" href="../css/requests.css">
    <link rel="stylesheet" href="../css/pageUp.css">
    <!-- stylesheet -->
</head>
<body>
<div id="page"></div>
