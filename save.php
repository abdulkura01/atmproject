<?php 
    session_start();

    $conn = mysqli_connect("localhost","root","","steamledgedb");

    if(!empty($_POST['username']) and !empty($_POST['password']))
    {
        $fn=$_POST['fn'];
        $username=$_POST['username'];
        $password = sha1($_POST['password']);

        $gfdf=mysqli_query($conn,"SELECT `id`, `fullname`, `username`, `password` FROM `users` WHERE `username`='$username'");

        if(mysqli_num_rows($gfdf) > 0)
        {
            echo "Username already exist"; exit();
        }

        $qry = "INSERT INTO `users`(`fullname`, `username`, `password`) VALUES ('$fn','$username','$password')";
        
        $rslt = mysqli_query($conn, $qry);

        if(mysqli_affected_rows($conn)==1)
        {
            $id=mysqli_insert_id($conn);

            $fdr =mysqli_query($conn,"INSERT INTO `user_account`(`userId`, `balance`) VALUES ('$id','0.00')");

            $_SESSION['user_ud']=123;
            //$fd=base64_encode(s1);
            header("location: success.php"); exit();
        }
    }
    else{
        echo "All fields are required";
    }
?>