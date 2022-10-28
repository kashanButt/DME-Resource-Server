<?php
    $pageTitle = "Download Files";
    include_once "../components/header_2.php";
    include "../database/database.php";

    $database = new Database();
    $db = $database->connect();

    $name = $_SESSION["username"];
    $query = "SELECT * FROM `downloads` WHERE User='$name'";
    $stmt = $db->prepare($query);
    $stmt->execute();

    $serial = 0;
?>
    <div id="container">
        <div id="download">
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $serial = $serial + 1;    
        ?>
            <div id="downloadFile">
                <div id="downloadNumber">
                    <p><?php echo $serial; ?></p>
                </div>
                <div id="downloadFileInfo">
                    <div class="fileName">
                        <h3><?php echo $row["File_Name"];?></h3>
                    </div>
                </div>
                <div id="downloadBtn">
                    <div class="requests">
                        <a href="./delete.php?fileName=<?php echo $row['File_Name'];?>"><button class="downloadBtn">Download</button></a>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

<?php
    include_once "../components/footer.php";
?>