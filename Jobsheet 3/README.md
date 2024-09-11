# Jobsheet
## Jobsheet 3 : Menerapkan Konsep Inheritance, Polymorphism, Encapsulation, dan Abstraction dalam PHP
### Tujuan
Mahasiswa diharapkan mampu menerapkan prinsip OOP dalam pemrograman PHP melalui tugas yang mengintegrasikan konsep Inheritance, Polymorphism, Encapsulation, dan Abstraction.

## Intruksi
## 1. Inheritance
- Buat kelas Person dengan atribut name dan metode getName().
```php
```
- Buat kelas Student yang mewarisi dari Person dan tambahkan atribut studentID serta metode getStudentID().
```php
```

## 2. Polymorphism
- Buat kelas Teacher yang juga mewarisi dari Person dan tambahkan atribut teacherID.
```php
```
- Override metode getName() di kelas Student dan Teacher untuk menampilkan format berbeda.
```php
```

## 3. Encapsulation
- Ubah atribut name dan studentID dalam kelas Student menjadi private.
```php
```
- Tambahkan metode setter dan getter untuk mengakses dan mengubah nilai atribut name dan studentID.
```php
```

## 4. Abstraction
- Buat kelas abstrak Course dengan metode abstrak getCourseDetails().
```php
```
- Buat kelas OnlineCourse dan OfflineCourse yang mengimplementasikan getCourseDetails() untuk memberikan detail yang berbeda.
```php
```

# Tugas
## 1. Implementasikan kelas Person sebagai induk dari Dosen dan Mahasiswa.
## 2. Gunakan konsep Inheritance untuk membuat hierarki kelas yang memungkinkan Dosen dan Mahasiswa memiliki atribut dan metode yang sesuai dengan perannya.
## 3. Terapkan Polymorphism dengan membuat metode getRole() di kelas Person dan override metode ini di kelas Dosen dan Mahasiswa untuk menampilkan peran yang berbeda.
## 4. Gunakan Encapsulation untuk melindungi atribut nidn di kelas Dosen dan nim di kelas Mahasiswa.
## 5. Buat kelas abstrak Jurnal dan implementasikan konsep Abstraction dengan membuat kelas turunan JurnalDosen dan JurnalMahasiswa yang masing-masing memiliki cara tersendiri untuk mengelola pengajuan jurnal.
