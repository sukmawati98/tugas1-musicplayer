<?php
include "app/controller.php";
session_start();
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['pass']);
session_destroy();
header('location:index.php');
