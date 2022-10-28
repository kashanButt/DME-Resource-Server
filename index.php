<?php 
    error_reporting(0);
    include_once "./components/header.php";
    $pageTitle = "Login";
 ?>
    <div id="loginContainer">
        <div id="loginForm">
            <h2>Login</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="name">
                    <input type="text" name="name" id="name">
                </div>
                <div class="password">
                    <input type="password" name="password" id="password">
                    <i class="far fa-eye" id="togglePassword"></i>
                </div>
                <input type="submit" value="Login" name="submit" id="login" >
            </form>
        </div>
    </div>

<?php
    include_once "./components/footer.php";
    include "./database/database.php";

    if(isset($_POST["submit"])) {
        $name = $_POST["name"];
        $password = md5($_POST["password"]);

        if($name == "admin" && $password == md5("admin")) {
            header("location: ./admin/");
        }else{
            $database = new Database;
            $db = $database->connect();

            $query = "SELECT * FROM users";
            $stmt = $db->prepare($query);
            $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if($name == $row["name"] && $password == $row["password"]) {
                    $_SESSION["loggedin"] = true;
                    $_SESSION["username"] = $name;

                    header("location: ./all-files/");
                }else{
                    echo "<script>alert('wrong credentials')</script>";
                }
            }
        }
    }
