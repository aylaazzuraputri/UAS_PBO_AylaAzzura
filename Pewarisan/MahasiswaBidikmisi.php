<?php
require_once 'Mahasiswa.php';

class MahasiswaBidikmisi extends Mahasiswa {
    private string $nomorKipKuliah;
    private float $danaSakuSubsidi;

    public function __construct($id, $nim, $nama, $sem, $tarif, $noKip, $dana) {
        parent::__construct($id, $nim, $nama, $sem, $tarif);
        $this->nomorKipKuliah = $noKip;
        $this->danaSakuSubsidi = $dana;
    }

    public function hitungTagihanSemester(): float { return 0.0; }
    public function tampilkanSpesifikasiAkademik(): void { echo "No KIP: {$this->nomorKipKuliah}, Dana Saku: {$this->danaSakuSubsidi}"; }
    public function ambilDataByNim(PDO $pdo, string $nim): ?array {
        $stmt = $pdo->prepare("SELECT * FROM tabel_mahasiswa WHERE nim = ? AND jenis_pembiayaan = 'bidikmisi'");
        $stmt->execute([$nim]);
        return $stmt->fetch();
    }
}