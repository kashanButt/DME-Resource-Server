<?php
    $pageTitle = "Requests";
    include_once "../components/header-2.php";
    include "../database/database.php";

    $database = new Database();
    $db = $database->connect();

    $query = "SELECT * FROM `requests`";

    $stmt = $db->prepare($query);
    $stmt->execute();

    $serial = 0;

?>
    <div id="container">
        <div id="page"></div>
        <div id="content">
            <div id="sidebar">
                <nav>
                    <ul>
                        <a href="../add-user/"><li>Add User</li></a> 
                        <a href="../view-user/"><li>View User</li></a> 
                        <a href="../view-records/"><li>View Records</li></a> 
                        <a href="../requests/"><li>Request</li></a>
                        <a href="../redirect.php"><li>Logout</li></a>
                    </ul>
                </nav>
            </div>
            <div id="main">
                <div id="request">
                    <div class="heading">
                        <div class="serial">
                            <h4>Serial</h4>
                        </div>
                        <div class="username">
                            <h4>File Name</h4>
                        </div>
                        <div class="password">
                            <h4>Requested By</h4>
                        </div>
                        <div class="action">
                        </div>
                    </div>
                    <div id="requestedFiles">
                <?php 
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $serial = $serial + 1;
                ?>
                        <div class="files">
                            <div class="data">
                                <div class="serial">
                                    <h4><?php echo $serial; ?></h4>
                                </div>
                                <div class="fileName">
                                    <h4><?php echo $row["File_Name"]; ?></h4>
                                </div>
                                <div class="user">
                                    <h4><?php echo $row["User"]; ?></h4>
                                </div>
                            </div>
                            <div class="permission">
                                <a href="../requests/request.php?id=<?php echo $row["id"]; ?>"><button>Give Permission</button></a>
                            </div>
                        </div>
                <?php } ?>  
                    </div>
                </div>
                <div id="pageUp">
                   <a href="#page"><i class="fa-solid fa-arrow-up-long"></i></a>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once "../components/footer.php";
?>
