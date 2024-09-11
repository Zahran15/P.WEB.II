# Jobsheet 
## Jobsheet 1: Implementasi Prinsip OOP dalam PHP
### Tujuan 
Melalui jobsheet ini, mahasiswa diharapkan mampu mengimplementasikan konsep
dasar OOP dalam pemrograman PHP dengan membuat class, objek, serta
menerapkan prinsip Encapsulation, Inheritance, Polymorphism, dan Abstraction.

## Kelas dan Objek dalam PHP
### Class
```php
class Mahasiswa
```
Class adalah Sebuah blueprint atau template untuk membuat objek. Kelas mendefinisikan atribut (variabel) dan method (fungsi) yang akan dimiliki oleh objek.

### Object
```php
$mahasiswa = new Mahasiswa;
```
Object adalah Sebuah instance dari kelas. Objek dibuat menggunakan kata kunci new dan merupakan representasi nyata dari kelas.

## Atribut dan Method dalam PHP
### Atribut
```php
public $name;
private $password;
Protected $account;
```
Atribut adalah variabel yang didefinisikan dalam class, digunakan untuk menyimpan data atau status dari objek.
Jemis-jenis atribut
- Public : Atribut atau metode yang dideklarasikan sebagai public dapat diakses dari mana saja, baik dari dalam kelas itu sendiri, dari kelas turunan (subclass), maupun dari luar kelas. Ini adalah tingkat akses yang paling terbuka.
- Private : Atribut atau metode yang dideklarasikan sebagai private hanya bisa diakses dari dalam kelas itu sendiri. Kelas turunan ataupun kode di luar kelas tidak bisa mengakses atribut atau metode yang bersifat private.
- Protected : Atribut atau metode yang dideklarasikan sebagai protected hanya dapat diakses dari dalam kelas itu sendiri dan dari kelas turunan (subclass), tetapi tidak bisa diakses langsung dari luar kelas.

### Method
```php
public function tampilkanInfo(){
  return "name $this->name, password $this->password, account $this->accatount";
}
```
Method adalah fungsi yang didefinisikan di dalam sebuah kelas dan digunakan untuk menentukan perilaku atau tindakan yang bisa dilakukan oleh objek dari kelas tersebut.

## Instruksi
## 1. Membuat Class dan Object
- Buat class Mahasiswa yang memiliki atribut nama, nim, dan jurusan.
```php
class Mahasiswa {
    public $nama;
    public $nim;
    public $jurusan;
```
Kelas ini mendefinisikan struktur data mahasiswa dengan tiga properti: nama, nim, dan jurusan
- Buat metode tampilkanData() dalam class Mahasiswa.
```php
public function tampilkanData() {
        echo "Nama: " . $this->nama . "<br>";
        echo "NIM: " . $this->nim . "<br>";
        echo "Jurusan: " . $this->jurusan . "<br>";
    }
}
```
Method ini berfungsi untuk menampilkan data mahasiswa (nama, NIM, dan jurusan) dalam format HTML dengan menggunakan perintah echo.
- Instansiasi objek dari class Mahasiswa dan tampilkan data mahasiswa tersebut.
```php
$mahasiswa = new Mahasiswa("Zahran Rezqy Syahputra", "230202048", "Teknik Informatika");
$mahasiswa->tampilkanData();
```
Objek Mahasiswa dibuat dengan data tertentu (nama, NIM, jurusan) menggunakan keyword new.
Setelah objek dibuat, method tampilkanData() dipanggil untuk mencetak data mahasiswa ke halaman web.
- Kode yang bersih dan terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/class.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Output%201.png)

## 2. Encapsulation
Menyembunyikan detail implementasi dan hanya memberikan akses melalui metode tertentu.
- Ubah atribut dalam class Mahasiswa menjadi private.
```php
class Mahasiswa {
    private $nama;
    private $nim;
    private $jurusan;
}
```
Mengubah semua atribut menjadi private
- Buat metode getter dan setter untuk atribut nama, nim, dan jurusan.
```php
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
```
Membuat getter dan setter untuk semua atribut get untuk mendapatkan nilai dari private sedangkan set untuk mengubah nilai dari private 
- Demonstrasikan akses ke atribut menggunakan metode getter dan setter.
```php
// Instansiasi objek
$mahasiswa = new Mahasiswa("Andi", "230202048", "Teknik Informatika");
$mahasiswa->setNama("Zahran");
$mahasiswa->tampilkanData();
```
menggunakan getNama andi dan mengubahnya dengan setNama menjadi zahran
- Kode yang bersih dan terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Encapsulation.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Output%202.png)

## 3. Inheritance
Kelas dapat mewarisi properti dan metode dari kelas lain.
- Buat class Pengguna dengan atribut nama dan metode getNama().
```php
class Pengguna {
    protected $nama;

    public function __construct($nama) {
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }
}
```
Class Pengguna berfungsi sebagai kelas induk (parent class) yang memiliki satu atribut dan satu metode.  Konstruktor berfungsi untuk menginisialisasi nilai atribut nama saat objek dibuat. public function getNama(): Metode ini berfungsi untuk mengambil nilai dari atribut nama
- Buat class Dosen yang mewarisi class Pengguna dan tambahkan atribut
mataKuliah.
```php
class Dosen extends Pengguna {
    private $mataKuliah;

    public function __construct($nama, $mataKuliah) {
        parent::__construct($nama);
        $this->mataKuliah = $mataKuliah;
    }

    public function tampilkanData() {
        echo "Nama Dosen: " . $this->getNama() . "<br>";
        echo "Mata Kuliah: " . $this->mataKuliah . "<br>";
    }
}
```
Class Dosen adalah class turunan (child class) dari Pengguna. Class ini mewarisi atribut dan metode dari Pengguna, serta menambahkan atribut dan metode baru. private $mataKuliah;: Atribut ini menyimpan mata kuliah yang diampu oleh dosen. Aksesnya bersifat private, sehingga hanya dapat diakses dari dalam class Dosen sendiri.
- Instansiasi objek dari class Dosen dan tampilkan data dosen.
```php
$dosen = new Dosen("Pak Abda'u", "Praktikum Pemrograman Web");
$dosen->tampilkanData();
```
Instansiasi objek dilakukan dengan menggunakan kata kunci new, dan kemudian metode tampilkanData() dipanggil untuk menampilkan data.
- Kode yang bersih dan terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Inheritance.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Output%203.png)

## 4. Polymorphism
Metode yang sama dapat memiliki implementasi berbeda dalam class yang berbeda.
- Buat class Pengguna dengan metode aksesFitur().
```php
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
```
Class Pengguna berfungsi sebagai class induk yang memiliki satu metode aksesFitur(). Metode aksesFitur() di class Pengguna menampilkan pesan umum yang menyebutkan bahwa pengguna mengakses fitur umum.
- Implementasikan aksesFitur() dengan cara berbeda di class Dosen dan Mahasiswa.
```php
class Dosen extends Pengguna {
    public function aksesFitur() {
        echo "Dosen {$this->nama} mengakses fitur untuk dosen.<br>";
    }
}

class Mahasiswa extends Pengguna {
    public function aksesFitur() {
        echo "Mahasiswa {$this->nama} mengakses fitur untuk mahasiswa.<br>";
    }
}
```
Class Dosen dan Mahasiswa mewarisi class Pengguna, namun mereka meng-overwrite metode aksesFitur() untuk menampilkan pesan yang berbeda, sesuai dengan jenis pengguna. Dosen::aksesFitur(): Menampilkan pesan bahwa dosen mengakses fitur khusus untuk dosen. Mahasiswa::aksesFitur(): Menampilkan pesan bahwa mahasiswa mengakses fitur khusus untuk mahasiswa.
- Instansiasi objek dari class Dosen dan Mahasiswa, lalu panggil metode aksesFitur().
```php
$dosen = new Dosen("Pak Abda'u");
$mahasiswa = new Mahasiswa("Zahran");

$dosen->aksesFitur();      // Output: Dosen Pak Abda'u mengakses fitur untuk dosen.
$mahasiswa->aksesFitur();  // Output: Mahasiswa Zahran mengakses fitur untuk mahasiswa.
```
Objek dibuat dari class Dosen dan Mahasiswa, dan kemudian masing-masing memanggil metode aksesFitur() yang sudah di-overwrite di class mereka.
- Kode yang bersih dan terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Polymorphism.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Output%204.png)

## 5. Abstraction 
Menyembunyikan detail implementasi dan hanya menampilkan fungsi penting.
- Buat class abstrak Pengguna dengan metode abstrak aksesFitur().
```php
abstract class Pengguna {
    protected $nama;

    public function __construct($nama) {
        $this->nama = $nama;
    }

    abstract public function aksesFitur();
}
```
Class Pengguna adalah class abstrak yang berfungsi sebagai blueprint untuk class lain yang akan mewarisinya. Class abstrak tidak dapat diinstansiasi langsung, tetapi harus diimplementasikan oleh class turunannya. Class abstrak: Class yang tidak bisa diinstansiasi langsung. Metode abstrak aksesFitur(): Harus diimplementasikan oleh class turunannya. Di sini, hanya deklarasinya saja tanpa implementasi di dalam class Pengguna.
- Implementasikan class Mahasiswa dan Dosen yang mengimplementasikan metode abstrak tersebut.
```php
class Mahasiswa extends Pengguna {
    public function aksesFitur() {
        echo "Mahasiswa " . $this->nama . " mengakses fitur mahasiswa.<br>";
    }
}

class Dosen extends Pengguna {
    public function aksesFitur() {
        echo "Dosen " . $this->nama . " mengakses fitur dosen.<br>";
    }
}
```
Class Mahasiswa dan Dosen mewarisi class Pengguna dan mengimplementasikan metode abstrak aksesFitur(). Mahasiswa::aksesFitur(): Mengimplementasikan metode abstrak dari class Pengguna dengan menampilkan pesan bahwa mahasiswa mengakses fitur mahasiswa. Dosen::aksesFitur(): Mengimplementasikan metode abstrak dengan menampilkan pesan bahwa dosen mengakses fitur dosen.
- Demonstrasikan dengan memanggil metode aksesFitur() dari objek yang diinstansiasi.
```php
$mahasiswa = new Mahasiswa("Zahran");
$dosen = new Dosen("Pak Abda'u");

$mahasiswa->aksesFitur();
$dosen->aksesFitur();
```
Instansiasi objek dilakukan dari class Mahasiswa dan Dosen, dan metode aksesFitur() dipanggil untuk menampilkan pesan yang spesifik. 
- Kode yang bersih dan terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Abstraction.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Output%205.png)
