<?php

include_once "app/controller.php";
include_once "app/played.php";

$playd = new played();

if ($_POST['btn-simpan']) {
	$playd->input();
	header("location:played_tampil.php");
}

if ($_POST['btn-edit']) {
	$playd->update();
	header("location:played_tampil.php");
}

if ($_GET['delete-id']) {
	$playd->delete($_GET['delete-id']);
	header("location:played_tampil.php");
}
