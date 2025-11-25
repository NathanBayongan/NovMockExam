<?php //this opens the php code section
session_start();

require_once"asset/dbconn.php";
require_once"asset/common.php";

if (isset($_SESSION['user'])){
    $_SESSION["usermessage"] = "You are already logged in";
    //header("Location: index.php");
    exit; // stops further execution
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usr = login(dbconnect_insert(), $_POST);

    if ($usr && password_verify($_POST['password'], $usr["password"])) {
        $_SESSION["user"] = true;
        $_SESSION["user_id"] = $usr["customerid"];
        $_SESSION["usermessage"] = "Success! = user successfully logged in";
        auditor(dbconnect_insert(), $_SESSION["customerid"], "log", "User successfully logged in");
        header("Location: home.php");
        exit;
    } else {
        $_SESSION["usermessage"] = "Error: Login and Password do not match";
        header("Location: login.php");
        exit;
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

echo "<h1>Login</h1>";

echo "</topbar>";
echo "</div>";


echo "<div class ='content'>"; // class context to give all items that give information an overall css to reduce need for styling later and standardise formatting
echo "<br>";
echo "<form method='post' action=''>";
echo "<input type= 'text'name ='email' placeholder='Email'>";
echo "<br>";
echo "<input type= 'password'name ='password' placeholder='Password'>";
echo "<br>";
echo "<input type= 'submit' value='login' id='submit'>";
echo "</form>";

echo '<br>';

echo "</div>";

echo "<br>";



echo '<br>';
echo user_message();


echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";
?>