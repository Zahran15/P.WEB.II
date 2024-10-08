# Tugas 2
## Case study : courses & course_classes

### 1. Buat Database
#### 1. Koneksi ke MySQL
```php
$servername = "localhost";
$username = "root"; // Gantilah jika menggunakan username lain
$password = ""; // Gantilah jika menggunakan password
$dbname = "db_jkb";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password);
```
- Kode ini membuat koneksi ke server MySQL menggunakan data yang diberikan seperti servername, username, dan password.
- Di sini, localhost berarti server MySQL berjalan di mesin lokal. 
- root adalah nama pengguna default untuk MySQL tanpa kata sandi (password kosong).

#### 2. Memeriksa koneksi
```php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
```
- Blok ini memeriksa apakah ada kesalahan saat membuat koneksi. Jika ada kesalahan (misalnya MySQL tidak bisa dihubungi), proses akan dihentikan dan menampilkan pesan kesalahan.

#### 3. Membuat database jika belum ada
```php
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database $dbname berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}
```
- Kode ini membuat database baru bernama db_jkb jika belum ada (IF NOT EXISTS).
- Jika perintah berhasil, ditampilkan pesan bahwa database berhasil dibuat atau sudah ada.
- Jika gagal, ditampilkan pesan error.

#### 4. Memilih database yang akan digunakan
```php
$conn->select_db($dbname);
```
- Setelah database dibuat atau diverifikasi ada, koneksi memilih database tersebut untuk digunakan pada operasi selanjutnya.

#### 5. Membuat tabel courses
```php
$sql = "CREATE TABLE IF NOT EXISTS courses (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(10) NOT NULL,
    name VARCHAR(100) NOT NULL,
    SKS INT NOT NULL,
    hours INT NOT NULL,
    meeting INT NOT NULL,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB";
```
- Kode ini membuat tabel courses jika belum ada.
- Kolom-kolomnya meliputi:
- Id: Kunci utama (PRIMARY KEY) dengan AUTO_INCREMENT (akan bertambah otomatis setiap kali data ditambahkan).
- code: Kode mata kuliah, disimpan sebagai string dengan panjang maksimum 10 karakter.
- name: Nama mata kuliah, disimpan sebagai string dengan panjang maksimum 100 karakter.
- SKS: Jumlah SKS mata kuliah, disimpan sebagai tipe integer.
- hours: Jumlah jam kuliah per minggu, tipe integer.
- meeting: Jumlah pertemuan kuliah, tipe integer.
- deleted_at: Waktu penghapusan (soft delete), disimpan sebagai TIMESTAMP yang bisa bernilai NULL.
- created_at dan updated_at: Tanggal pembuatan dan pembaruan data yang secara otomatis diatur menggunakan fungsi CURRENT_TIMESTAMP.

#### 6. Menangani hasil pembuatan tabel courses
```php
if ($conn->query($sql) === TRUE) {
    echo "Tabel courses berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error creating table courses: " . $conn->error . "<br>";
}
```
- Mengecek apakah perintah pembuatan tabel courses berhasil dijalankan atau tidak. Jika berhasil, menampilkan pesan, dan jika gagal, menampilkan pesan kesalahan.

#### 7. Membuat tabel course_classes
```php
$sql = "CREATE TABLE IF NOT EXISTS course_classes (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    student_class_id INT NOT NULL,
    course_id INT NOT NULL,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(Id) ON DELETE CASCADE
) ENGINE=InnoDB";
```
- Kode ini membuat tabel course_classes jika belum ada.
- Kolom-kolomnya meliputi:
- Id: Kunci utama (PRIMARY KEY) dengan AUTO_INCREMENT.
- student_class_id: ID kelas mahasiswa, tipe integer.
- course_id: ID mata kuliah, tipe integer. Ini adalah FOREIGN KEY yang merujuk ke kolom Id di tabel courses. Jika data terkait dihapus dari tabel courses, data ini juga akan dihapus secara otomatis karena opsi ON DELETE CASCADE.
- deleted_at: Waktu penghapusan data (soft delete).
- created_at: Waktu pembuatan data, diatur secara otomatis.
- updated_at: Waktu pembaruan data, diatur secara otomatis jika ada pembaruan.

#### 8. Menangani hasil pembuatan tabel course_classes
```php
if ($conn->query($sql) === TRUE) {
    echo "Tabel course_classes berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error creating table course_classes: " . $conn->error . "<br>";
}
```
- Mengecek apakah perintah pembuatan tabel course_classes berhasil dijalankan atau tidak. Jika berhasil, menampilkan pesan, dan jika gagal, menampilkan pesan kesalahan.

#### 9. Menutup koneksi
```php
$conn->close();
```
- Setelah semua operasi selesai, koneksi ke database MySQL ditutup untuk menghemat sumber daya.

### Kode database yang bersih dan terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Tugas%202/1.%20Buat%20Database.png)

### 2. Buat Insert Data untuk Database
#### 1. Kelas DatabaseConnection
```php
class DatabaseConnection {
    protected $conn;

    public function __construct() {
        // Inisialisasi variabel server, username, password, dan nama database
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "db_jkb";

        // Membuat koneksi ke MySQL
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        // Memeriksa apakah koneksi berhasil
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
```
- Kelas DatabaseConnection berfungsi sebagai kelas dasar untuk mengelola koneksi database. Kelas ini digunakan untuk melakukan koneksi ke database secara otomatis ketika objek kelas ini atau turunan kelas dibuat.
- Atribut protected $conn menyimpan objek koneksi MySQL agar dapat diakses oleh kelas-kelas yang mewarisi DatabaseConnection.
- Konstruktor __construct() akan otomatis dipanggil saat objek dibuat, dan bertugas membuat koneksi ke database dengan mysqli. Jika koneksi gagal, pesan kesalahan akan ditampilkan.

#### 2. Kelas CourseManager
```php
class CourseManager extends DatabaseConnection {
    public function __construct() {
        parent::__construct();
    }

    public function addCourses() {
        $sql = "INSERT INTO courses (code, name, SKS, hours, meeting) VALUES
                ('CSE101', 'Pemrograman Web', 3, 40, 14),
                ('CSE102', 'Basis Data', 4, 45, 15),
                ('CSE103', 'Jaringan Komputer', 5, 50, 16)";

        if ($this->conn->query($sql) === TRUE) {
            echo "Data berhasil ditambahkan ke tabel courses.<br>";
        } else {
            echo "Error inserting data into courses: " . $this->conn->error . "<br>";
        }
    }
}
```
- Kelas CourseManager adalah turunan dari DatabaseConnection, yang artinya kelas ini mewarisi semua properti dan metode dari DatabaseConnection.
- Metode __construct() di kelas ini memanggil konstruktor dari DatabaseConnection menggunakan parent::__construct(), sehingga saat objek CourseManager dibuat, koneksi ke database langsung diinisialisasi.
- Metode addCourses() digunakan untuk menambahkan data ke tabel courses dengan menjalankan perintah SQL INSERT INTO. Jika perintah berhasil, pesan sukses ditampilkan. Jika gagal, ditampilkan pesan kesalahan yang menunjukkan detail error dari database.

#### 3. Kelas CourseClassManager
```php
class CourseClassManager extends DatabaseConnection {
    public function __construct() {
        parent::__construct();
    }

    public function addCourseClasses() {
        $sql = "INSERT INTO course_classes (student_class_id, course_id) VALUES
                (1, 1),
                (2, 2),
                (3, 3)";

        if ($this->conn->query($sql) === TRUE) {
            echo "Data berhasil ditambahkan ke tabel course_classes.<br>";
        } else {
            echo "Error inserting data into course_classes: " . $this->conn->error . "<br>";
        }
    }
}
```
- Kelas CourseClassManager juga merupakan turunan dari DatabaseConnection, yang berarti memiliki akses ke koneksi database.
- Metode addCourseClasses() digunakan untuk menambahkan data ke tabel course_classes. Perintah SQL INSERT INTO dijalankan untuk memasukkan beberapa baris data. Jika berhasil, pesan sukses ditampilkan, jika gagal, pesan kesalahan akan muncul.

#### 4. Menambahkan Data
```php
$courseManager = new CourseManager();
$courseManager->addCourses();

$courseClassManager = new CourseClassManager();
$courseClassManager->addCourseClasses();
```
- $courseManager = new CourseManager(); membuat objek baru dari kelas CourseManager, yang secara otomatis memanggil konstruktor dan melakukan koneksi ke database.
- $courseManager->addCourses(); memanggil metode addCourses() untuk menambahkan data ke tabel courses.
- $courseClassManager = new CourseClassManager(); membuat objek baru dari kelas CourseClassManager, dan koneksi database kembali diinisialisasi.
- $courseClassManager->addCourseClasses(); memanggil metode addCourseClasses() untuk menambahkan data ke tabel course_classes.
### Kode Insert data yang bersih dan terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Tugas%202/2.%20Insert%20data.png)

### 3. Membuat View berbasis OOP, dengan mengambil data dari database MySQL
```php
class DatabaseConnection {
    protected $conn;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db_jkb";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function fetchCourses() {
        $sql = "SELECT * FROM courses";
        return $this->conn->query($sql);
    }

    public function fetchCourseClasses() {
        $sql = "SELECT cc.*, c.code, c.name, c.SKS, c.hours, c.meeting 
                FROM course_classes cc 
                JOIN courses c ON cc.course_id = c.Id";
        return $this->conn->query($sql);
    }

    public function fetchSingleCourse() {
        $sql = "SELECT * FROM courses LIMIT 1";
        return $this->conn->query($sql);
    }
     
}
```
- __construct(): Ini adalah konstruktor dari kelas DatabaseConnection. Kelas ini menginisialisasi koneksi ke database menggunakan kredensial lokal (localhost, root, tanpa password, dan database db_jkb). Jika koneksi gagal, akan memunculkan pesan error.
- fetchCourses(): Fungsi ini menjalankan query untuk mendapatkan semua data dari tabel courses.
- fetchCourseClasses(): Fungsi ini menjalankan query untuk mendapatkan data dari tabel course_classes yang di-join dengan tabel courses, menampilkan informasi seperti code, name, SKS, hours, meeting, dan student_class_id.
- fetchSingleCourse(): Fungsi ini hanya mengambil satu data dari tabel courses menggunakan LIMIT 1.

### 4. Menggunakan _construct sebagai link ke database
```php
public function __construct() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_jkb";

    $this->conn = new mysqli($servername, $username, $password, $dbname);

    if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
    }
}
```
- Di dalam kelas DatabaseConnection, konstruktor __construct() digunakan untuk membuat koneksi ke database MySQL. Properti $conn digunakan untuk menyimpan objek koneksi yang akan digunakan untuk menjalankan query.
- Penjelasan: Fungsi ini memastikan bahwa setiap kali objek dari kelas yang menggunakan database dibuat, koneksi ke MySQL langsung dijalankan.

### 5. Menerapkan Enkapsulasi Sesuai Logika Studi Kasus
```php
protected $id;
protected $code;
protected $name;
protected $SKS;
protected $hours;
protected $meeting;

public function display() {
    return [
        'ID' => $this->id,
        'Kode' => $this->code,
        'Mata Kuliah' => $this->name,
        'SKS' => $this->SKS,
        'Jam' => $this->hours,
        'Pertemuan' => $this->meeting
    ];
}
```
- Enkapsulasi diterapkan melalui penggunaan protected dan private untuk properti di kelas Course dan CourseClass. Hal ini membatasi akses langsung ke atribut, sehingga hanya dapat diakses melalui metode yang sesuai.
- Penjelasan: Atribut kelas dikemas (encapsulated) dalam kelas, sehingga tidak bisa diakses langsung dari luar. Hal ini menjaga keamanan dan integritas data. Untuk mengakses data tersebut, metode display() digunakan.

### 6. Membuat Kelas Turunan Menggunakan Konsep Pewarisan
```php
class CourseClass extends Course {
    private $student_class_id;
    private $schedule;

    public function __construct($id, $code, $name, $SKS, $hours, $meeting, $student_class_id) {
        parent::__construct($id, $code, $name, $SKS, $hours, $meeting);
        $this->student_class_id = $student_class_id;
    }
}
```
- Kelas CourseClass merupakan contoh penerapan pewarisan (inheritance), di mana kelas CourseClass adalah turunan dari kelas Course. Kelas CourseClass mewarisi properti dan metode dari kelas Course, tetapi juga menambahkan atribut baru, seperti student_class_id.
- Penjelasan: Kelas CourseClass mewarisi semua properti dan metode dari Course dan menambahkan fungsionalitas tambahan dengan atribut baru seperti student_class_id.

### 7. Menerapkan Polimorfisme untuk Minimal 2 Role Sesuai Studi Kasus
```php
// Override display di CourseClass
public function display() {
    $courseDetails = parent::display();
    $courseDetails['Kelas'] = $this->student_class_id;
    return $courseDetails;
}

// Override display di Poly
public function display() {
    return [
        'ID' => $this->id,
        'Kode' => $this->code,
        'Mata Kuliah' => $this->name,
        'SKS' => $this->SKS
    ];
}
class Poly extends Course {
    public function __construct($id, $code, $name, $SKS) {
        // Panggil constructor parent
        parent::__construct($id, $code, $name, $SKS, null, null); // SKS diambil, tapi hours dan meeting null
    }

    // Override metode display untuk hanya menampilkan kolom yang diminta
    public function display() {
        return [
            'ID' => $this->id,
            'Kode' => $this->code,
            'Mata Kuliah' => $this->name,
            'SKS' => $this->SKS
        ];
    }
}
```
- Polimorfisme diterapkan melalui metode display() yang di-override di kelas CourseClass dan Poly. Kelas Poly hanya menampilkan sebagian data (ID, Kode, Mata Kuliah, dan SKS), sedangkan CourseClass menampilkan lebih banyak detail yang berkaitan dengan kelas.
- Kelas ini merupakan contoh dari polymorphism. Kelas Poly mewarisi Course, tetapi hanya menggunakan beberapa atribut saja.
- __construct($id, $code, $name, $SKS): Konstruktor ini memanggil konstruktor dari Course tetapi hanya mengisi nilai SKS, sementara hours dan meeting di-set ke null.
- display() (Overriding): Metode ini meng-override metode display() dari kelas Course untuk hanya menampilkan kolom yang dibutuhkan, yaitu ID, Kode, Mata Kuliah, dan SKS.

### 8. Fungsi displayTable()
```php
function displayTable($type) {
    global $db;
    if ($type == 'courses') {
        // Menampilkan tabel courses seperti sebelumnya
        $coursesResult = $db->fetchCourses();
        echo "<h2>Mata Kuliah:</h2>";
        echo "<table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Jam</th>
                        <th>Pertemuan</th>
                    </tr>
                </thead>
                <tbody>";
        while ($course = $coursesResult->fetch_assoc()) {
            $courseObj = new Course($course['Id'], $course['code'], $course['name'], $course['SKS'], $course['hours'], $course['meeting']);
            $details = $courseObj->display();
            echo "<tr>
                    <td>{$details['ID']}</td>
                    <td>{$details['Kode']}</td>
                    <td>{$details['Mata Kuliah']}</td>
                    <td>{$details['SKS']}</td>
                    <td>{$details['Jam']}</td>
                    <td>{$details['Pertemuan']}</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } elseif ($type == 'course_classes') {
        // Menampilkan tabel course_classes seperti sebelumnya
        $classesResult = $db->fetchCourseClasses();
        echo "<h2>Kelas Mata Kuliah:</h2>";
        echo "<table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Jam</th>
                        <th>Pertemuan</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tbody>";
        while ($class = $classesResult->fetch_assoc()) {
            $classObj = new CourseClass(
                $class['course_id'], 
                $class['code'], 
                $class['name'], 
                $class['SKS'], 
                $class['hours'], 
                $class['meeting'], 
                $class['student_class_id']
            );
            $details = $classObj->display();
            echo "<tr>
                    <td>{$details['ID']}</td>
                    <td>{$details['Kode']}</td>
                    <td>{$details['Mata Kuliah']}</td>
                    <td>{$details['SKS']}</td>
                    <td>{$details['Jam']}</td>
                    <td>{$details['Pertemuan']}</td>
                    <td>{$details['Kelas']}</td>
                  </tr>";
        }                
        echo "</tbody></table>";
    } elseif ($type == 'poly') {
        // Menampilkan tabel poly dengan class Poly
        $coursesResult = $db->fetchSingleCourse(); // Ambil satu data dari courses
        echo "<h2>Tabel Poly:</h2>";
        echo "<table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                    </tr>
                </thead>
                <tbody>";
        
        // Ambil hanya satu data
        if ($course = $coursesResult->fetch_assoc()) {
            $polyObj = new Poly($course['Id'], $course['code'], $course['name'], $course['SKS']);
            $details = $polyObj->display();
            echo "<tr>
                    <td>{$details['ID']}</td>
                    <td>{$details['Kode']}</td>
                    <td>{$details['Mata Kuliah']}</td>
                    <td>{$details['SKS']}</td>
                  </tr>";
        }
        echo "</tbody></table>";
    }
}
```
- Global Variable: Menggunakan global variable $db untuk mengakses metode dari objek DatabaseConnection.
- courses: Jika tipe yang dipilih adalah courses, fungsi ini akan menampilkan tabel untuk mata kuliah. Mengambil semua kursus dari database, membuat objek Course untuk setiap kursus, lalu menampilkan detailnya.
- course_classes: Jika tipe yang dipilih adalah course_classes, fungsi ini menampilkan tabel untuk kelas mata kuliah dengan menggunakan objek CourseClass.
- poly: Jika tipe yang dipilih adalah poly, fungsi ini menampilkan tabel untuk kelas Poly, hanya mengambil satu kursus dari database dan menampilkannya.

Kode View yang bersih dan terstruktur :
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Tugas%202/3.%20View.png)

Semua Outpunya :
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Tugas%202/Output%201.png)
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Tugas%202/Output%202.png)
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Tugas%202/Output%203.png)
