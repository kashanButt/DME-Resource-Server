<?php
    $pageTitle = "Add User";
    include_once "../components/header-2.php";
    include "../database/database.php";

    $database = new Database();
    $db = $database->connect();
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
                <form method="post" id="addUser">
                    <h1>Add a User</h1>
                    <span>Name : </span></label><input type="text" name="name" id="name" style="margin-left:102px;"><br>
                    <span>Password : </span><input type="password" name="password" id="password" style="margin-left:74px"><br>
                    <span>Repeat Password :</span><input type="password" name="repeatPassword" id="repeatPassword"><br>
                    <span class="passwordAlert">Password is not the same</span><br>
                    
                    <input type="submit" value="Create" name="submit" id="create">
                </form>
                <div id="pageUp">
                   <a href="#page"><i class="fa-solid fa-arrow-up-long"></i></a>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once "../components/footer.php";

    if(isset($_POST["submit"])){
        if($_POST["password"] === $_POST["repeatPassword"]){
            $name = $_POST["name"];
            $password = $_POST["password"];
            $encryptedPassword = md5($_POST["password"]);

            $query = "SELECT * FROM `users` WHERE name='$name' AND password='$encryptedPassword'";
            $stmt = $db->prepare($query);
            $stmt->execute();

            $count = $stmt->rowCount();

            if($count < 1){
                $query = "INSERT INTO `users`(`name`, `password`) VALUES ('$name','$encryptedPassword')";
                $stmt = $db->prepare($query);
                $stmt->execute();

                $query = "INSERT INTO `userinfo`(`name`, `password`) VALUES ('$name','$password')";
                $stmt = $db->prepare($query);
                $stmt->execute();

                echo "<script>alert('User Added')</script>";
            }else{
                echo "<script>alert('User Already Exists')</script>";
            }
        }else{
            echo "<style>.passwordAlert{display:'none';}</style>";
        }
    }
?>
