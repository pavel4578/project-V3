<?php
session_srart();
session_destroy();
header("Location: login.php");
exit;
?>