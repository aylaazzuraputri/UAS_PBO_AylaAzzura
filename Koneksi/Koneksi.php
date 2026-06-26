<?php
// Konfigurasi database
$host = 'localhost';
$db   = 'db_uas_pbo_trpl1a_aylaazzurap';
$user = 'root';      // Sesuaikan dengan username database Anda
$pass = '';          // Sesuaikan dengan password database Anda (kosongkan jika default)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Pengaturan opsi PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Membuat koneksi ke database
    $pdo = new PDO($dsn, $user, $pass, $options);
    // echo "Koneksi ke database berhasil!"; // Opsional: Untuk tes koneksi
} catch (\PDOException $e) {
    // Menampilkan pesan jika koneksi gagal
    die("Koneksi gagal: " . $e->getMessage());
}
?>