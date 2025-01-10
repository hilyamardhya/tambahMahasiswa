<?php
// Koneksi ke database
$servername = "localhost"; // atau bisa juga '127.0.0.1'
$username = "root"; // username default XAMPP
$password = ""; // kosongkan jika tidak ada password
$dbname = "bimbingan_mahasiswa"; // ganti sesuai nama database kamu

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$dosen = $_POST['dosen'];
$jurusan = $_POST['jurusan'];

// Menggunakan prepared statement untuk keamanan
$stmt = $conn->prepare("INSERT INTO mahasiswa_bimbingan (nim, nama, dosen_pembimbing, jurusan) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nim, $nama, $dosen, $jurusan);

// Eksekusi statement
if ($stmt->execute()) {
    // Redirect ke halaman lihat mahasiswa
    header("Location: lihat_mahasiswa.php");
    exit(); // Menghentikan script setelah redirect
} else {
    echo "Error: " . $stmt->error;
}

// Menutup statement dan koneksi
$stmt->close();
$conn->close();
?>
