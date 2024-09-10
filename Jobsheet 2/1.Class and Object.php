<?php
class Mahasiswa {
    public $nama;
    public $nim;
    public $jurusan;

    // Metode untuk menampilkan data mahasiswa
    public function tampilkanData() {
        echo "Nama: " . $this->nama . "<br>";
        echo "NIM: " . $this->nim . "<br>";
        echo "Jurusan: " . $this->jurusan . "<br>";
    }
}

// Instansiasi objek dari class Mahasiswa
$mahasiswa1 = new Mahasiswa();
$mahasiswa1->nama = "Budi Santoso";
$mahasiswa1->nim = "123456";
$mahasiswa1->jurusan = "Teknik Informatika";

// Menampilkan data mahasiswa
$mahasiswa1->tampilkanData();
?>
