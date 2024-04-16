<?php
if (isset($_SESSION["loggedIn"]) and $_SESSION["loggedIn"] == true) {
    header("Location: main.php");
}
session_start();

$usr_login = "";
$usr_pass = "";

//WALIDACJAAAAAAAAAAAAAAAAAAAA
if ($_POST["login"] == "" and $_POST["pass"] == "") {
    $_SESSION["err"] = "no podaj ten login i haslo ";
    header("Location: index.php");
    exit();
} else if ($_POST["login"] != "" and $_POST["pass"] == "") {
    $_SESSION["err"] = "a haslo to krowa zjadla?";
    header("Location: index.php");
    exit();
} else if ($_POST["login"] == "" and $_POST["pass"] != "") {
    $_SESSION["err"] = "imienia (loginu) ci nie dali?";
    header("Location: index.php");
    exit();
} else if ($_POST["login"] != "" and $_POST["pass"] != "") {
    unset($_SESSION["err"]);
    $usr_login = $_POST["login"];
    $usr_pass = $_POST["pass"];
}

//to samo co w register, otwiera se pliczek do $content
$file = fopen("logins.txt", "r");
$content = "";
while (!feof($file)) {
    $content .= fgets($file);
}
fclose($file);

$content = preg_split("/[\s,]+/", $content);

$logins = [];
$passwords = [];

//dzieli nasz content na login i haslo
foreach (array_keys($content) as $item) {
    if ($item % 2 == 0) {
        array_push($logins, $content[$item]);
    } else if ($item % 2 != 0) {
        array_push($passwords, $content[$item]);
    }
}

$loginOk = false;
$passOk = false;

foreach ($logins as $login) {
    if ($login == $usr_login) {
        $loginOk = true;
        break;
    }
}

foreach ($passwords as $password) {
    if (password_verify($usr_pass, $password)) {
        $passOk = true;
        echo "gut";
        break;
    }
}

if ($passOk == true and $loginOk == true) {
    $_SESSION["loggedIn"] = true;
    $_SESSION["user"] = $usr_login;
    header("Location: main.php");
    exit();
} else {
    $_SESSION["loggedIn"] = false;
    $_SESSION["err"] = "bratku nie ma takiego uzytkownika";
    header("Location: index.php");
}
