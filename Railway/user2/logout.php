<?php
session_start();
session_destroy();
header("location:../../railway/index.php");
exit;
?>