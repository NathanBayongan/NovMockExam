<?php //this opens the php code section

if (!isset($_GET['message'])) { // Checks if variable 'message' has been assigned anything
    session_start();
    $message = false; // Setting it as false to prevent errors further down the ode
} else {
    // Decodes the message for display
    $message = htmlspecialchars(urldecode($_GET['message']));
}


require_once "asset/dbconn.php";
require_once "asset/common.php";

echo "<!DOCTYPE html>";  // desired tag to declare what type of page it is

echo "<html>";  // opening html

echo "<body>"; // opening body

try {
    $conn = dbconnect_insert(); // establishes connection to database
    echo ""; // display message to ensure the connection is valid

} catch (PDOException $e) {
    echo $e->getMessage();
}
if (!$message) { // checks if 'message' variable has been set
    echo user_message(); // displays user message

} else {
    echo $message; // displays message
}

echo "</div>";

echo "</div>";
echo '<br>';
require_once "asset/nav.php";// presenting navigation bar

echo "</body>";

echo "</html>";