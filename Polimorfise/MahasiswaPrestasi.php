<?php
require_once 'Mahasiswa.php';

class MahasiswaPrestasi extends Mahasiswa {
    // ... konstruktor tetap sama ...

    public function hitungTagihanSemester(): float {
        // Logika: 25% dari tarif UKT
        return $this->tarifUktNominal * 0.25;
    }

    public function tampilkanSpesifikasiAkademik(): void { echo "Instansi: {$this->namaInstansiBeasiswa}, Syarat IPK: {$this->minimalIpkSyarat}"; }
    public function ambilDataByNim(PDO $pdo, string $nim): ?array { /* query tetap */ }
}