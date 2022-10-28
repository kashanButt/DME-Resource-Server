<?php
    $pageTitle = "Add Records";
    include_once "../components/header-2.php";
    include_once "../database/database.php";

    $database = new Database();
    $db = $database->connect();

    $query = "SELECT * FROM `all_files`";
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
                <form method="post" id="addRecord" enctype="multipart/form-data">
                    <div class="para">
                        <p>Add a Record</p>
                    </div>
                    <div class="upload">
                        <label class="fileUpload">
                            File Upload
                        <input type="file" name="file" id="fileUpload"><br>
                        </label>
                    </div>
                    <input type="submit" value="Add" name="submit" id="add">
                </form>
                <div id="viewFiles">
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
                                <a href="<?php echo '../files/'.$row['File_Name'];?>" target="_blank"><button>View</button></a>
                                <a href="<?php echo '../files/'.$row['File_Name'];?>" download="<?php echo $row['File_Name'];?>"><button>Download</button></a>
                            </div>
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
    
    if(isset($_POST['submit'])){
        $name       = $_FILES['file']['name'];  
        $temp_name  = $_FILES['file']['tmp_name'];  
        if(isset($name) and !empty($name)){
            $location = '../files/';      
            if(move_uploaded_file($temp_name, $location.$name)){
                $query = "INSERT INTO `all_files`(`File_Name`) VALUES ('$name')";
                $stmt = $db->prepare($query);
                $stmt->execute();
                header("location: ../view-records/");
            }
        }
    }
?>
