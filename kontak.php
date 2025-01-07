<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "harbang"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menyimpan data dari formulir
$nama = $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];

// Query untuk memasukkan data ke tabel
$sql = "INSERT INTO pesan_kontak (nama, email, pesan) 
        VALUES ('$nama', '$email', '$pesan')";

if ($conn->query($sql) === TRUE) {
    echo "Pesan berhasil dikirim!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
