<?php
    $pageTitle = "View Users";
    include_once "../components/header-2.php";
    include "../database/database.php";

    $database = new Database();
    $db = $database->connect();

    $query = "SELECT * FROM `userinfo`";
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
                <div id="users">
                    <div class="heading">
                        <div class="serial">
                            <h4>Serial</h4>
                        </div>
                        <div class="username">
                            <h4>Username</h4>
                        </div>
                        <div class="password">
                            <h4>Password</h4>
                        </div>
                    </div>
                <?php 
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $serial = $serial + 1;
                ?>
                    <div class="data">
                        <div class="serial">
                            <h4><?php echo $serial; ?></h4>
                        </div>
                        <div class="username">
                            <h4><?php echo $row["name"]; ?></h4>
                        </div>
                        <div class="password">
                            <h4><?php echo $row["password"]; ?></h4>
                        </div>
                    </div>
                <?php } ?>
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
