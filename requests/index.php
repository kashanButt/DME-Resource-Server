<?php
    $pageTitle = "Requested Files";
    include_once "../components/header_2.php";
    include_once "../database/database.php";

    $database = new Database();
    $db = $database->connect();

    $name = $_SESSION["username"];

    $query = "SELECT * FROM `requests` WHERE user='$name'";
    $stmt = $db->prepare($query);
    $stmt->execute();

    $serial = 0;
?>
    <div id="container">
        <div id="requests">
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
            $serial = $serial + 1;
            ?>
            <div id="requestsFile">
                <div id="requestNumber">
                    <p><?php echo $serial; ?></p>
                </div>
                <div id="requestFileInfo">
                    <div class="fileName">
                        <h3><?php echo $row["File_Name"] ; ?></h3>
                    </div>
                </div>
                <div id="pendingRequests">
                    <div class="requests">
                        <button>Pending Requests</button></h3>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

<?php
    include_once "../components/footer.php";
?>