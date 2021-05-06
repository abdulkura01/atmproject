<?php 
    session_start();

    $conn = mysqli_connect("localhost","root","","steamledgedb");

    if(isset($_POST))
    {
        
       $amnt = str_replace(",","", $_POST["amnt"]);
       $uId = $_POST['uId'];

       if(!is_numeric($amnt))
       {
            echo "Invalid Amount Only a numeric number is allowed! click <a href='javascript:;' history.go(-1)>here<a> to go back"; exit();
       }

       if($amnt <= 0)
       {
            echo "Invalid Amount, the amount should be greater than 0! click <a href='javascript:;' history.go(-1)>here<a> to go back"; exit();
       }

       $gdf = mysqli_query($conn,"SELECT `id`, `userId`, `balance` FROM `user_account` WHERE `userId`='$uId'");

       $row = mysqli_fetch_assoc($gdf);

       $prevAmount = $row['balance'];

       $newBal = ($prevAmount+$amnt);

       $date = date("Y-m-d");

       $fdrG = mysqli_query($conn,"UPDATE `user_account` SET `balance`='$newBal' WHERE `userId`='$uId'");

       //if(mysqli_affected_rows($conn) !=1){ echo mysqli_error($conn); exit(); }

       $rgdf= mysqli_query($conn,"INSERT INTO `ledger`(`userId`, `bf`, `amnt`, `cf`, `detail`, `date`) VALUES ('$uId','$prevAmount','$amnt','$newBal','CR','$date')");

       if(mysqli_affected_rows($conn) > 0)
       {
           $_SESSION['amnt']= $amnt;
           
            header("location: viewD.php"); exit();
       }
       else{
           echo "Erro occurs some where";
       }
    }
?>