<?php
    $pageTitle = "All Files";
    include_once "../components/header_2.php";
    include_once "../database/database.php";

    $database = new Database();
    $db = $database->connect();

    $query = "SELECT * FROM `all_files`";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $serial = 0;
?>
    <div id="container">
        <div id="content">
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
            $serial = $serial + 1;
        ?>
            <div id="file">
                <div id="number">
                    <p><?php echo $serial; ?></p>
                </div>
                <div id="fileInfo">
                    <div class="fileName">
                        <h3><?php echo $row["File_Name"] ?></h3>
                    </div>
                    <div class="fileBtns">
                        <a href="../request.php?id=<?php echo $row["id"]; ?>"><button>Download Request</button></a>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
        <div id="pageUp">
            <a href="#page"><i class="fa-solid fa-arrow-up-long"></i></a>
        </div>
    </div>

<?php
    include_once "../components/footer.php";
?>