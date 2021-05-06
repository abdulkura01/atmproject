<?php
    session_start();
    if(isset($_SESSION['user_ud']) and !empty($_SESSION['user_ud']))
    {
        echo "<h1 align='center'><br><br>User Sucessfully Registered</h1>";
        echo "<p align='center'>click <a href='index.php'>here</a> to login</p>";
    }
        
?>