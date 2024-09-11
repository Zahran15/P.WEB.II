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

- Struktur kode yang bersih dan mudah dipahami
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/Intruksi.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/output%20intruksi.png)

# Tugas
- 1. Implementasikan kelas Person sebagai induk dari Dosen dan Mahasiswa.
- 2. Gunakan konsep Inheritance untuk membuat hierarki kelas yang memungkinkan Dosen dan Mahasiswa memiliki atribut dan metode yang sesuai dengan perannya.
- 3. Terapkan Polymorphism dengan membuat metode getRole() di kelas Person dan override metode ini di kelas Dosen dan Mahasiswa untuk menampilkan peran yang berbeda.
- 4. Gunakan Encapsulation untuk melindungi atribut nidn di kelas Dosen dan nim di kelas Mahasiswa.
- 5. Buat kelas abstrak Jurnal dan implementasikan konsep Abstraction dengan membuat kelas turunan JurnalDosen dan JurnalMahasiswa yang masing-masing memiliki cara tersendiri untuk mengelola pengajuan jurnal.

- Struktur kode yang bersih dan mudah dipahami
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/Tugas.png)
- Output

![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Jobsheet%203/output%20tugas.png)
