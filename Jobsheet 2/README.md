# Jobsheet
## Jobsheet 2 : Menggunakan Konsep Kelas dan Objek dalam PHP
### Tujuan 
Dengan jobsheet ini, mahasiswa diharapkan mampu menerapkan konsep kelas dan objek dalam PHP melalui serangkaian tugas yang menekankan pada pembuatan dan penggunaan kelas serta objek.
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

### Construct
```php
// Constructor untuk menginisialisasi atribut
    public function __construct($merk, $warna) {
        $this->merk = $merk;
        $this->warna = $warna;
```
Constructor adalah sebuah metode khusus yang secara otomatis dipanggil ketika objek dari sebuah class dibuat. Fungsinya adalah untuk menginisialisasi atribut atau properti objek tersebut.

## Intruksi
## 1. Membuat Class dan Object
- Buat class Mahasiswa yang memiliki atribut nama, nim, dan jurusan.
```php
class Mahasiswa {
    public $nama;
    public $nim;
    public $jurusan;
```
Membuat class mahasiswa yang mempunyai atribut nama, nim, dan jurusan
- Buat metode tampilkanData() dalam class Mahasiswa.
```php
// Metode untuk menampilkan data mahasiswa
    public function tampilkanData() {
        echo "Nama: " . $this->nama . "<br>";
        echo "NIM: " . $this->nim . "<br>";
        echo "Jurusan: " . $this->jurusan . "<br>";
    }
}
```
tampilkanData() untuk menampilkan data dari masing masing atribut
- Instansiasi objek dari class Mahasiswa dan tampilkan data mahasiswa tersebut.
```php
// Instansiasi objek dari class Mahasiswa
$mahasiswa1 = new Mahasiswa();
$mahasiswa1->nama = "Budi Santoso";
$mahasiswa1->nim = "123456";
$mahasiswa1->jurusan = "Teknik Informatika";

// Menampilkan data mahasiswa
$mahasiswa1->tampilkanData();
```
new Mahasiswa() digunakan untuk membuat objek baru dari class Mahasiswa. Dalam contoh ini, objek tersebut adalah $mahasiswa1.Properti dari objek tersebut diisi dengan nilai untuk nama, nim, dan jurusan. Metode tampilkanData() dipanggil menggunakan $mahasiswa1->tampilkanData(), yang akan menampilkan informasi mahasiswa yang telah di-set sebelumnya
- Kode yang bersih dan instruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%202/1.%20C%20and%20O.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%202/Output%201.png)

## 2. Implementasi Constructor
- Tambahkan constructor pada kelas Mahasiswa yang akan menginisialisasi
```php
// Constructor untuk menginisialisasi atribut
    public function __construct($nama, $nim, $jurusan) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
    }
```
Constructor adalah metode khusus dalam sebuah class yang secara otomatis dipanggil ketika objek dibuat. Dalam PHP, constructor didefinisikan dengan nama __construct(). Constructor ini menerima tiga parameter: $nama, $nim, dan $jurusan, lalu menginisialisasi atribut nama, nim, dan jurusan dari objek yang dibuat.
- Gunakan constructor ini untuk mengatur nilai awal dari atribut saat objek dibuat.
```php
// Instansiasi objek dengan constructor
$mahasiswa2 = new Mahasiswa("Andi Wijaya", "654321", "Sistem Informasi");

// Menampilkan data mahasiswa
$mahasiswa2->tampilkanData();
```
Saat objek Mahasiswa dibuat dengan menggunakan new Mahasiswa("Andi Wijaya", "654321", "Sistem Informasi"), nilai-nilai tersebut secara otomatis diisi oleh constructor untuk atribut nama, nim, dan jurusan
- Kode yang bersih dan instruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%202/2.%20Implementasi.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%202/Output%202.png)

## 3. Membuat Metode Tambahan
- Buat metode updateJurusan() dalam kelas Mahasiswa yang memungkinkan perubahan jurusan.
```php
// Metode untuk mengubah jurusan
    public function updateJurusan($jurusanBaru) {
        $this->jurusan = $jurusanBaru;
    }
}
```
Metode ini ditambahkan ke dalam class Mahasiswa untuk memungkinkan perubahan nilai atribut jurusan. Metode menerima satu parameter, yaitu $jurusanBaru, yang kemudian menggantikan nilai jurusan dari objek tersebut.
- Gunakan metode ini untuk mengubah jurusan dari objek yang sudah dibuat.
```php
// Instansiasi objek
$mahasiswa3 = new Mahasiswa("Siti Rahma", "789012", "Teknik Informatika");

// Mengubah jurusan mahasiswa
$mahasiswa3->updateJurusan("Teknik Komputer");

// Menampilkan data mahasiswa setelah perubahan jurusan
$mahasiswa3->tampilkanData();
```
Objek Mahasiswa diinstansiasi dengan nilai awal jurusan "Teknik Informatika". Metode updateJurusan() dipanggil dengan parameter "Teknik Komputer" untuk mengubah jurusan mahasiswa.
- Kode yang bersih dan instruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%202/3.%20Metode%20tambahan.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%202/Output%203.png)

## 4. Penggunaan Atribut dan Metode
- Ubah nilai atribut nim dari objek Mahasiswa menggunakan metode setter.
```php
// Setter untuk mengubah NIM
    public function setNim($nimBaru) {
        $this->nim = $nimBaru;
    }
}
```
Metode ini ditambahkan ke dalam class Mahasiswa untuk mengubah nilai atribut nim. Metode menerima satu parameter, yaitu $nimBaru, yang digunakan untuk memperbarui nilai nim dari objek tersebut.
- Tampilkan data mahasiswa yang sudah diperbarui dengan memanggil metode tampilkanData().
```php
// Instansiasi objek
$mahasiswa4 = new Mahasiswa("Rina Sari", "345678", "Teknik Industri");

// Mengubah NIM
$mahasiswa4->setNim("987654");

// Menampilkan data mahasiswa setelah NIM diperbarui
$mahasiswa4->tampilkanData();
```
Objek Mahasiswa diinstansiasi dengan nilai awal NIM "345678". Metode setNim() dipanggil dengan parameter "987654" untuk mengganti NIM yang ada dengan nilai baru.
- Kode yang bersih dan instruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%202/4.%20Atribut%20and%20Setter.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%202/Output%204.png)

# Tugas
## 1. Implementasikan kelas Dosen dengan atribut nama, nip, dan mataKuliah.
```php
class Dosen {
    public $nama;
    public $nip;
    public $mataKuliah;
```
Atribut nama, nip, dan mataKuliah didefinisikan sebagai properti publik sehingga dapat diakses dari luar class.
## 2. Buat metode tampilkanDosen() untuk menampilkan informasi dosen.
```php
// Metode untuk menampilkan informasi dosen
    public function tampilkanDosen() {
        echo "Nama Dosen: " . $this->nama . "<br>";
        echo "NIP: " . $this->nip . "<br>";
        echo "Mata Kuliah: " . $this->mataKuliah . "<br>";
    }
}
```
Metode ini berfungsi untuk menampilkan informasi lengkap tentang dosen, termasuk nama, NIP, dan mata kuliah yang diajarkan.
## 3. Buat objek dari kelas Dosen, dan gunakan metode tampilkanDosen() untuk menampilkan informasi tersebut.
```php
// Instansiasi objek dari kelas Dosen
$dosen1 = new Dosen("Dr. Bambang Sudiro", "123456789", "Pemrograman Web");

// Menampilkan informasi dosen
$dosen1->tampilkanDosen();
```
Objek Dosen dibuat dengan nilai atribut yang sesuai melalui constructor. Setelah itu, metode tampilkanDosen() dipanggil untuk menampilkan data dosen tersebut.
## 4. Buat dokumentasi proyek dan unggah ke repository GitHub, menjelaskan proses pembuatan kelas, penggunaan metode, dan hasil output.
- Kode yang bersih dan instruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%202/Tugas.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%202/Output%20Tugas.png)
