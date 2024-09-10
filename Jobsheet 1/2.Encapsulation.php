<?php
// Class Mahasiswa dengan atribut private
class Mahasiswa {
    private $nama;
    private $nim;
    private $jurusan;

    // Constructor
    public function __construct($nama, $nim, $jurusan) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
    }

    // Getter dan Setter untuk nama
    public function getNama() {
        return $this->nama;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    // Getter dan Setter untuk nim
    public function getNim() {
        return $this->nim;
    }

    public function setNim($nim) {
        $this->nim = $nim;
    }

    // Getter dan Setter untuk jurusan
    public function getJurusan() {
        return $this->jurusan;
    }

    public function setJurusan($jurusan) {
        $this->jurusan = $jurusan;
    }

    // Method tampilkanData
    public function tampilkanData() {
        echo "Nama: " . $this->getNama() . "<br>";
        echo "NIM: " . $this->getNim() . "<br>";
        echo "Jurusan: " . $this->getJurusan() . "<br>";
    }
}

// Instansiasi objek
$mahasiswa = new Mahasiswa("Andi", "230202048", "Teknik Informatika");
$mahasiswa->setNama("Zahran");
$mahasiswa->tampilkanData();
?>
