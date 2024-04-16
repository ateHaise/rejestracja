<?php
session_start();
if (!isset($_SESSION["loggedIn"])) {
    header("Location: index.php");
}

echo "Witaj w swiecie programistow, czemu tu jest pusto? nie wiem.... miejsce do ktorego mozesz wejsc,a nie mozesz wyjsc, co nie " . $_SESSION["user"];

echo "<br> <a href='logout.php'>wychodze :( </a>";
//nic tu nie ma co komentowac ig