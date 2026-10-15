<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "litera_line"
);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>
