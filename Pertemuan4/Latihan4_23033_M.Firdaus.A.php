<?php
// 1. Variabel integer
$angka = 20;
echo "Nilai integer: " . $angka . "\n\n";

// 2. Variabel float
$desimal = 3.14;
echo "Nilai float: " . $desimal . "\n\n";

// 3. Variabel string
$teks = "Pemrograman Web";
echo "Nilai string: " . $teks . "\n\n";

// 4. Variabel boolean
$benar = true;
echo "Nilai boolean: " . ($benar ? 'true' : 'false') . "\n\n";

// 5. Array dengan 3 nama
$nama = array("cecep", "asep", "dudu");
echo "Nama pertama dalam array: " . $nama[0] . "\n\n";

// 6. Kelas Mobil dengan properti Merk dan Tahun
class Mobil {
    public $merk;
    public $tahun;

    function __construct($merk, $tahun) {
        $this->merk = $merk;
        $this->tahun = $tahun;
    }
}

// Membuat objek Mobil
$mobilBaru = new Mobil("Nissan", 2005);
echo "Merk Mobil: " . $mobilBaru->merk . "\n\n";
?>