<?php
// Class Pengguna
class Pengguna {
    protected $nama;

    // Constructor untuk inisialisasi nama
    public function __construct($nama) {
        $this->nama = $nama;
    }

    public function aksesFitur() {
        echo "{$this->nama} mengakses fitur umum.<br>";
    }
}

// Class Dosen yang mewarisi class Pengguna
class Dosen extends Pengguna {
    public function aksesFitur() {
        echo "Dosen {$this->nama} mengakses fitur untuk dosen.<br>";
    }
}

// Class Mahasiswa yang mewarisi class Pengguna
class Mahasiswa extends Pengguna {
    public function aksesFitur() {
        echo "Mahasiswa {$this->nama} mengakses fitur untuk mahasiswa.<br>";
    }
}

// Instansiasi objek dengan nama dan panggil metode aksesFitur
$dosen = new Dosen("Pak Abdau'u");
$mahasiswa = new Mahasiswa("Zahran");

$dosen->aksesFitur();      // Output: Dosen Pak Abda'u mengakses fitur untuk dosen.
$mahasiswa->aksesFitur();  // Output: Mahasiswa Zahran mengakses fitur untuk mahasiswa.
?>
