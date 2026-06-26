<?php
require_once 'Mahasiswa.php';

class MahasiswaMandiri extends Mahasiswa {
    // ... konstruktor tetap sama ...

    public function hitungTagihanSemester(): float {
        // Logika: Tarif UKT + 10.000
        return $this->tarifUktNominal + 10000;
    }

    public function tampilkanSpesifikasiAkademik(): void { echo "Golongan: {$this->golonganUkt}, Wali: {$this->namaWali}"; }
    public function ambilDataByNim(PDO $pdo, string $nim): ?array { /* query tetap */ }
}