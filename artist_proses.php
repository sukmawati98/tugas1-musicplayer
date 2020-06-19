<?php

include_once "app/Controller.php";
include_once "app/artist.php";

$artis = new Artist();

if ($_POST['btn-simpan']) {
	$artis->input();
	header("location:artist_tampil.php");
}

if ($_POST['btn-edit']) {
	$artis->update();
	header("location:artist_tampil.php");
}

if ($_GET['delete-id']) {
	$artis->delete($_GET['delete-id']);
	header("location:artist_tampil.php");
}
