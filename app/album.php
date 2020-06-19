<?php
include_once("Controller.php");

class Album extends Controller
{

	public function __construct()
	{
		$this->db = new Controller();
		$this->db = $this->db->dbConnect();
	}

	public function input()
	{

		$artistid = $_POST['artist_id'];
		$album_nama = $_POST['album_name'];

		$sql = "INSERT INTO tb_album (artist_id, album_name) VALUES
										(:artist_id, :album_name)";

		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":artist_id", $artistid);
		$stmt->bindParam(":album_name", $album_nama);
		$stmt->execute();

		return false;
	}

	public function tampil()
	{
		$sql = "SELECT * FROM tb_album JOIN tb_artist ON tb_album.artist_id = tb_artist.artist_id";
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
		$sql = "SELECT * FROM tb_album WHERE artist_id=:artist_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":artist_id", $id);
		$stmt->execute();

		$row = $stmt->fetch();

		return $row;
	}

	public function update()
	{
		$artistid = $_POST['artist_id'];
		$album_nama = $_POST['album_name'];
		$id = $_POST['album_id'];

		$sql = "UPDATE tb_album SET artist_id=:artist_id, album_name=:album_name WHERE album_id=:album_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":artist_id", $artistid);
		$stmt->bindParam(":album_name", $album_nama);
		$stmt->bindParam(":album_id", $id);

		$stmt->execute();

		return false;
	}

	public function delete($id)
	{

		$sql = "DELETE FROM tb_album WHERE album_id=:album_id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(":album_id", $id);
		$stmt->execute();

		return false;
	}
}
