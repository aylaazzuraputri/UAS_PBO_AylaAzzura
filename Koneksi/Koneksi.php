<?php
/**
 * File: koneksi.php
 * Deskripsi: Membuat koneksi ke database db_uas_pbo_trpl1a_aylaazzurap
 */

$host = 'localhost';
$db   = 'db_uas_pbo_trpl1a_aylaazzurap';
$user = 'root';     // Default XAMPP/WAMP
$pass = '';         // Default XAMPP/WAMP biasanya kosong
$charset = 'utf8mb4';

// Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Pengaturan opsi PDO untuk keamanan dan performa
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Inisialisasi objek koneksi PDO
    $pdo = new PDO($dsn, $user, $pass, $options);
    
    // Pesan sukses opsional (bisa di-comment jika tidak diperlukan)
    // echo "Koneksi berhasil ke database: " . $db; 

} catch (\PDOException $e) {
    // Menangani error koneksi
    die("Koneksi gagal: " . $e->getMessage());
}
?>