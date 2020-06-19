<?php
include_once("controller.php");

class Track extends Controller
{

	public function __construct()
	{
		$this->db = new controller();
		$this->db = $this->db->dbConnect();
	}

	public function input()
	{

		$track_nama = $_POST['track_name'];
		$artistid = $_POST['artist_id'];
		$albumid = $_POST['album_id'];
		$waktu = $_POST['waktu'];


		$sql = "INSERT INTO tb_track (track_name, artist_id, album_id,waktu) VALUES
										(:track_name, :artist_id, :album_id, :waktu)";

		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":track_name", $track_nama);
		$stmt->bindParam(":artist_id", $artistid);
		$stmt->bindParam(":album_id", $albumid);
		$stmt->bindParam(":waktu", $waktu);
		$stmt->execute();

		return false;
	}

	public function tampil()
	{
		$sql = "SELECT * FROM tb_track JOIN tb_artist ON tb_track.artist_id = tb_artist.artist_id JOIN tb_album ON tb_track.album_id = tb_album.album_id";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		$data = [];

		while ($row = $stmt->fetch()) {
			$data[] = $row;
		}

		return $data;
	}

	public function edit($id)
	{
		$sql = "SELECT * FROM tb_track WHERE track_id=:track_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":track_id", $id);
		$stmt->execute();

		$row = $stmt->fetch();

		return $row;
	}

	public function update()
	{
		$track_nama = $_POST['track_name'];
		$artistid = $_POST['artist_id'];
		$albumid = $_POST['album_id'];
		$waktu = $_POST['waktu'];
		$id = $_POST['track_id'];

		$sql = "UPDATE tb_track SET track_name=:track_name, artist_id=:artist_id, album_id=:album_id, waktu=:waktu WHERE track_id=:track_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":track_name", $track_nama);
		$stmt->bindParam(":artist_id", $artistid);
		$stmt->bindParam(":album_id", $albumid);
		$stmt->bindParam(":waktu", $waktu);
		$stmt->bindParam(":track_id", $id);

		$stmt->execute();

		return false;
	}

	public function delete($id)
	{

		$sql = "DELETE FROM tb_track WHERE track_id=:track_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":track_id", $id);
		$stmt->execute();

		return false;
	}
}
