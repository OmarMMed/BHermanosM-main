<?php
session_start();

session_unset();
session_destroy();
header("Location: ../../BHermanosM-main/index.php");
?>