<?php
session_start();

if (isset($_SESSION["loggedIn"]) and $_SESSION["loggedIn"] == true) {
    header("Location: main.php");
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="main">
        <div class="content">
            <div class="container">
                <h1>REJESTRACJAAAAAAA</h1>
                <p>szanowny userze, uzupelnij to aby stworzyc konto...</p>
                <hr>
                <?php
                if (isset($_SESSION["err"])) {
                    echo "<div class='error'>" . $_SESSION["err"] . "</div>";
                }
                ?>

                <form action="register.php" method="post">
                    <label for="login"><h2>Login</h2></label><br>
                    <input type="text" name="regLogin" placeholder="podaj login"><br>

                    <label for="pass"><h2>Haslo</h2></label><br>
                    <input type="password" name="regPass" placeholder="wpisz haslo"><br>

                    <label for="repPass"><h2>powtorz haslo</h2></label><br>
                    <input type="password" name="repPass" placeholder="powtorz te haslo"><br>
                    <input type="submit" value="Register"><br>
                </form>
            </div>
            <div class="signin">
                <p class="p1">masz juz konto????? co ty tu robisz, <a href="index.php">idz stad</a>.</p><br>
            </div>
        </div>
    </div>


</body>

</html>