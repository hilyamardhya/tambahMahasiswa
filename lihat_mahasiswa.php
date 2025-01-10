<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bimbingan_mahasiswa";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data mahasiswa
$sql = "SELECT nim, nama, dosen_pembimbing, jurusan FROM mahasiswa_bimbingan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Mahasiswa Bimbingan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Daftar Mahasiswa Bimbingan</h2>
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Dosen Pembimbing</th>
                        <th>Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['nim']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['dosen_pembimbing']; ?></td>
                            <td><?php echo $row['jurusan']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Database mahasiswa masih kosong.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
