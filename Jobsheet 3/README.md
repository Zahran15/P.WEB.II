# Jobsheet
## Jobsheet 3 : Menerapkan Konsep Inheritance, Polymorphism, Encapsulation, dan Abstraction dalam PHP
### Tujuan
Mahasiswa diharapkan mampu menerapkan prinsip OOP dalam pemrograman PHP melalui tugas yang mengintegrasikan konsep Inheritance, Polymorphism, Encapsulation, dan Abstraction.

## Intruksi
## 1. Inheritance
Konsep di mana sebuah class (kelas) dapat mewarisi properti (atribut) dan metode (fungsi) dari class lain. Class yang mewarisi disebut subclass atau child class, sementara class yang diwarisi disebut superclass atau parent class.
- Buat kelas Person dengan atribut name dan metode getName().
```php
// Kelas Person
class Person {
    protected $name; // Atribut name bersifat protected agar bisa diakses oleh kelas turunan

    // Constructor untuk menginisialisasi atribut name
    public function __construct($name) {
        $this->name = $name;
    }

    // Metode untuk mendapatkan nilai name
    public function getName() {
        return $this->name;
    }
}
```

- Buat kelas Student yang mewarisi dari Person dan tambahkan atribut studentID serta metode getStudentID().
```php
// Kelas Student yang mewarisi dari kelas Person
class Student extends Person {
    private $studentID; // Atribut khusus untuk Student

    // Constructor untuk menginisialisasi name dan studentID
    public function __construct($name, $studentID) {
        // Memanggil constructor kelas induk (Person)
        parent::__construct($name);
        $this->studentID = $studentID;
    }

    // Metode untuk mendapatkan nilai studentID
    public function getStudentID() {
        return $this->studentID;
    }
}
```

- Kode yang bersih dan Struktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/1.%20Inheritance.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/Output%201.png)

## 2. Polymorphism
Konsep di mana objek dari berbagai class dapat diperlakukan sebagai objek dari class yang sama, biasanya melalui parent class atau interface. Polymorphism memungkinkan metode yang sama untuk memiliki perilaku yang berbeda tergantung pada objek yang memanggilnya.
- Buat kelas Teacher yang juga mewarisi dari Person dan tambahkan atribut teacherID.
```php
// Kelas Teacher yang mewarisi dari kelas Person
class Teacher extends Person {
    private $teacherID;

    public function __construct($name, $teacherID) {
        parent::__construct($name);
        $this->teacherID = $teacherID;
    }

    public function getTeacherID() {
        return $this->teacherID;
    }
```
- Override metode getName() di kelas Student dan Teacher untuk menampilkan format berbeda.
```php
// Override metode getName()
    public function getName() {
        return "Student: " . $this->name;
    }
}
// Override metode getName()
    public function getName() {
        return "Teacher: " . $this->name;
    }
}
```
- Kode yang bersih dan terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/2.%20Polymorphism.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/Output%202.png)

## 3. Encapsulation 
Konsep yang menyembunyikan detail implementasi internal dari sebuah objek dan hanya memperlihatkan fungsionalitas yang diperlukan. Hal ini dilakukan dengan mengatur akses ke atribut dan metode menggunakan access modifiers seperti private, protected, dan public.
- Ubah atribut name dan studentID dalam kelas Student menjadi private.
```php
// Kelas Student yang mewarisi dari kelas Person
class Student extends Person {
    private $studentID;

    // Constructor untuk menginisialisasi name dan studentID
    public function __construct($name, $studentID) {
        parent::__construct($name); // Memanggil constructor dari Person
        $this->studentID = $studentID;
    }
```
- Tambahkan metode setter dan getter untuk mengakses dan mengubah nilai atribut name dan studentID.
```php
// Metode getter untuk name di kelas Person
    public function getName() {
        return $this->name;
    }
}
// Setter untuk name
    public function setName($name) {
        $this->name = $name;
    }

    // Getter untuk name (overriding dari Person)
    public function getName() {
        return $this->name;
    }

    // Setter untuk studentID
    public function setStudentID($studentID) {
        $this->studentID = $studentID;
    }

    // Getter untuk studentID
    public function getStudentID() {
        return $this->studentID;
    }
}
```
- Kode yang bersih dan terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/3.%20Encapsulation.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/Output%204.png)

## 4. Abstraction
Konsep yang menyederhanakan kompleksitas sistem dengan menyembunyikan detail implementasi yang tidak diperlukan dan hanya menampilkan fitur-fitur esensial dari sebuah objek. Abstraksi memungkinkan pengembang untuk fokus pada apa yang dilakukan oleh objek, bukan bagaimana cara kerjanya.
- Buat kelas abstrak Course dengan metode abstrak getCourseDetails().
```php
// Kelas abstrak Course
abstract class Course {
    protected $courseName;

    // Constructor untuk inisialisasi courseName
    public function __construct($courseName) {
        $this->courseName = $courseName;
    }

    // Metode abstrak untuk mendapatkan detail kursus
    abstract public function getCourseDetails();
}
```

- Buat kelas OnlineCourse dan OfflineCourse yang mengimplementasikan getCourseDetails() untuk memberikan detail yang berbeda.
```php
// Kelas OnlineCourse yang mengimplementasikan metode abstrak getCourseDetails()
class OnlineCourse extends Course {
    private $platform;

    public function __construct($courseName, $platform) {
        parent::__construct($courseName);
        $this->platform = $platform;
    }

    // Implementasi getCourseDetails untuk kursus online
    public function getCourseDetails() {
        return "Online Course: " . $this->courseName . " on platform: " . $this->platform;
    }
}

// Kelas OfflineCourse yang mengimplementasikan metode abstrak getCourseDetails()
class OfflineCourse extends Course {
    private $location;

    public function __construct($courseName, $location) {
        parent::__construct($courseName);
        $this->location = $location;
    }

    // Implementasi getCourseDetails untuk kursus offline
    public function getCourseDetails() {
        return "Offline Course: " . $this->courseName . " at location: " . $this->location;
    }
}
```

- Kode yang bersih dan terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/4.%20Abstraction.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/Output%204.png)

# Tugas
## 1. Implementasikan kelas Person sebagai induk dari Dosen dan Mahasiswa
```php
<?php
// Kelas Person sebagai kelas induk
class Person {
    protected $name; // Atribut name yang bersifat protected

    // Constructor untuk menginisialisasi name
    public function __construct($name) {
        $this->name = $name;
    }

    // Getter untuk name
    public function getName() {
        return $this->name;
    }

    // Setter untuk name
    public function setName($name) {
        $this->name = $name;
    }
}
?>

<?php
// Kelas Dosen yang mewarisi dari kelas Person
class Dosen extends Person {
    private $nip; // Atribut tambahan untuk Dosen

    // Constructor untuk menginisialisasi name dan nip
    public function __construct($name, $nip) {
        parent::__construct($name); // Memanggil constructor dari Person
        $this->nip = $nip;
    }

    // Getter untuk nip
    public function getNip() {
        return $this->nip;
    }

    // Setter untuk nip
    public function setNip($nip) {
        $this->nip = $nip;
    }

    // Menampilkan informasi dosen
    public function displayInfo() {
        return "Dosen: " . $this->name . " (NIP: " . $this->nip . ")";
    }
}
?>

<?php
// Kelas Mahasiswa yang mewarisi dari kelas Person
class Mahasiswa extends Person {
    private $studentID; // Atribut tambahan untuk Mahasiswa

    // Constructor untuk menginisialisasi name dan studentID
    public function __construct($name, $studentID) {
        parent::__construct($name); // Memanggil constructor dari Person
        $this->studentID = $studentID;
    }

    // Getter untuk studentID
    public function getStudentID() {
        return $this->studentID;
    }

    // Setter untuk studentID
    public function setStudentID($studentID) {
        $this->studentID = $studentID;
    }

    // Menampilkan informasi mahasiswa
    public function displayInfo() {
        return "Mahasiswa: " . $this->name . " (Student ID: " . $this->studentID . ")";
    }
}
?>
```

## 2. Gunakan konsep Inheritance untuk membuat hierarki kelas yang memungkinkan Dosen dan Mahasiswa memiliki atribut dan metode yang sesuai dengan perannya.
```php
<?php
// Kelas Dosen yang mewarisi dari kelas Person
class Dosen extends Person {
    private $nip; // Atribut tambahan untuk Dosen

    // Constructor untuk menginisialisasi name dan nip
    public function __construct($name, $nip) {
        parent::__construct($name); // Memanggil constructor dari Person
        $this->nip = $nip;
    }

    // Getter untuk nip
    public function getNip() {
        return $this->nip;
    }

    // Setter untuk nip
    public function setNip($nip) {
        $this->nip = $nip;
    }

    // Menampilkan informasi dosen
    public function displayInfo() {
        return "Dosen: " . $this->name . " (NIP: " . $this->nip . ")";
    }
}
?>

<?php
// Kelas Mahasiswa yang mewarisi dari kelas Person
class Mahasiswa extends Person {
    private $studentID; // Atribut tambahan untuk Mahasiswa

    // Constructor untuk menginisialisasi name dan studentID
    public function __construct($name, $studentID) {
        parent::__construct($name); // Memanggil constructor dari Person
        $this->studentID = $studentID;
    }

    // Getter untuk studentID
    public function getStudentID() {
        return $this->studentID;
    }

    // Setter untuk studentID
    public function setStudentID($studentID) {
        $this->studentID = $studentID;
    }

    // Menampilkan informasi mahasiswa
    public function displayInfo() {
        return "Mahasiswa: " . $this->name . " (Student ID: " . $this->studentID . ")";
    }
}
?>
```

## 3. Terapkan Polymorphism dengan membuat metode getRole() di kelas Person dan override metode ini di kelas Dosen dan Mahasiswa untuk menampilkan peran yang berbeda.
```php
<?php
// Kelas Person sebagai kelas induk
class Person {
    protected $name;

    // Constructor untuk menginisialisasi name
    public function __construct($name) {
        $this->name = $name;
    }

    // Getter untuk name
    public function getName() {
        return $this->name;
    }

    // Setter untuk name
    public function setName($name) {
        $this->name = $name;
    }

    // Metode getRole yang akan di-override oleh kelas turunan
    public function getRole() {
        return "Person";
    }
}
?>

<?php
// Kelas Dosen yang mewarisi dari kelas Person
class Dosen extends Person {
    private $nip;

    // Constructor untuk menginisialisasi name dan nip
    public function __construct($name, $nip) {
        parent::__construct($name);
        $this->nip = $nip;
    }

    // Getter untuk nip
    public function getNip() {
        return $this->nip;
    }

    // Setter untuk nip
    public function setNip($nip) {
        $this->nip = $nip;
    }

    // Override metode getRole()
    public function getRole() {
        return "Dosen";
    }

    // Menampilkan informasi dosen
    public function displayInfo() {
        return "Dosen: " . $this->name . " (NIP: " . $this->nip . ")";
    }
}
?>

<?php
// Kelas Mahasiswa yang mewarisi dari kelas Person
class Mahasiswa extends Person {
    private $studentID;

    // Constructor untuk menginisialisasi name dan studentID
    public function __construct($name, $studentID) {
        parent::__construct($name);
        $this->studentID = $studentID;
    }

    // Getter untuk studentID
    public function getStudentID() {
        return $this->studentID;
    }

    // Setter untuk studentID
    public function setStudentID($studentID) {
        $this->studentID = $studentID;
    }

    // Override metode getRole()
    public function getRole() {
        return "Mahasiswa";
    }

    // Menampilkan informasi mahasiswa
    public function displayInfo() {
        return "Mahasiswa: " . $this->name . " (Student ID: " . $this->studentID . ")";
    }
}
?>
```

## 4. Gunakan Encapsulation untuk melindungi atribut nidn di kelas Dosen dan nim dikelas Mahasiswa.
```php
<?php
// Kelas Dosen yang mewarisi dari kelas Person
class Dosen extends Person {
    private $nidn; // Ubah menjadi private

    // Constructor untuk menginisialisasi name dan nidn
    public function __construct($name, $nidn) {
        parent::__construct($name);
        $this->nidn = $nidn;
    }

    // Getter untuk nidn
    public function getNidn() {
        return $this->nidn;
    }

    // Setter untuk nidn
    public function setNidn($nidn) {
        $this->nidn = $nidn;
    }

    // Override metode getRole()
    public function getRole() {
        return "Dosen";
    }

    // Menampilkan informasi dosen
    public function displayInfo() {
        return "Dosen: " . $this->name . " (NIDN: " . $this->nidn . ")";
    }
}
?>

<?php
// Kelas Mahasiswa yang mewarisi dari kelas Person
class Mahasiswa extends Person {
    private $nim; // Ubah menjadi private

    // Constructor untuk menginisialisasi name dan nim
    public function __construct($name, $nim) {
        parent::__construct($name);
        $this->nim = $nim;
    }

    // Getter untuk nim
    public function getNim() {
        return $this->nim;
    }

    // Setter untuk nim
    public function setNim($nim) {
        $this->nim = $nim;
    }

    // Override metode getRole()
    public function getRole() {
        return "Mahasiswa";
    }

    // Menampilkan informasi mahasiswa
    public function displayInfo() {
        return "Mahasiswa: " . $this->name . " (NIM: " . $this->nim . ")";
    }
}
?>
```

## 5. Buat kelas abstrak Jurnal dan implementasikan konsep Abstraction dengan membuat kelas turunan JurnalDosen dan JurnalMahasiswa yang masing-masing memiliki cara tersendiri untuk mengelola pengajuan jurnal.
```php
<?php
// Kelas abstrak Jurnal
abstract class Jurnal {
    protected $judul;
    protected $penulis;

    // Constructor untuk menginisialisasi judul dan penulis
    public function __construct($judul, $penulis) {
        $this->judul = $judul;
        $this->penulis = $penulis;
    }

    // Metode abstrak yang harus diimplementasikan oleh kelas turunan
    abstract public function pengajuanJurnal();
}
?>

<?php
// Kelas JurnalDosen yang mewarisi dari kelas Jurnal
class JurnalDosen extends Jurnal {
    private $nidn; // Atribut khusus untuk JurnalDosen

    // Constructor untuk menginisialisasi judul, penulis, dan nidn
    public function __construct($judul, $penulis, $nidn) {
        parent::__construct($judul, $penulis);
        $this->nidn = $nidn;
    }

    // Implementasi metode pengajuanJurnal() untuk JurnalDosen
    public function pengajuanJurnal() {
        return "Pengajuan jurnal dosen: " . $this->judul . " oleh " . $this->penulis . " (NIDN: " . $this->nidn . ")";
    }

    // Getter untuk nidn
    public function getNidn() {
        return $this->nidn;
    }

    // Setter untuk nidn
    public function setNidn($nidn) {
        $this->nidn = $nidn;
    }
}
?>

<?php
// Kelas JurnalMahasiswa yang mewarisi dari kelas Jurnal
class JurnalMahasiswa extends Jurnal {
    private $nim; // Atribut khusus untuk JurnalMahasiswa

    // Constructor untuk menginisialisasi judul, penulis, dan nim
    public function __construct($judul, $penulis, $nim) {
        parent::__construct($judul, $penulis);
        $this->nim = $nim;
    }

    // Implementasi metode pengajuanJurnal() untuk JurnalMahasiswa
    public function pengajuanJurnal() {
        return "Pengajuan jurnal mahasiswa: " . $this->judul . " oleh " . $this->penulis . " (NIM: " . $this->nim . ")";
    }

    // Getter untuk nim
    public function getNim() {
        return $this->nim;
    }

    // Setter untuk nim
    public function setNim($nim) {
        $this->nim = $nim;
    }
}
?>
```

- Kode yang bersih dan terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/5.%20Tugas.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/Output%205.png)
