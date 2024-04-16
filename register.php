<?php
session_start();

//jezeli zalogowano to se po prostu wraca do pliku main.php
if (isset($_SESSION["loggedIn"]) and $_SESSION["loggedIn"] == true) {
    header("Location: main.php");
}
$usr_RegLogin = "";
$usr_RegPass = "";

//walidacja ~ pan Marek Buła
if ($_POST["regLogin"] == "" and $_POST["regPass"] == "" and $_POST["repPass"] == "") {
    $_SESSION["err"] = "Form can't be empty";
    header("Location: regForm.php");
    exit();
} else if ($_POST["regLogin"] != "" and $_POST["regPass"] == "" and $_POST["repPass"] == "") {
    $_SESSION["err"] = "Password can't be empty";
    header("Location: regForm.php");
    exit();
} else if ($_POST["regLogin"] != "" and $_POST["regPass"] != "" and $_POST["repPass"] == "") {
    $_SESSION["err"] = "Password can't be empty";
    header("Location: regForm.php");
    exit();
} else if ($_POST["regLogin"] == "" and $_POST["regPass"] != "" and $_POST["repPass"] != "") {
    $_SESSION["err"] = "Login can't be empty";
    header("Location: regForm.php");
    exit();
} else if ($_POST["regLogin"] != "" and $_POST["regPass"] != "" and $_POST["repPass"] != "") {
    if ($_POST["regPass"] != $_POST["repPass"]) {
        $_SESSION["err"] = "Passwords doesn't match";
        header("Location: regForm.php");
        exit();
    }
    unset($_SESSION["err"]);
    $usr_RegLogin = $_POST["regLogin"];
    $usr_RegPass = $_POST["regPass"];
}

//otwiera sobie plik ten z loginami do $content
$file1 = fopen("logins.txt", "a+");
$content = "";
while (!feof($file1)) {
    $content .= fgets($file1);
}

//dzieli $content na array'a
$content = preg_split("/[\s,]+/", $content);

$logins = [];

foreach (array_keys($content) as $item) {
    if ($item % 2 == 0) {
        array_push($logins, $content[$item]);
    }
}

$regLoginOk = false;

foreach ($logins as $login) {
    if ($usr_RegLogin == $login) {
        $_SESSION["err"] = "User of that login exists";
        header("Location: regForm.php");
        exit();
    }
}
$regLoginOk = true;

//zapisuje zhashowane haslo
fwrite($file1, "\n" . $usr_RegLogin . " " . password_hash($usr_RegPass, PASSWORD_DEFAULT));


fclose($file1);


header("Location: index.php");
