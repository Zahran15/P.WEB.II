# Jobsheet
## Jobsheet 3 : Menerapkan Konsep Inheritance, Polymorphism, Encapsulation, dan Abstraction dalam PHP
### Tujuan
Mahasiswa diharapkan mampu menerapkan prinsip OOP dalam pemrograman PHP melalui tugas yang mengintegrasikan konsep Inheritance, Polymorphism, Encapsulation, dan Abstraction.

## Intruksi
## 1. Inheritance
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
- Buat kelas Teacher yang juga mewarisi dari Person dan tambahkan atribut teacherID.
```php
// Kelas Student yang mewarisi dari kelas Person
class Student extends Person {
    private $studentID;

    public function __construct($name, $studentID) {
        parent::__construct($name);
        $this->studentID = $studentID;
    }

    public function getStudentID() {
        return $this->studentID;
    }
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
## 1. Implementasikan kelas Person sebagai induk dari Dosen dan Mahasiswa.
## 2. Gunakan konsep Inheritance untuk membuat hierarki kelas yang memungkinkan Dosen dan Mahasiswa memiliki atribut dan metode yang sesuai dengan perannya.
## 3. Terapkan Polymorphism dengan membuat metode getRole() di kelas Person dan override metode ini di kelas Dosen dan Mahasiswa untuk menampilkan peran yang berbeda.
## 4. Gunakan Encapsulation untuk melindungi atribut nidn di kelas Dosen dan nim dikelas Mahasiswa.
## 5. Buat kelas abstrak Jurnal dan implementasikan konsep Abstraction dengan membuat kelas turunan JurnalDosen dan JurnalMahasiswa yang masing-masing memiliki cara tersendiri untuk mengelola pengajuan jurnal.
