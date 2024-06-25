<?php

session_destroy();

// Redirect to the login page or any other page after logout
header("Location: ../../../home/index.php");
exit();
?>