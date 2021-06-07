<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "belajarcrud";

$konek = mysqli_connect($hostname, $username, $password, $database);

if ($konek) {
    echo "koneksi Berhasil";
} else {
    echo "Koneksi Gagal";
}
