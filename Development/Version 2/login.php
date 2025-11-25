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
        $_SESSION["user_id"] = $usr["patient_id"];
        $_SESSION["usermessage"] = "Success! = user successfully logged in";
        header("Location: index.php");
        exit;
    } else {
        $_SESSION["usermessage"] = "Error: Login and Password do not match";
        header("Location: login.php");
        exit;
    }
}


echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html

echo "<body>"; // opening body

echo "<div class ='content'>"; // class context to give all items that give information an overall css to reduce need for styling later and standardise formatting
echo "<form method='post' action=''>";
echo "<input type= 'text'name ='email' placeholder='Email'>";
echo "<br>";
echo "<input type= 'password'name ='password' placeholder='password'>";
echo "<br>";
echo "<input type= 'submit' value='login' id='submit'>";
echo "</form>";

echo '<br>';

echo "<li><a href='register.php'>register</a></li>"; // navigation button that leads to the register page.

echo '<br>';
echo user_message();


echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";
?>