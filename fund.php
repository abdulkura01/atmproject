<?php 
    session_start();

    $conn = mysqli_connect("localhost","root","","steamledgedb");

    if(isset($_SESSION['user_id']) and !empty($_SESSION['user_id']))
    {
        echo "<p align='center'>UserID: ".$_SESSION['user_id']."</p>";
        echo "<h1 align='center'>Fund Your Account</h1>";
        echo "<form action='f1.php' method='POST'>
            <div align='center'>
                Enter the Amount <input type='text' size='8px' name='amnt' required/>

                <p><input type='hidden' value='".$_SESSION['user_id']."' name='uId' required/></p>

                <p><input type='submit' value='Fund' required/> | <a href='dashboard.php' onClick='history.go(-1)'>go back</a></p>
            </div>
            
        </form>";
    }
?>