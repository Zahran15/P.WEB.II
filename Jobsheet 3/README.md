# Jobsheet
## Jobsheet 3 : Menerapkan Konsep Inheritance, Polymorphism, Encapsulation, dan Abstraction dalam PHP
### Tujuan
Mahasiswa diharapkan mampu menerapkan prinsip OOP dalam pemrograman PHP melalui tugas yang mengintegrasikan konsep Inheritance, Polymorphism, Encapsulation, dan Abstraction.

## Intruksi
## 1. Inheritance
konsep di mana sebuah kelas baru (kelas anak atau subclass) mewarisi atribut dan metode dari kelas yang sudah ada (kelas induk atau superclass). 
- Buat kelas Person dengan atribut name dan metode getName().
- Buat kelas Student yang mewarisi dari Person dan tambahkan atribut studentID serta metode getStudentID().
```php
class Person {
    // Atribut atau properties
    protected $name;
    
    // Constructor
    public function __construct($name) {
        $this->name = $name;
    }

    // Metode
    public function getName() {
        return $this->name;
    }
}

// Buat kelas Student yang mewarisi dari Person dan tambahkan atribut studentID serta metode getStudentID().
class Student extends Person {
```
Atribut protected $name: Menyimpan nama orang. Akses protected berarti hanya dapat diakses oleh Person dan kelas yang mewarisinya. </br>
Constructor __construct($name): Memungkinkan inisialisasi nama saat objek dibuat. Parameter $name diatur ke atribut $name. </br>
Metode getName(): Mengembalikan nilai dari $name. Digunakan untuk mengambil nama orang. </br>
extends Person: Student mewarisi atribut dan metode dari Person. </br>
Atribut private $studentID: Menyimpan ID mahasiswa. Akses private berarti hanya dapat diakses dari dalam Student. </br>
Constructor __construct($name, $studentID): Menginisialisasi nama dan ID mahasiswa. </br>
parent::__construct($name) memanggil constructor Person untuk mengatur nama, sedangkan $this->studentID mengatur ID mahasiswa.</br>
Metode getStudentID(): Mengembalikan nilai dari $studentID. Digunakan untuk mengambil ID mahasiswa. </br>

## 2. Polymorphism
konsep di mana objek dapat mengambil banyak bentuk atau jenis. Dengan kata lain, polimorfisme memungkinkan metode dengan nama yang sama untuk berfungsi dengan cara yang berbeda tergantung pada objek yang memanggilnya.
- Buat kelas Teacher yang juga mewarisi dari Person dan tambahkan atribut teacherID.
- Override metode getName() di kelas Student dan Teacher untuk menampilkan format berbeda.
```php
class Teacher extends Person {
    // Atribut atau properties
    public $teacherID;

    // Constructor
    public function __construct($name, $teacherID) {
        parent::__construct($name);
        $this->teacherID = $teacherID;
    }

    // Polymorphism (Override method)
    public function getName() {
        return "Nama Guru: ". $this->name;
    }
    
    // Metode
    public function getTeacherID() {
        return "ID: " .$this->teacherID;
    }
}
```
extends Person: Teacher adalah subclass dari Person. Ini berarti Teacher mewarisi atribut dan metode dari Person. </br>
Atribut public $teacherID:Menyimpan ID guru. public berarti dapat diakses dari mana saja, baik dari dalam maupun luar kelas. </br>
Constructor __construct($name, $teacherID): Menginisialisasi nama dan ID guru. parent::__construct($name): Memanggil constructor dari kelas Person untuk mengatur nama. $this->teacherID = $teacherID: Mengatur nilai atribut teacherID dengan parameter yang diberikan. </br>
Polymorphism (Override method) getName(): Override: Mengubah implementasi metode getName() yang diwarisi dari Person. Mengembalikan string dengan format "Nama Guru: " . $this->name. Ini menggantikan implementasi getName() dari Person untuk menambahkan prefix "Nama Guru: ". </br>
Metode getTeacherID(): Mengembalikan string "ID: " . $this->teacherID. Digunakan untuk mengambil ID guru dengan format khusus. </br>

## 3. Encapsulation
konsep yang menyembunyikan detail implementasi internal suatu objek dan hanya memperlihatkan antarmuka yang diperlukan untuk berinteraksi dengan objek tersebut
- Ubah atribut name dan studentID dalam kelas Student menjadi private.
- Tambahkan metode setter dan getter untuk mengakses dan mengubah nilai atribut name dan studentID.
```php
private $studentID; // Ubah atribut studentID dalam kelas Student menjadi private.

    // Constructor
    public function __construct($name, $studentID) {
        parent::__construct($name);
        $this->studentID = $studentID;
    }
    
    // Polymorphism (Override method)
    public function getName() {
        return "Nama : ". $this->name;
    }

    // Encapsulation (getter dan setter studentID)
    public function getStudentID() {
        return "ID: " .$this->studentID;
    }

    public function setStudentID($studentID) {
        $this->studentID = $studentID;
    }

    // Encapsulation (getter dan setter name)
    public function setName($name) {
        $this->name = $name;
    }

}
```
Encapsulation melibatkan penggunaan private untuk melindungi data dan menyediakan metode getter dan setter untuk akses terkontrol. </br>
Polymorphism mengacu pada kemampuan metode untuk memiliki implementasi yang berbeda di kelas turunan, seperti getName() dalam contoh ini. </br>
Konstruktor menginisialisasi atribut saat objek dibuat. </br>
Getter dan setter memungkinkan akses dan perubahan data yang aman pada atribut private. </br>

## 4. Abstraction
konsep yang memungkinkan kita untuk menyembunyikan detail implementasi internal dan hanya menampilkan fungsionalitas yang relevan kepada pengguna.- Buat kelas abstrak Course dengan metode abstrak getCourseDetails().
- Buat kelas OnlineCourse dan OfflineCourse yang mengimplementasikan getCourseDetails() untuk memberikan detail yang berbeda.
```php
abstract class Course { //Buat kelas abstrak Course dengan metode abstrak getCourseDetails().
    abstract public function getCourseDetails();
}

class OnlineCourse extends Course { // Buat kelas OnlineCourse dan OfflineCourse yang mengimplementasikan getCourseDetails() untuk memberikan detail yang berbeda.
    private $courseName;

    public function __construct($courseName) {
        $this->courseName = $courseName;
    }

    public function getCourseDetails() {
        return "Online Course: ". $this->courseName;
    }
}

class OfflineCourse extends Course { // Buat kelas OnlineCourse dan OfflineCourse yang mengimplementasikan getCourseDetails() untuk memberikan detail yang berbeda.
    private $courseName;

    public function __construct($courseName) {
        $this->courseName = $courseName;
    }

    public function getCourseDetails() {
        return "Offline Course: " . $this->courseName;
    }
}
```
Kelas Abstrak Course mendefinisikan metode abstrak getCourseDetails(), yang berarti kelas ini tidak bisa diinstansiasi secara langsung dan hanya berfungsi sebagai cetak biru. Setiap kelas turunan yang mewarisinya harus mengimplementasikan metode ini. </br>
Kelas OnlineCourse dan OfflineCourse mewarisi kelas Course. Keduanya mengimplementasikan metode getCourseDetails() dengan cara yang berbeda. Atribut courseName disimpan secara privat, yang melindungi data dari akses langsung di luar kelas (Encapsulation). </br>
Pada kelas OnlineCourse, metode getCourseDetails() mengembalikan detail kursus dengan format "Online Course: <nama kursus>". Sementara pada OfflineCourse, metode yang sama mengembalikan format "Offline Course: <nama kursus>". </br>

- Struktur kode yang bersih dan mudah dipahami
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/Intruksi.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/output%20intruksi.png)

# Tugas
## 1. Implementasikan kelas Person sebagai induk dari Dosen dan Mahasiswa.
```php
class Person {
    // Atribut atau properties
    protected $nama;
    protected $role;

    // Constructor menginisialisasi atribut
    public function __construct($nama, $role) {
        $this->nama = $nama;
        $this->role = $role;
    }

    // Function untuk menampilkan nilai atribut
    public function showData() {
        return $this->nama;
    }
```
- Kelas Person mendefinisikan dua atribut, yaitu nama dan role, yang diinisialisasi melalui konstruktor. </br>
- Atribut nama digunakan untuk menyimpan nama orang, dan role digunakan untuk menyimpan peran atau jabatan mereka. </br>
- Metode showData() akan menampilkan nama dari objek Person yang dibuat. </br>

## 2. Gunakan konsep Inheritance untuk membuat hierarki kelas yang memungkinkan Dosen dan Mahasiswa memiliki atribut dan metode yang sesuai dengan perannya.
```php
class Mahasiswa extends Person {
    // Atribut atau properties
    private $nim;

    // Constructor
    public function __construct($nama, $nim, $role) {
        parent::__construct($nama, $role);
        $this->nim = $nim;
    }

    // Metode
    public function showData() {
        return "Nama: $this->nama <br> NIM: $this->nim";
    }

    // Polymorphism (override method getRole())
    public function getRole() {
        return "Role: $this->role";
    }
}

class Dosen extends Person {
    // Atribut atau properties
    private $nidn;

    // Constructor
    public function __construct($nama, $nidn, $role) {
        parent::__construct($nama, $role);
        $this->nidn = $nidn;
    }

    // Metode
    public function showData() {
        return "Nama: $this->nama <br> NIDN: $this->nidn";
    }

    // Polymorphism (override method getRole())
    public function getRole() {
        return "Role: $this->role";
    }
}
```
### 1. Kelas Mahasiswa:
- Inheritance: Mewarisi dari Person.
- Atribut: private $nim untuk menyimpan NIM mahasiswa.
- Constructor: Inisialisasi nama, nim, dan role dengan memanggil konstruktor parent.
- Metode showData(): Menampilkan nama dan nim.
- Polymorphism: Override metode getRole() untuk menampilkan role mahasiswa.
### 2. Kelas Dosen:
- Inheritance: Mewarisi dari Person.
- Atribut: private $nidn untuk menyimpan NIDN dosen.
- Constructor: Inisialisasi nama, nidn, dan role dengan memanggil konstruktor parent.
- Metode showData(): Menampilkan nama dan nidn.
- Polymorphism: Override metode getRole() untuk menampilkan role dosen.
### Konsep OOP:
- Inheritance: Kelas Mahasiswa dan Dosen mewarisi Person.
- Encapsulation: Atribut private diakses melalui metode.
- Polymorphism: Override metode getRole() untuk penyesuaian spesifik.

## 3. Terapkan Polymorphism dengan membuat metode getRole() di kelas Person dan override metode ini di kelas Dosen dan Mahasiswa untuk menampilkan peran yang berbeda.
```php
public function getRole() {
        return $this->role;
    }
}
```
- Visibilitas: public berarti metode ini dapat diakses dari luar kelas.
- Fungsi: Metode ini mengembalikan nilai dari properti $role objek.
- $this->role: Mengacu pada atribut $role milik objek saat ini.

## 4. Gunakan Encapsulation untuk melindungi atribut nidn di kelas Dosen dan nim di kelas Mahasiswa.
```php
class Mahasiswa extends Person {
    // Atribut atau properties
    private $nim;

    // Constructor
    public function __construct($nama, $nim, $role) {
        parent::__construct($nama, $role);
        $this->nim = $nim;
    }

    // Metode
    public function showData() {
        return "Nama: $this->nama <br> NIM: $this->nim";
    }

    // Polymorphism (override method getRole())
    public function getRole() {
        return "Role: $this->role";
    }
}

class Dosen extends Person {
    // Atribut atau properties
    private $nidn;

    // Constructor
    public function __construct($nama, $nidn, $role) {
        parent::__construct($nama, $role);
        $this->nidn = $nidn;
    }

    // Metode
    public function showData() {
        return "Nama: $this->nama <br> NIDN: $this->nidn";
    }

    // Polymorphism (override method getRole())
    public function getRole() {
        return "Role: $this->role";
    }
}
```
### 1. Kelas Mahasiswa:
- Inheritance: Mewarisi dari kelas Person.
- Atribut: private $nim: Atribut untuk menyimpan Nomor Induk Mahasiswa (NIM).
- Constructor:__construct($nama, $nim, $role): Menginisialisasi objek Mahasiswa dengan nama, nim, dan role. parent::__construct($nama, $role) memanggil konstruktor dari kelas Person untuk menginisialisasi nama dan role.
- Metode: showData(): Mengembalikan string yang menampilkan nama dan nim mahasiswa. getRole(): Override metode getRole() dari kelas Person untuk menampilkan role dengan format "Role: {role}".
### 2. Kelas Dosen:
- Inheritance: Mewarisi dari kelas Person.
- Atribut: private $nidn: Atribut untuk menyimpan Nomor Induk Dosen Nasional (NIDN).
- Constructor:__construct($nama, $nidn, $role): Menginisialisasi objek Dosen dengan nama, nidn, dan role. parent::__construct($nama, $role) memanggil konstruktor dari kelas Person untuk menginisialisasi nama dan role.
- Metode: showData(): Mengembalikan string yang menampilkan nama dan nidn dosen. getRole(): Override metode getRole() dari kelas Person untuk menampilkan role dengan format "Role: {role}".
### 3. Konsep OOP yang Digunakan:
- Inheritance (Pewarisan): Mahasiswa dan Dosen mewarisi properti dan metode dari Person, memungkinkan mereka untuk menggunakan atau menyesuaikan fitur yang ada di Person.
- Encapsulation (Enkapsulasi): Atribut nim dan nidn bersifat private, sehingga hanya dapat diakses melalui metode dalam kelas tersebut.
- Polymorphism: Metode getRole() di-override dalam kedua kelas untuk menampilkan format role yang sesuai dengan objek Mahasiswa dan Dosen.

## 5. Buat kelas abstrak Jurnal dan implementasikan konsep Abstraction dengan membuat kelas turunan JurnalDosen dan JurnalMahasiswa yang masing-masing memiliki cara tersendiri untuk mengelola pengajuan jurnal.
```php
abstract class Jurnal {
    // Atribut atau properties
    protected $judul;
    protected $penulis;
    protected $status;

    // Constructor
    public function __construct($judul, $penulis, $status) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->status = $status;
    }

    // Metode abstrak
    abstract public function pengajuanStatus();

    // Metode untuk mengambil nilai atribut
    public function getJudul() {
        return $this->judul;
    }

    public function getPenulis() {
        return $this->penulis;
    }

    public function getStatus() {
        return $this->status;
    }
}

class JurnalDosen extends Jurnal {
    // Metode
    public function pengajuanStatus() {
        return "Judul: {$this->getJudul()} <br> Nama Dosen: {$this->getPenulis()} <br> Status Pengajuan: {$this->getStatus()}";
    }
}

class JurnalMahasiswa extends Jurnal {
    // Metode
    public function pengajuanStatus() {
        return "Judul: {$this->getJudul()} <br> Nama Mahasiswa: {$this->getPenulis()} <br> Status Pengajuan: {$this->getStatus()}";
    }
}
```
### 1. Kelas Abstrak Jurnal
- Abstract Class: Kelas Jurnal adalah kelas abstrak yang tidak bisa diinstansiasi secara langsung. Ini berfungsi sebagai blueprint untuk kelas-kelas turunan.
- Atribut: protected $judul: Menyimpan judul jurnal. protected $penulis: Menyimpan nama penulis. protected $status: Menyimpan status pengajuan.
- Constructor:__construct($judul, $penulis, $status): Menginisialisasi atribut judul, penulis, dan status.
- Metode Abstrak: abstract public function pengajuanStatus();: Metode abstrak yang harus diimplementasikan oleh kelas turunan. Metode ini tidak memiliki implementasi di kelas Jurnal.
- Metode Getter: getJudul(): Mengembalikan nilai dari atribut judul. getPenulis(): Mengembalikan nilai dari atribut penulis. getStatus(): Mengembalikan nilai dari atribut status.
### 2. Kelas JurnalDosen
- Inheritance: Mewarisi dari kelas Jurnal.
- Metode: pengajuanStatus(): Implementasi dari metode abstrak pengajuanStatus() yang mengembalikan string dengan format "Judul: {judul} <br> Nama Dosen: {penulis} <br> Status Pengajuan: {status}".
### 3. Kelas JurnalMahasiswa
- Inheritance: Mewarisi dari kelas Jurnal.
- Metode: pengajuanStatus(): Implementasi dari metode abstrak pengajuanStatus() yang mengembalikan string dengan format "Judul: {judul} <br> Nama Mahasiswa: {penulis} <br> Status Pengajuan: {status}".
### 4. Konsep OOP yang Digunakan:
- Abstraction (Abstraksi): Kelas Jurnal sebagai kelas abstrak menyediakan template dasar yang harus diikuti oleh kelas-kelas turunan tanpa menyediakan implementasi lengkap untuk semua metode.
- Inheritance (Pewarisan): JurnalDosen dan JurnalMahasiswa mewarisi dari Jurnal dan harus mengimplementasikan metode abstrak pengajuanStatus().
- Encapsulation (Enkapsulasi): Atribut dalam Jurnal bersifat protected, sehingga hanya bisa diakses dalam kelas itu sendiri dan kelas turunannya.
## Struktur kode yang bersih dan mudah dipahami
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/Tugas.png)
## Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/output%20tugas.png)
