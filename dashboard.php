<?php
    session_start();
    if(isset($_SESSION['user_id']) and !empty($_SESSION['user_id']))
    {
        echo "<h1 align='center'><br><br>User Sucessfully Log-In</h1>";

        $_SESSION['amnt']=$_SESSION['detail']="";

        echo "<p align='center'>UserID: ".$_SESSION['user_id']."</p>";
        echo "<div align='center'>
            <a href='fund.php'><button style='background-color:blue; color: white'>Fund Account</button></a>
            <a href='withdraw.php'><button style='background-color:red; color: white'>Withdraw</button></a>
            <a href='viewD.php'><button style='background-color:green; color: white'>Check Balance</button></a>
            <a href='details.php' target='new()'><button style='background-color:darkblue; color: white'>View Transactions</button></a>
        </div>";
        echo "<p align='center'>click <a href='logout.php'>here</a> to logout</p>";

        
    }
    
?>