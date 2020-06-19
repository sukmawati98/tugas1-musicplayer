<link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">

<?php

include "app/track.php";

$trck = new track();
$rows = $trck->tampil();

?>
<body>

	<div class="container">
		<div class="header">
			<center><img src="layout/assets/image/sukma.jpg" width="100%"></center>
		</div>

		<center>
			<div class="menu">
				<a href="index.php">Home</a>
				<a href="artist_tampil.php">Artist</a>
				<a href="album_tampil.php">Album</a>
				<a href="track_tampil.php">Track</a>
				<a href="played_tampil.php">Played</a>
				<a href="logout.php">Logout</a>

			</div>
		</center>
		<center>
			<h2>TRACK</h2>
		</center>
		<center><a class="tambah" href="track_input.php">Tambah</a></center>
		<div class="main">

			<table>

				<table>
					<table width="400px" border="2" cellpadding="10" cellspacing="10" bgcolor="#DCFFFB" align="center">
						<tr>
							<td>No</td>
							<td>Track Name</td>
							<td>Artis</td>
							<td>Album</td>
							<td>Waktu</td>
							<td>Edit</td>
							<td>Delete</td>
						</tr>
						<?php foreach ($rows as $row) { ?>
							<tr>
							<td><?php echo $row['track_id']; ?></td>
							<td><?php echo $row['track_name']; ?></td>
							<td><?php echo $row['artist_id']; ?></td>
							<td><?php echo $row['album_id']; ?></td>
							<td><?php echo $row['waktu']; ?></td>
							<td><a class="edit" href="track_edit.php?id=<?php echo $row['track_id']; ?>">Edit</a></td>
							<td><a onclick="return confirm('Are You Sure')" class="delete" href="track_proses.php?delete-id=<?php echo $row['track_id']; ?>">Delete</a></td>

							</tr>
						<?php } ?>
					</table>
		</div>
		<div>
		<!-- footer -->
		<?php include "footer.php" ?>
	</div>
	</div>
</body>