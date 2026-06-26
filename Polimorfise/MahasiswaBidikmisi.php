<?php
require_once 'Mahasiswa.php';

class MahasiswaBidikmisi extends Mahasiswa {
    // ... konstruktor tetap sama ...

    public function hitungTagihanSemester(): float {
        // Logika: Gratis (0)
        return 0.0;
    }

    public function tampilkanSpesifikasiAkademik(): void { echo "No KIP: {$this->nomorKipKuliah}, Dana Saku: {$this->danaSakuSubsidi}"; }
    public function ambilDataByNim(PDO $pdo, string $nim): ?array { /* query tetap */ }
}