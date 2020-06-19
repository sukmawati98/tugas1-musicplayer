<?php

include_once('controller.php');
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new controller();
        $this->db = $this->db->dbConnect();
    }
    public function Login($username, $pass)
    {
        if (!empty($username) && !empty($pass)) {
            $st = $this->db->prepare("select * from tb_user where username=? AND pass=?");
            $st->bindParam(1, $username);
            $st->bindParam(2, $pass);
            $st->execute();
            $data = $st->fetchAll();
            foreach ($data as $rows_user) {
                $_SESSION['user_id'] = $rows_user['user_id'];
                $_SESSION['username'] = $rows_user['username'];
                $_SESSION['pass'] = $rows_user['pass'];
            }


            if ($st->rowCount() == 1) {

                echo "<script>alert('Login Berhasil');</script>";
                echo "<script>location='index.php';</script>";
            } else {
                echo "<script>alert('Username dan Password Anda Salah');</script>";
                echo "<script>location='login.php';</script>";
            }
        } else {
           echo "<script>alert('Masukkan Username dan Passwordnya');</script>";
            echo "<script>location='login.php';</script>";
        }
    }
}
