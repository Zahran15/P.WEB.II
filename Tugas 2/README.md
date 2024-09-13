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
### Kode database yang terstruktur
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
### Kode Insert data yang terstruktur
![Screenshot](https://github.com/Zahran15/P.WEB.II/blob/main/Tugas%202/2.%20Insert%20data.png)
