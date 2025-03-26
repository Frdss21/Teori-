<?php
// 1. Program Menentukan Kategori Usia
$umur = 16;

echo "Menentukan Kategori Usia untuk Umur $umur: \n";
if ($umur < 13) {
    echo "Kategori: Anak";
} elseif ($umur >= 13 && $umur <= 17) {
    echo "Kategori: Remaja";
} else {
    echo "Kategori: Dewasa";
}

echo "\n\n";

// 2. Program Mengecek Bilangan Positif, Negatif, atau Nol
$angka = -5;

echo "Menentukan Jenis Bilangan untuk Angka $angka: \n";
if ($angka > 0) {
    echo "Bilangan Positif";
} elseif ($angka < 0) {
    echo "Bilangan Negatif";
} else {
    echo "Bilangan Nol";
}
?>