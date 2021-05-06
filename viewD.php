<?php
    session_start();

    $conn = mysqli_connect("localhost","root","","steamledgedb");

    if(isset($_SESSION['user_id']) and !empty($_SESSION['user_id']))
    {
        echo "<p align='center'>UserID: ".$_SESSION['user_id']."</p>";

        $uId=$_SESSION['user_id'];


        $gdf = mysqli_query($conn,"SELECT `id`, `userId`, `balance` FROM `user_account` WHERE `userId`='$uId'");

        $row = mysqli_fetch_assoc($gdf);
 
        $prevAmount = $row['balance'];


        if(isset($_SESSION['amnt']) and !empty($_SESSION['amnt']))
        {
            if(!empty($_SESSION['detail']))
            {
                echo "<h1 align='center'><br><br>You are Sucessfully Withdraw From Your Account</h1>";

                echo "<p align='center'>Previous Account Balance: ".number_format(($prevAmount+$_SESSION['amnt']),2)."</p>";

                echo "<p align='center'>Amount Withdraw: ".number_format($_SESSION['amnt'],2)." DR</p>";
            }
            else{

            
            echo "<h1 align='center'><br><br>You are Sucessfully Fund Your Account</h1>";

            echo "<p align='center'>Previous Account Balance: ".number_format(($prevAmount-$_SESSION['amnt']),2)."</p>";

            echo "<p align='center'>Amount Deposited: ".number_format($_SESSION['amnt'],2)." CR</p>";
            }
        }

        
 
        echo "<h2 align='center'>
           Current Account Balance: =N= ".number_format($prevAmount,2)."CR
        </h2>";

        echo "<p align='center'>click <a href='dashboard.php'>here</a> to go back</p>";

        
    }
    
?>