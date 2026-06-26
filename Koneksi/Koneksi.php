<?php
/**
 * File: koneksi.php
 * Deskripsi: Koneksi ke database db_uas_pbo_trpl1a_aylaazzura
 */

$host = 'localhost';
$db   = 'db_uas_pbo_trpl1a_aylaazzurap';
$user = 'root';     // Sesuaikan jika Anda menggunakan user database lain
$pass = '';         // Sesuaikan jika Anda menggunakan password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Membuat koneksi PDO
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Menampilkan pesan error jika koneksi gagal
    die("Koneksi database gagal: " . $e->getMessage());
}
?>