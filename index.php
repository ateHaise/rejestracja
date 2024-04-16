<?php
session_start();

if (isset($_SESSION["loggedIn"]) and $_SESSION["loggedIn"] == true) {
    header("Location: main.php");
}


?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <link type="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="border">
    <div class="main">
        <div class="content">
            <div class="container">
                <h1>SERWIS LOGOWANIE.LOGOWANIE.LOGOWANIE.COM</h1>
                <hr>
                <?php
                if (isset($_SESSION["err"])) {
                    echo "<div class='error'>" . $_SESSION["err"] . "</div>";
                }
                ?>
                <form action="login.php" method="post">
                    <label for="login"><h2>Login</h2></label><br>
                    <input type="text" name="login" placeholder="podaj login"><br> 

                    <label for="pass"><h2>haslo</h2></label><br>
                    <input type="password" name="pass" placeholder="podaj haslo"><br>

                    <input type="submit" value="Login">
                </form>
            </div>
            <div class="register">
                <p>nie masz konta? XDDDD to <a href="regForm.php">se zaloz</a>.</p>
            </div>
        </div>
    </div>
    </div>

</body>

</html>