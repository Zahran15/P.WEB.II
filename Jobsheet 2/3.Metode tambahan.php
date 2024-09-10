<?php
class Mahasiswa {
    public $nama;
    public $nim;
    public $jurusan;

    // Constructor untuk menginisialisasi atribut
    public function __construct($nama, $nim, $jurusan) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
    }

    // Metode untuk menampilkan data mahasiswa
    public function tampilkanData() {
        echo "Nama: " . $this->nama . "<br>";
        echo "NIM: " . $this->nim . "<br>";
        echo "Jurusan: " . $this->jurusan . "<br>";
    }

    // Metode untuk mengubah jurusan
    public function updateJurusan($jurusanBaru) {
        $this->jurusan = $jurusanBaru;
    }
}

// Instansiasi objek
$mahasiswa3 = new Mahasiswa("Siti Rahma", "789012", "Teknik Informatika");

// Mengubah jurusan mahasiswa
$mahasiswa3->updateJurusan("Teknik Komputer");

// Menampilkan data mahasiswa setelah perubahan jurusan
$mahasiswa3->tampilkanData();
?>
