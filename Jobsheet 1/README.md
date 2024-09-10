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
- Buat class Pengguna dengan atribut nama dan metode getNama().

- Kode yang bersih dan terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Inheritance.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Output%203.png)

## 4. Polymorphism
- Kode yang bersih dan terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Polymorphism.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Output%204.png)

## 5. Abstraction 
- Kode yang bersih dan terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Abstraction.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%201/Output%205.png)
