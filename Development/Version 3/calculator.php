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
echo "<head>";  // opening head

echo "<title>page title</title>";  // creating title
echo "<link rel='stylesheet' type='text/css' href='css\styles.css'>";// getting css formatting for website from external
echo "</head>";
echo "<body>"; // opening body


echo "<div class ='container'>"; // class container to give all items a default to reduce need for styling later
require_once "asset/topbar.php"; // presenting header
echo "</div>";
echo '<br>';

echo "<div class ='content'>"; // class context to give all items that give information an overall css to reduce need for styling later and standardise formatting
echo "<br>";
echo "<form method='post' action=''>";
echo "<input type= 'text'name ='mon_elec_bill' placeholder='Monthly electric bill'>";
echo "<br>";
echo "<input type= 'text'name ='mon_gas_bill' placeholder='Monthly gas bill'>";
echo "<br>";
echo "<input type= 'submit' name='submit' value='submit'>";
echo "</form>";

echo '<br>';

echo "</div>";

echo "<br>";