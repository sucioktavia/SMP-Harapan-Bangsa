<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smp_harapan_bangsa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $conn->real_escape_string($_POST['nama']);
    $email = $conn->real_escape_string($_POST['email']);
    $pesan = $conn->real_escape_string($_POST['pesan']);

    $stmt = $conn->prepare("INSERT INTO pesan_kontak (nama, email, pesan) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $email, $pesan);

    if ($stmt->execute()) {
        echo "<p>Pesan berhasil dikirim!</p>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - SMP Harapan Bangsa</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: Arial, sans-serif;
            background-image: url('assets/images/bg.webp');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
        }

        header, footer {
            background-color: rgba(15, 54, 108, 0.9);
            padding: 15px 0;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        main {
            padding: 20px 10px; /* Jarak dari header dan footer */
            box-sizing: border-box;
            min-height: calc(100vh - 120px); /* Menyesuaikan tinggi total header dan footer */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            width: 100%;
            max-width: 600px; /* Batasi lebar maksimum form */
            background-color: rgba(255, 255, 255, 0.9); /* Warna putih dengan sedikit transparansi */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: #333; /* Teks yang lebih gelap untuk kontras dengan latar belakang putih */
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 15px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-primary {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            background-color: #0f366c;
            color: white;
        }

        .btn-primary:hover {
            background-color: #082247;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Beranda</a></li>
                <li><a href="profil.html">Profil</a></li>
                <li><a href="layanan.html">Layanan</a></li>
                <li><a href="galeri.html">Galeri</a></li>
                <li><a href="kontak.html">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <form method="post" action="kontak.php">
            <h1 class="text-center">Kontak Kami</h1>
            <p class="text-center">Silakan hubungi kami melalui form berikut untuk pertanyaan atau informasi lebih lanjut.</p>
            <div class="form-group">
                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <textarea name="pesan" class="form-control" placeholder="Pesan" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn-primary">Kirim</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2025 SMP Harapan Bangsa | All Rights Reserved</p>
    </footer>
</body>
</html> 