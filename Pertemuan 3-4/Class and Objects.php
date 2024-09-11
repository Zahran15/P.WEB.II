<?php
// Definisi Kelas
class Mobil {
    // Atribut atau Properties
    public $merk;
    public $warna;


    // Constructor
    public function __construct($merk, $warna) {
        $this->merk = $merk;
        $this->warna = $warna;
    }

    // Metode atau Function
    public function deskripsi() {
        return "Mobil ini adalah $this->merk berwarna $this->warna.";
    }
}
// Instansiasi Objek
$mobil1 = new Mobil("Toyota", "Hitam");
echo $mobil1->deskripsi();
?>