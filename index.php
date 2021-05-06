<html>
    <head><title>Task 1</title></head>
    <body>
        <h1>User Login</h1>

        <form action="login.php" method="POST">
            <p><input type="text" name="username"  placeholder="Username"/></p>
            <p><input type="text" name="password"  placeholder="Password"/></p>
            <p><input type="submit" name="Login" value="Login" /> or click <a href='register.php'>here</a> to register </p>
            <?php if(isset($_GET['st'])){ echo "<p style='color:red'><b>User Sucessfully Logout</b></p>"; } ?>
        </form>

    </body>
</html>