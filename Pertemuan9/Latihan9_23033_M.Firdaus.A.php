<?php
// Array nama mahasiswa
$mahasiswa = ["Firdaus", "Azzam", "Ilham", "Faisal", "Surya"];

// Menampilkan semua nama mahasiswa
echo "Daftar Nama Mahasiswa: \n";
foreach ($mahasiswa as $nama) {
    echo "- " . $nama . "\n";
}

echo "\n";

// Array nama buah
$buah = ["Apel", "Jambu", "Anggur", "Pisang", "Alpukat", "Kurma", "Melon"];

// Mencari buah yang dimulai dengan huruf "A"
$huruf_awal = "A";
echo "Daftar Buah yang Dimulai dengan Huruf '$huruf_awal': \n";
foreach ($buah as $nama_buah) {
    if (stripos($nama_buah, $huruf_awal) === 0) {
        echo "- " . $nama_buah . "\n";
    }
}
?>