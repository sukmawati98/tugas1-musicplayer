<?php


require_once "inc/config.php";
include_once "app/user.php";
include_once "layout/index.php";


if (isset($_SESSION['username']) == 0) {
    header('location:login.php');
}
