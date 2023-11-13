<?php

include 'connect.php';

session_start();
session_unset();
session_destroy();

header('location:../admins-main/admin_login.php');

?>