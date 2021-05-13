<?php
session_start();
if (!isset($_SESSION["Cus_ID"])) {
    header("Location: CusLogin.php");
    exit();
}