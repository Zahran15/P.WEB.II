<?php
// 1. Inheritance
// Buat kelas Person dengan atribut name dan metode getName().
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
    // 3. Encapsulation
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

// 2. Polymorphism
// Buat kelas Teacher yang juga mewarisi dari Person dan tambahkan atribut teacherID.
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

// 4. Abstraction
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

// Instansiasi objek
// inheritance dan encapsulation
$student = new Student("Zahran", "150805");
echo "<b>Instansiasi Objek dari kelas Student</b><br>";
echo $student->getName(); // Output: Name: Probo
echo "<br>";
echo $student->getStudentID(); // Output ID: 12345
echo "<br>";
$student->setName("Jack"); // Mengubah atribut name
echo $student->getName(); // Output: Bob
echo "<br><hr>";

// Polymorphism
$teacher = new Teacher("Pak Abda'u", "T6574");
echo "<b>Instansiasi Objek dari kelas Teacher</b><br>";
echo $teacher->getName();  // Output: Teacher Name: Mr. John
echo "<br>";
echo $teacher->getTeacherID();  // Output: T9876
echo "<br><hr>";

// Abstraction
$onlineCourse = new OnlineCourse("PHP PROGRAMMING");
echo "<b>Instansiasi Objek dari abstrak kelas Course</b><br>";
echo $onlineCourse->getCourseDetails();  // Output: Online Course: PHP Programming
echo "<br>";
$offlineCourse = new OfflineCourse("P.WEB II");
echo $offlineCourse->getCourseDetails();  // Output: Offline Course: Data Science at Room 101
echo "<br>";
?>