<?php
session_start();

unset($_SESSION["loggedIn"]);
unset($_SESSION["user"]);
unset($_SESSION["err"]);

header("Location: index.php");
//nawet tego nie skomentuje.....