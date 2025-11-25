<?php //this opens the php code section
session_start(); // have to start the session to end it

require_once "asset/common.php";  # bring in the common functions we need
require_once "asset/dbconn.php"; # get the connection functions for the database

try {
    auditor(dbconnect_insert(), $_SESSION["customerid"], "logout", "User has successfully logged out");
} catch (Exception $e){
    $_SESSION['usermessage'] = $e->getMessage();
    header("Location: index.php");
    exit;
}

session_destroy(); // ends session

header("location: index.php?message= You have been logged out"); // displays logout message