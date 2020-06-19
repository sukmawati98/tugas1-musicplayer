<!DOCTYPE html>
<html>

<head>
	<title>latihan 1</title>
	<link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
</head>

<body>
	<div class="container">
		<div class="header">
			<center><img src="layout/assets/image/sukma.jpg" width="100%"></center>
		</div>
		<center>
			<div class="menu">
				<a href="index.php">Home</a> &nbsp;
				<a href="artist_tampil.php">Artist</a> &nbsp;
				<a href="album_tampil.php">Album</a>&nbsp;
				<a href="track_tampil.php">Track</a>&nbsp;
				<a href="played_tampil.php">Played</a>&nbsp;
				<a href="logout.php">Logout</a>

			</div>
		</center>

		<div class="main">

			<?php

			if (isset($_GET['page'])) {
				include $_GET['page'] . ".php";
			} else {
				include "main.php";
			}
			?>
		</div>

		<div>
		<!-- footer -->
		<?php include "footer.php" ?>
	</div>
	</div>
</body>

</html>