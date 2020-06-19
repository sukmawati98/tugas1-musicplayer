<?php

class controller
{

	protected  $db;

	public function dbConnect()
	{



		return new PDO("mysql:host=localhost;dbname=dbtugas1", "root", "");
	}
}
