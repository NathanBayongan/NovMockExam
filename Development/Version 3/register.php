<?php
session_start();

require_once "asset/common.php"; // connects this to the common function
require_once "asset/dbconn.php"; // connects this to the function that connects it to the database

if ($_SERVER["REQUEST_METHOD"] === "POST") { // checks the request method
    if (reg_customer(dbconnect_insert(), $_POST)) {
        $_SESSION["usermessage"] = "User has been created successfully";
        auditor(dbconnect_insert(), $_SESSION["customerid"], "log", "User successfully registered");
        header("Location: home.php");
        exit;

    } else {
        $_SESSION["usermessage"] = "User registration failed";
    }
}

echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html
echo "<head>";  // opening head

echo "<title>page title</title>";  // creating title
echo "<link rel='stylesheet' type='text/css' href='css\styles.css'>";// getting css formatting for website from external

echo "</head>";
echo "<body>"; // opening body


echo "<div class ='container'>"; // class container to give all items a default to reduce need for styling later
echo "<div class='topbari'>";//declares class
echo "<topbar>";

echo "<h1>Register</h1>";

echo "</topbar>";
echo "</div>";

echo "<div class ='content'>"; // class context to give all items that give information an overall css to reduce need for styling later and standardise formatting
echo "<br>";
echo "<form method='post' action=''>";
echo "<input type= 'text' name ='fname' placeholder='First Name'>";
echo "<br>";
echo "<input type= 'text' name ='sname' placeholder='Surname'>";
echo "<br>";
echo "<input type= 'text' name ='email' placeholder='Email'>";
echo "<br>";
echo "<input type= 'password' name ='password' placeholder='Password'>";
echo "<br>";
echo "<input type= 'submit' value='Register' id='submit'>";
echo "</form>";
echo "<br>";

echo "</div>";

echo "<br>";
echo user_message();

echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";