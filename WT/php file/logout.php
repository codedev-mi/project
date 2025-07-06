<?php
session_start();
session_destroy();
header("Location: assignment3.html");
exit();
?>
