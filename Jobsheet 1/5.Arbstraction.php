<?php
// Class abstrak Pengguna
abstract class Pengguna {
    protected $nama;

    public function __construct($nama) {
        $this->nama = $nama;
    }

    abstract public function aksesFitur();
}

// Class Mahasiswa yang mengimplementasikan metode abstrak
class Mahasiswa extends Pengguna {
    public function aksesFitur() {
        echo "Mahasiswa " . $this->nama . " mengakses fitur mahasiswa.<br>";
    }
}

// Class Dosen yang mengimplementasikan metode abstrak
class Dosen extends Pengguna {
    public function aksesFitur() {
        echo "Dosen " . $this->nama . " mengakses fitur dosen.<br>";
    }
}

// Instansiasi objek dari class Mahasiswa dan Dosen
$mahasiswa = new Mahasiswa("Zahran");
$dosen = new Dosen("Pak Abda'u");

$mahasiswa->aksesFitur();
$dosen->aksesFitur();
?>
