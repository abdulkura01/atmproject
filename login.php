<?php 
    session_start();

    $conn = mysqli_connect("localhost","root","","steamledgedb");

    if(!empty($_POST['username']) and !empty($_POST['password']))
    {
        $username=$_POST['username'];
        $password = sha1($_POST['password']);

        $qry = "SELECT `id`, `fullname`, `username`, `password` FROM `users` WHERE `username`='$username' AND  `password`='$password' ";
        
        $rslt = mysqli_query($conn, $qry);

        if(mysqli_num_rows($rslt)==1)
        {
            $row=mysqli_fetch_assoc($rslt);
            $_SESSION['user_id']=$row['id'];
            header("location: dashboard.php"); exit();
        }
    }
    else{
        echo "All fields are required";
    }
?>