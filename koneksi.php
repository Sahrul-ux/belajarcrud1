<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "belajarcrud";

$konek = mysqli_connect($hostname, $username, $password, $database);

if ($konek) {
    echo "";
} else {
    echo "Koneksi Gagal";
}
