<?php
require_once 'Mahasiswa.php';

class MahasiswaMandiri extends Mahasiswa {
    private string $golonganUkt;
    private string $namaWali;

    public function __construct($id, $nim, $nama, $sem, $tarif, $golUkt, $wali) {
        parent::__construct($id, $nim, $nama, $sem, $tarif);
        $this->golonganUkt = $golUkt;
        $this->namaWali = $wali;
    }

    public function hitungTagihanSemester(): float { return $this->tarifUktNominal; }
    public function tampilkanSpesifikasiAkademik(): void { echo "Golongan: {$this->golonganUkt}, Wali: {$this->namaWali}"; }
    public function ambilDataByNim(PDO $pdo, string $nim): ?array {
        $stmt = $pdo->prepare("SELECT * FROM tabel_mahasiswa WHERE nim = ? AND jenis_pembiayaan = 'mandiri'");
        $stmt->execute([$nim]);
        return $stmt->fetch();
    }
}