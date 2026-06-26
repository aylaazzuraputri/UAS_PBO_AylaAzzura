<?php

abstract class Mahasiswa {
    // Atribut terenkapsulasi dengan akses protected
    protected int $idMahasiswa;
    protected string $nim;
    protected string $namaMahasiswa;
    protected int $semester;
    protected float $tarifUktNominal;

    // Konstruktor
    public function __construct(int $idMahasiswa, string $nim, string $namaMahasiswa, int $semester, float $tarifUktNominal) {
        $this->idMahasiswa = $idMahasiswa;
        $this->nim = $nim;
        $this->namaMahasiswa = $namaMahasiswa;
        $this->semester = $semester;
        $this->tarifUktNominal = $tarifUktNominal;
    }

    // --- Abstract Methods ---
    
    // Wajib mengembalikan total tagihan berdasarkan aturan masing-masing jenis pembiayaan.
    abstract public function hitungTagihanSemester(): float;

    // Wajib menampilkan spesifikasi akademik atau detail beasiswa/wali.
    abstract public function tampilkanSpesifikasiAkademik(): void;

    // --- Getter dan Setter (Enkapsulasi) ---

    public function getIdMahasiswa(): int { return $this->idMahasiswa; }
    
    public function getNim(): string { return $this->nim; }
    
    public function getNamaMahasiswa(): string { return $this->namaMahasiswa; }
    
    public function getSemester(): int { return $this->semester; }
    
    public function getTarifUktNominal(): float { return $this->tarifUktNominal; }
    
    public function setTarifUktNominal(float $tarifUktNominal): void { 
        $this->tarifUktNominal = $tarifUktNominal; 
    }
}