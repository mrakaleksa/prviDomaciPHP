<?php
require "dbBroker.php";
require "model/user.php";

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];

    $rs = User::logIn($name, $password, $conn);

    if ($rs->num_rows == 1) {
        echo "Uspesna prijava";
        $_SESSION['loggeduser'] = "loggedIN";
        $_SESSION['id'] = $rs->fetch_assoc()['id'];
        header('Location: home.php');
        exit();
    } else {
        
        echo "Neuspesna prijava";
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet--->
    <link rel="icon" href="image/logo.png" />
    <link rel="stylesheet" href="css/style.css">
    <title>CHELSEA FC</title>
</head>

<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <h1>CHELSEA FC</h1>
                <div class="imgcontainer">
                    <img src="image/logo.png" id="logo">
                </div>
                <div class="container">
                    <input type="text" placeholder="Username" name="username" class="form-control" required>
                    <br>
                    <input type="password" placeholder="Password" name="password" class="form-control" required>
                    <br>
                    <button class="btn" type="sumbit">Log In</button>
                </div>
            </form>
        </div>
</body>

</html>