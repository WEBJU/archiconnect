<?php
//start session
session_start();

//destroy
unset($_SESSION['username']);

header('Location:index.php');
 ?>
