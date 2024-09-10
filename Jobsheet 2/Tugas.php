<?php
class Dosen {
    public $nama;
    public $nip;
    public $mataKuliah;

    // Constructor untuk menginisialisasi atribut
    public function __construct($nama, $nip, $mataKuliah) {
        $this->nama = $nama;
        $this->nip = $nip;
        $this->mataKuliah = $mataKuliah;
    }

    // Metode untuk menampilkan informasi dosen
    public function tampilkanDosen() {
        echo "Nama Dosen: " . $this->nama . "<br>";
        echo "NIP: " . $this->nip . "<br>";
        echo "Mata Kuliah: " . $this->mataKuliah . "<br>";
    }
}

// Instansiasi objek dari kelas Dosen
$dosen1 = new Dosen("Dr. Bambang Sudiro", "123456789", "Pemrograman Web");

// Menampilkan informasi dosen
$dosen1->tampilkanDosen();
?>
