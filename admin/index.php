<?php
    include_once "./components/header.php";
?>
    <div id="container">
        <div id="content">
            <div id="sidebar">
                <nav>
                    <ul>
                        <a href="add-user/"><li>Add User</li></a> 
                        <a href="view-user/"><li>View User</li></a> 
                        <a href="view-records/"><li>View Records</li></a> 
                        <a href="requests/"><li>Request</li></a>
                        <a href="./redirect.php"><li>Logout</li></a>
                    </ul>
                </nav>
            </div>
            <div id="main">
                <div id="pageUp">
                   <a href="#page"><i class="fa-solid fa-arrow-up-long"></i></a>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once "./components/footer.php";
?>
