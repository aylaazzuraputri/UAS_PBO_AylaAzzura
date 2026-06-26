<?php
require_once 'Mahasiswa.php';

class MahasiswaPrestasi extends Mahasiswa {
    private string $namaInstansiBeasiswa;
    private float $minimalIpkSyarat;

    public function __construct($id, $nim, $nama, $sem, $tarif, $instansi, $minIpk) {
        parent::__construct($id, $nim, $nama, $sem, $tarif);
        $this->namaInstansiBeasiswa = $instansi;
        $this->minimalIpkSyarat = $minIpk;
    }

    public function hitungTagihanSemester(): float { return 0.0; }
    public function tampilkanSpesifikasiAkademik(): void { echo "Instansi: {$this->namaInstansiBeasiswa}, Syarat IPK: {$this->minimalIpkSyarat}"; }
    public function ambilDataByNim(PDO $pdo, string $nim): ?array {
        $stmt = $pdo->prepare("SELECT * FROM tabel_mahasiswa WHERE nim = ? AND jenis_pembiayaan = 'prestasi'");
        $stmt->execute([$nim]);
        return $stmt->fetch();
    }
}