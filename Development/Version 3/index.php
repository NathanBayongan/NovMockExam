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
echo "<h2 id='top'>We as Rosla Technologies, are a company that aims to replace fossil fuel energy with<br>";
echo '<p> more environmentally friendly green energy sources to combat carbon emissions and <br>';
echo '<p> reduce carbon footprint of the average person, while also helping customers save <br>';
echo '<p> money on energy bills via renewable energy sources. <br>';
echo '<br>';
echo '<p>Rosla Technologies specialises in:<br>';
echo '<p>- Solar panel installation and maintenance.<br>';
echo '<p>- Electric vehicle charging stations.</p>';
echo '<p id="bottom">- Smart home management systems.</h2>';

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
echo '<br>';
require_once "asset/nav.php";// presenting navigation bar

echo "</body>";

echo "</html>";