<?php
echo "<div class='navi'>";//declares class
echo "<nav>";

echo "<ul>";//declares unordered list

if(!isset($_SESSION['user'])){
    echo "<li><a href='login.php'>Login</a></li>";
    echo "<li><a href='register.php'>Register</a></li>";
} else {

    echo "<li><a href='book.php'>Book Appointment</a></li>";
    echo "<li><a href='logout.php'>Logout</a></li>";
}

echo "</ul>";//closes list

echo "</nav>";
echo "</div>";