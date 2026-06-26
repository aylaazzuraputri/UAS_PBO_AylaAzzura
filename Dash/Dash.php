<?php
// ============================================================
// ABSTRAKSI - Kelas Dasar Mahasiswa
// ============================================================
abstract class Mahasiswa {
    protected int $idMahasiswa;
    protected string $nim;
    protected string $namaMahasiswa;
    protected int $semester;
    protected float $tarifUktNominal;

    public function __construct(int $idMahasiswa, string $nim, string $namaMahasiswa, int $semester, float $tarifUktNominal) {
        $this->idMahasiswa    = $idMahasiswa;
        $this->nim            = $nim;
        $this->namaMahasiswa  = $namaMahasiswa;
        $this->semester       = $semester;
        $this->tarifUktNominal = $tarifUktNominal;
    }

    abstract public function hitungTagihanSemester(): float;
    abstract public function tampilkanSpesifikasiAkademik(): string;

    public function getIdMahasiswa(): int   { return $this->idMahasiswa; }
    public function getNim(): string        { return $this->nim; }
    public function getNamaMahasiswa(): string { return $this->namaMahasiswa; }
    public function getSemester(): int      { return $this->semester; }
    public function getTarifUktNominal(): float { return $this->tarifUktNominal; }
}

// ============================================================
// PEWARISAN + POLIMORFISME - Kelas Turunan
// ============================================================
class MahasiswaMandiri extends Mahasiswa {
    private string $golonganUkt;
    private string $namaWali;

    public function __construct($id, $nim, $nama, $sem, $tarif, $golUkt, $wali) {
        parent::__construct($id, $nim, $nama, $sem, $tarif);
        $this->golonganUkt = $golUkt;
        $this->namaWali    = $wali;
    }

    // POLIMORFISME: tarif + Rp10.000 biaya admin
    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal + 10000;
    }

    public function tampilkanSpesifikasiAkademik(): string {
        return "Golongan: {$this->golonganUkt} · Wali: {$this->namaWali}";
    }

    public function getGolongan(): string { return $this->golonganUkt; }
    public function getWali(): string     { return $this->namaWali; }
}

class MahasiswaBidikmisi extends Mahasiswa {
    private string $nomorKipKuliah;
    private float  $danaSakuSubsidi;

    public function __construct($id, $nim, $nama, $sem, $tarif, $noKip, $dana) {
        parent::__construct($id, $nim, $nama, $sem, $tarif);
        $this->nomorKipKuliah  = $noKip;
        $this->danaSakuSubsidi = $dana;
    }

    // POLIMORFISME: gratis (subsidi penuh)
    public function hitungTagihanSemester(): float {
        return 0.0;
    }

    public function tampilkanSpesifikasiAkademik(): string {
        return "No KIP: {$this->nomorKipKuliah} · Dana Saku: " . format_rp($this->danaSakuSubsidi);
    }

    public function getNoKip(): string    { return $this->nomorKipKuliah; }
    public function getDanaSaku(): float  { return $this->danaSakuSubsidi; }
}

class MahasiswaPrestasi extends Mahasiswa {
    private string $namaInstansiBeasiswa;
    private float  $minimalIpkSyarat;

    public function __construct($id, $nim, $nama, $sem, $tarif, $instansi, $minIpk) {
        parent::__construct($id, $nim, $nama, $sem, $tarif);
        $this->namaInstansiBeasiswa = $instansi;
        $this->minimalIpkSyarat     = $minIpk;
    }

    // POLIMORFISME: 25% dari tarif UKT
    public function hitungTagihanSemester(): float {
        return $this->tarifUktNominal * 0.25;
    }

    public function tampilkanSpesifikasiAkademik(): string {
        return "Instansi: {$this->namaInstansiBeasiswa} · Min. IPK: {$this->minimalIpkSyarat}";
    }

    public function getInstansi(): string  { return $this->namaInstansiBeasiswa; }
    public function getMinIpk(): float     { return $this->minimalIpkSyarat; }
}

// ============================================================
// DATA DUMMY (menggantikan koneksi database)
// ============================================================
function getDummyData(): array {
    return [
        // Mandiri
        ['id'=>1,'nim'=>'2026001','nama_mahasiswa'=>'Budi Santoso','semester'=>2,'tarif_ukt_nominal'=>5000000,'jenis_pembiayaan'=>'mandiri','golongan_ukt'=>'UKT-4','nama_wali'=>'Sutrisno','nomor_kip_kuliah'=>null,'dana_saku_subsidi'=>0,'nama_instansi_beasiswa'=>null,'minimal_ipk_bersyarat'=>0],
        ['id'=>2,'nim'=>'2026002','nama_mahasiswa'=>'Siti Aminah','semester'=>4,'tarif_ukt_nominal'=>7500000,'jenis_pembiayaan'=>'mandiri','golongan_ukt'=>'UKT-6','nama_wali'=>'Ahmad Yani','nomor_kip_kuliah'=>null,'dana_saku_subsidi'=>0,'nama_instansi_beasiswa'=>null,'minimal_ipk_bersyarat'=>0],
        ['id'=>3,'nim'=>'2026003','nama_mahasiswa'=>'Andi Wijaya','semester'=>6,'tarif_ukt_nominal'=>4000000,'jenis_pembiayaan'=>'mandiri','golongan_ukt'=>'UKT-3','nama_wali'=>'Bambang','nomor_kip_kuliah'=>null,'dana_saku_subsidi'=>0,'nama_instansi_beasiswa'=>null,'minimal_ipk_bersyarat'=>0],
        ['id'=>4,'nim'=>'2026004','nama_mahasiswa'=>'Dewi Lestari','semester'=>2,'tarif_ukt_nominal'=>8000000,'jenis_pembiayaan'=>'mandiri','golongan_ukt'=>'UKT-7','nama_wali'=>'Ratna Sari','nomor_kip_kuliah'=>null,'dana_saku_subsidi'=>0,'nama_instansi_beasiswa'=>null,'minimal_ipk_bersyarat'=>0],
        ['id'=>5,'nim'=>'2026005','nama_mahasiswa'=>'Fajar Ramadhan','semester'=>1,'tarif_ukt_nominal'=>5000000,'jenis_pembiayaan'=>'mandiri','golongan_ukt'=>'UKT-4','nama_wali'=>'Hidayat','nomor_kip_kuliah'=>null,'dana_saku_subsidi'=>0,'nama_instansi_beasiswa'=>null,'minimal_ipk_bersyarat'=>0],
        ['id'=>6,'nim'=>'2026006','nama_mahasiswa'=>'Maya Putri','semester'=>3,'tarif_ukt_nominal'=>6500000,'jenis_pembiayaan'=>'mandiri','golongan_ukt'=>'UKT-5','nama_wali'=>'Susanti','nomor_kip_kuliah'=>null,'dana_saku_subsidi'=>0,'nama_instansi_beasiswa'=>null,'minimal_ipk_bersyarat'=>0],
        ['id'=>7,'nim'=>'2026007','nama_mahasiswa'=>'Rizky Pratama','semester'=>5,'tarif_ukt_nominal'=>4000000,'jenis_pembiayaan'=>'mandiri','golongan_ukt'=>'UKT-3','nama_wali'=>'Joko','nomor_kip_kuliah'=>null,'dana_saku_subsidi'=>0,'nama_instansi_beasiswa'=>null,'minimal_ipk_bersyarat'=>0],
        // Bidikmisi
        ['id'=>8,'nim'=>'2026008','nama_mahasiswa'=>'Eko Prasetyo','semester'=>2,'tarif_ukt_nominal'=>0,'jenis_pembiayaan'=>'bidikmisi','golongan_ukt'=>'UKT-1','nama_wali'=>'Parto','nomor_kip_kuliah'=>'KIP2026001','dana_saku_subsidi'=>1200000,'nama_instansi_beasiswa'=>'Kemendikbud','minimal_ipk_bersyarat'=>2.75],
        ['id'=>9,'nim'=>'2026009','nama_mahasiswa'=>'Nisa Fitri','semester'=>4,'tarif_ukt_nominal'=>0,'jenis_pembiayaan'=>'bidikmisi','golongan_ukt'=>'UKT-1','nama_wali'=>'Yani','nomor_kip_kuliah'=>'KIP2026002','dana_saku_subsidi'=>1200000,'nama_instansi_beasiswa'=>'Kemendikbud','minimal_ipk_bersyarat'=>2.75],
        ['id'=>10,'nim'=>'2026010','nama_mahasiswa'=>'Hendra Kusuma','semester'=>6,'tarif_ukt_nominal'=>0,'jenis_pembiayaan'=>'bidikmisi','golongan_ukt'=>'UKT-1','nama_wali'=>'Tono','nomor_kip_kuliah'=>'KIP2026003','dana_saku_subsidi'=>1200000,'nama_instansi_beasiswa'=>'Kemendikbud','minimal_ipk_bersyarat'=>2.75],
        ['id'=>11,'nim'=>'2026011','nama_mahasiswa'=>'Lina Marlina','semester'=>3,'tarif_ukt_nominal'=>0,'jenis_pembiayaan'=>'bidikmisi','golongan_ukt'=>'UKT-1','nama_wali'=>'Dedi','nomor_kip_kuliah'=>'KIP2026004','dana_saku_subsidi'=>1200000,'nama_instansi_beasiswa'=>'Kemendikbud','minimal_ipk_bersyarat'=>2.75],
        ['id'=>12,'nim'=>'2026012','nama_mahasiswa'=>'Arif Rahman','semester'=>5,'tarif_ukt_nominal'=>0,'jenis_pembiayaan'=>'bidikmisi','golongan_ukt'=>'UKT-1','nama_wali'=>'Wawan','nomor_kip_kuliah'=>'KIP2026005','dana_saku_subsidi'=>1200000,'nama_instansi_beasiswa'=>'Kemendikbud','minimal_ipk_bersyarat'=>2.75],
        ['id'=>13,'nim'=>'2026013','nama_mahasiswa'=>'Sari Indah','semester'=>1,'tarif_ukt_nominal'=>0,'jenis_pembiayaan'=>'bidikmisi','golongan_ukt'=>'UKT-1','nama_wali'=>'Budi','nomor_kip_kuliah'=>'KIP2026006','dana_saku_subsidi'=>1200000,'nama_instansi_beasiswa'=>'Kemendikbud','minimal_ipk_bersyarat'=>2.75],
        // Prestasi
        ['id'=>14,'nim'=>'2026014','nama_mahasiswa'=>'Kevin Sanjaya','semester'=>4,'tarif_ukt_nominal'=>0,'jenis_pembiayaan'=>'prestasi','golongan_ukt'=>'UKT-0','nama_wali'=>'Hendro','nomor_kip_kuliah'=>null,'dana_saku_subsidi'=>500000,'nama_instansi_beasiswa'=>'Djarum Foundation','minimal_ipk_bersyarat'=>3.50],
        ['id'=>15,'nim'=>'2026015','nama_mahasiswa'=>'Jessica Mila','semester'=>2,'tarif_ukt_nominal'=>0,'jenis_pembiayaan'=>'prestasi','golongan_ukt'=>'UKT-0','nama_wali'=>'Susi','nomor_kip_kuliah'=>null,'dana_saku_subsidi'=>750000,'nama_instansi_beasiswa'=>'Tanoto Foundation','minimal_ipk_bersyarat'=>3.25],
        ['id'=>16,'nim'=>'2026016','nama_mahasiswa'=>'Taufik Hidayat','semester'=>6,'tarif_ukt_nominal'=>0,'jenis_pembiayaan'=>'prestasi','golongan_ukt'=>'UKT-0','nama_wali'=>'Gatot','nomor_kip_kuliah'=>null,'dana_saku_subsidi'=>1000000,'nama_instansi_beasiswa'=>'Yayasan Supersemar','minimal_ipk_bersyarat'=>3.00],
        ['id'=>17,'nim'=>'2026017','nama_mahasiswa'=>'Melati Sukma','semester'=>3,'tarif_ukt_nominal'=>0,'jenis_pembiayaan'=>'prestasi','golongan_ukt'=>'UKT-0','nama_wali'=>'Agung','nomor_kip_kuliah'=>null,'dana_saku_subsidi'=>500000,'nama_instansi_beasiswa'=>'Djarum Foundation','minimal_ipk_bersyarat'=>3.50],
        ['id'=>18,'nim'=>'2026018','nama_mahasiswa'=>'Bagas Kaffa','semester'=>5,'tarif_ukt_nominal'=>0,'jenis_pembiayaan'=>'prestasi','golongan_ukt'=>'UKT-0','nama_wali'=>'Warno','nomor_kip_kuliah'=>null,'dana_saku_subsidi'=>600000,'nama_instansi_beasiswa'=>'Tanoto Foundation','minimal_ipk_bersyarat'=>3.25],
        ['id'=>19,'nim'=>'2026019','nama_mahasiswa'=>'Citra Kirana','semester'=>1,'tarif_ukt_nominal'=>0,'jenis_pembiayaan'=>'prestasi','golongan_ukt'=>'UKT-0','nama_wali'=>'Hadi','nomor_kip_kuliah'=>null,'dana_saku_subsidi'=>500000,'nama_instansi_beasiswa'=>'Djarum Foundation','minimal_ipk_bersyarat'=>3.50],
        ['id'=>20,'nim'=>'2026020','nama_mahasiswa'=>'Dimas Seto','semester'=>2,'tarif_ukt_nominal'=>0,'jenis_pembiayaan'=>'prestasi','golongan_ukt'=>'UKT-0','nama_wali'=>'Roni','nomor_kip_kuliah'=>null,'dana_saku_subsidi'=>800000,'nama_instansi_beasiswa'=>'Tanoto Foundation','minimal_ipk_bersyarat'=>3.25],
    ];
}

function buatObjekMahasiswa(array $row): Mahasiswa {
    return match($row['jenis_pembiayaan']) {
        'mandiri'   => new MahasiswaMandiri($row['id'], $row['nim'], $row['nama_mahasiswa'], $row['semester'], $row['tarif_ukt_nominal'], $row['golongan_ukt'], $row['nama_wali']),
        'bidikmisi' => new MahasiswaBidikmisi($row['id'], $row['nim'], $row['nama_mahasiswa'], $row['semester'], (float)$row['tarif_ukt_nominal'], $row['nomor_kip_kuliah'], $row['dana_saku_subsidi']),
        'prestasi'  => new MahasiswaPrestasi($row['id'], $row['nim'], $row['nama_mahasiswa'], $row['semester'], (float)$row['tarif_ukt_nominal'], $row['nama_instansi_beasiswa'], $row['minimal_ipk_bersyarat']),
        default     => throw new \InvalidArgumentException("Jenis pembiayaan tidak dikenal"),
    };
}

function format_rp(float $nominal): string {
    return 'Rp ' . number_format($nominal, 0, ',', '.');
}

// ============================================================
// PROSES DATA
// ============================================================
$filterJenis = $_GET['jenis'] ?? 'semua';
$search      = trim($_GET['search'] ?? '');

$allRows  = getDummyData();
$daftarMahasiswa = [];

foreach ($allRows as $row) {
    if ($filterJenis !== 'semua' && $row['jenis_pembiayaan'] !== $filterJenis) continue;
    if ($search && stripos($row['nama_mahasiswa'], $search) === false && stripos($row['nim'], $search) === false) continue;
    $daftarMahasiswa[] = ['row' => $row, 'obj' => buatObjekMahasiswa($row)];
}

// Statistik
$totalMandiri   = count(array_filter($allRows, fn($r) => $r['jenis_pembiayaan'] === 'mandiri'));
$totalBidikmisi = count(array_filter($allRows, fn($r) => $r['jenis_pembiayaan'] === 'bidikmisi'));
$totalPrestasi  = count(array_filter($allRows, fn($r) => $r['jenis_pembiayaan'] === 'prestasi'));
$totalTagihan   = array_sum(array_map(fn($d) => $d['obj']->hitungTagihanSemester(), $daftarMahasiswa));
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SIMAK — Sistem Informasi Mahasiswa | UAS PBO</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap');

  :root {
    --bg:        #0b0f1a;
    --surface:   #111827;
    --card:      #161d2e;
    --border:    #1e2d45;
    --accent:    #3b82f6;
    --accent2:   #06b6d4;
    --mandiri:   #f59e0b;
    --bidikmisi: #10b981;
    --prestasi:  #a78bfa;
    --text:      #e2e8f0;
    --muted:     #64748b;
    --danger:    #ef4444;
    --radius:    12px;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--bg);
    color: var(--text);
    min-height: 100vh;
    overflow-x: hidden;
  }

  /* ---- HEADER ---- */
  header {
    background: linear-gradient(135deg, #0d1b2e 0%, #1a2744 50%, #0d1b2e 100%);
    border-bottom: 1px solid var(--border);
    padding: 0 2rem;
    position: sticky;
    top: 0;
    z-index: 100;
    backdrop-filter: blur(12px);
  }
  .header-inner {
    max-width: 1280px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 68px;
    gap: 1rem;
  }
  .logo {
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }
  .logo-icon {
    width: 40px; height: 40px;
    background: linear-gradient(135deg, var(--accent), var(--accent2));
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.2rem;
  }
  .logo-text { line-height: 1.1; }
  .logo-title { font-size: 1.1rem; font-weight: 800; color: #fff; letter-spacing: -0.02em; }
  .logo-sub   { font-size: 0.7rem; color: var(--muted); font-family: 'JetBrains Mono', monospace; }

  .header-tag {
    background: rgba(59,130,246,0.15);
    border: 1px solid rgba(59,130,246,0.3);
    color: var(--accent);
    font-size: 0.72rem;
    font-family: 'JetBrains Mono', monospace;
    padding: 4px 10px;
    border-radius: 20px;
    white-space: nowrap;
  }

  /* ---- MAIN ---- */
  main { max-width: 1280px; margin: 0 auto; padding: 2rem; }

  /* ---- HERO ---- */
  .hero {
    background: linear-gradient(135deg, #0d1b2e, #1a2744);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 2.5rem;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
  }
  .hero::before {
    content: '';
    position: absolute;
    top: -60px; right: -60px;
    width: 200px; height: 200px;
    background: radial-gradient(circle, rgba(59,130,246,0.2) 0%, transparent 70%);
    pointer-events: none;
  }
  .hero-eyebrow {
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.72rem;
    color: var(--accent2);
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 0.75rem;
  }
  .hero-title {
    font-size: clamp(1.6rem, 4vw, 2.4rem);
    font-weight: 800;
    letter-spacing: -0.03em;
    line-height: 1.15;
    margin-bottom: 0.5rem;
  }
  .hero-title span { color: var(--accent); }
  .hero-desc {
    color: var(--muted);
    font-size: 0.9rem;
    max-width: 520px;
    line-height: 1.6;
  }

  /* ---- STATS ---- */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-bottom: 2rem;
  }
  .stat-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 1.25rem 1.5rem;
    position: relative;
    overflow: hidden;
    transition: border-color 0.2s, transform 0.2s;
  }
  .stat-card:hover { transform: translateY(-2px); }
  .stat-card.mandiri   { border-left: 3px solid var(--mandiri); }
  .stat-card.bidikmisi { border-left: 3px solid var(--bidikmisi); }
  .stat-card.prestasi  { border-left: 3px solid var(--prestasi); }
  .stat-card.total     { border-left: 3px solid var(--accent); }
  .stat-label { font-size: 0.75rem; color: var(--muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.4rem; }
  .stat-value { font-size: 2rem; font-weight: 800; letter-spacing: -0.04em; line-height: 1; }
  .stat-value.mandiri   { color: var(--mandiri); }
  .stat-value.bidikmisi { color: var(--bidikmisi); }
  .stat-value.prestasi  { color: var(--prestasi); }
  .stat-value.total     { color: var(--accent); font-size: 1.5rem; }
  .stat-sub { font-size: 0.75rem; color: var(--muted); margin-top: 0.3rem; }

  /* ---- CONTROLS ---- */
  .controls {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    flex-wrap: wrap;
    align-items: center;
  }
  .search-wrap {
    position: relative;
    flex: 1;
    min-width: 220px;
  }
  .search-wrap svg {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--muted);
    pointer-events: none;
  }
  .search-input {
    width: 100%;
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 0.65rem 1rem 0.65rem 2.6rem;
    color: var(--text);
    font-family: inherit;
    font-size: 0.875rem;
    outline: none;
    transition: border-color 0.2s;
  }
  .search-input:focus { border-color: var(--accent); }
  .search-input::placeholder { color: var(--muted); }

  .filter-group { display: flex; gap: 0.5rem; flex-wrap: wrap; }
  .filter-btn {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 0.6rem 1.1rem;
    color: var(--muted);
    font-family: inherit;
    font-size: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
  }
  .filter-btn:hover { border-color: var(--accent); color: var(--text); }
  .filter-btn.active-semua      { background: rgba(59,130,246,0.15);  border-color: var(--accent);    color: var(--accent); }
  .filter-btn.active-mandiri    { background: rgba(245,158,11,0.15);  border-color: var(--mandiri);   color: var(--mandiri); }
  .filter-btn.active-bidikmisi  { background: rgba(16,185,129,0.15);  border-color: var(--bidikmisi); color: var(--bidikmisi); }
  .filter-btn.active-prestasi   { background: rgba(167,139,250,0.15); border-color: var(--prestasi);  color: var(--prestasi); }

  /* ---- RESULT INFO ---- */
  .result-info {
    font-size: 0.8rem;
    color: var(--muted);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  .result-info strong { color: var(--text); }

  /* ---- TABLE ---- */
  .table-wrap {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    overflow: hidden;
  }
  table {
    width: 100%;
    border-collapse: collapse;
  }
  thead {
    background: linear-gradient(90deg, #111827, #0d1b2e);
    border-bottom: 1px solid var(--border);
  }
  th {
    padding: 0.9rem 1.25rem;
    text-align: left;
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    color: var(--muted);
    white-space: nowrap;
  }
  tbody tr {
    border-bottom: 1px solid rgba(30,45,69,0.5);
    transition: background 0.15s;
  }
  tbody tr:last-child { border-bottom: none; }
  tbody tr:hover { background: rgba(59,130,246,0.04); }
  td {
    padding: 1rem 1.25rem;
    font-size: 0.875rem;
    vertical-align: middle;
  }

  .nim-cell {
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.82rem;
    color: var(--accent2);
  }
  .nama-cell { font-weight: 600; }
  .sem-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: rgba(30,45,69,0.8);
    border: 1px solid var(--border);
    border-radius: 6px;
    padding: 2px 10px;
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--text);
  }

  .badge {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.72rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.04em;
  }
  .badge-mandiri   { background: rgba(245,158,11,0.15);  color: var(--mandiri);   border: 1px solid rgba(245,158,11,0.3); }
  .badge-bidikmisi { background: rgba(16,185,129,0.15);  color: var(--bidikmisi); border: 1px solid rgba(16,185,129,0.3); }
  .badge-prestasi  { background: rgba(167,139,250,0.15); color: var(--prestasi);  border: 1px solid rgba(167,139,250,0.3); }
  .badge-dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; }

  .tagihan-gratis {
    color: var(--bidikmisi);
    font-weight: 700;
    font-size: 0.82rem;
  }
  .tagihan-nominal {
    font-weight: 700;
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.82rem;
    color: var(--text);
  }
  .tagihan-diskon {
    color: var(--prestasi);
    font-weight: 700;
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.82rem;
  }

  .spek-cell {
    font-size: 0.78rem;
    color: var(--muted);
    max-width: 220px;
    line-height: 1.5;
  }

  /* ---- EMPTY STATE ---- */
  .empty {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--muted);
  }
  .empty-icon { font-size: 3rem; margin-bottom: 1rem; opacity: 0.4; }
  .empty-title { font-size: 1.1rem; font-weight: 700; color: var(--text); margin-bottom: 0.4rem; }
  .empty-desc { font-size: 0.85rem; }

  /* ---- FOOTER ---- */
  footer {
    border-top: 1px solid var(--border);
    padding: 1.5rem 2rem;
    text-align: center;
    font-size: 0.75rem;
    color: var(--muted);
  }
  footer span { color: var(--accent); }

  /* ---- OOP LEGEND ---- */
  .oop-strip {
    display: flex;
    gap: 0.75rem;
    margin-top: 2rem;
    flex-wrap: wrap;
  }
  .oop-pill {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 0.5rem 0.9rem;
    font-size: 0.75rem;
  }
  .oop-dot { width: 8px; height: 8px; border-radius: 50%; }
  .oop-pill strong { color: var(--text); }
  .oop-pill span   { color: var(--muted); }

  @media (max-width: 768px) {
    main { padding: 1rem; }
    td, th { padding: 0.75rem 0.75rem; }
    .hero { padding: 1.5rem; }
    .spek-cell { display: none; }
  }
</style>
</head>
<body>

<header>
  <div class="header-inner">
    <div class="logo">
      <div class="logo-icon">🎓</div>
      <div class="logo-text">
        <div class="logo-title">SIMAK</div>
        <div class="logo-sub"></div>
      </div>
    </div>
    <div class="header-tag">Ayla Azzura Putri</div>
  </div>
</header>

<main>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-eyebrow">Sistem Informasi Mahasiswa</div>
    <h1 class="hero-title">Data <span>UKT &amp; Tagihan</span><br>Mahasiswa TRPL 1A</h1>
    <p class="hero-desc">
      <div class="oop-pill"><div class="oop-dot" style="background:#3b82f6"></div><strong></strong><span>Kelas Mahasiswa (abstract)</span></div>
      <div class="oop-pill"><div class="oop-dot" style="background:#06b6d4"></div><strong></strong><span>Mandiri / Bidikmisi / Prestasi extends Mahasiswa</span></div>
      <div class="oop-pill"><div class="oop-dot" style="background:#a78bfa"></div><strong></strong><span>hitungTagihanSemester() berbeda tiap kelas</span></div>
    </div>
  </section>

  <!-- STATS -->
  <div class="stats-grid">
    <div class="stat-card mandiri">
      <div class="stat-label">Mahasiswa Mandiri</div>
      <div class="stat-value mandiri"><?= $totalMandiri ?></div>
      <div class="stat-sub">Tagihan UKT + Rp10.000</div>
    </div>
    <div class="stat-card bidikmisi">
      <div class="stat-label">Mahasiswa Bidikmisi</div>
      <div class="stat-value bidikmisi"><?= $totalBidikmisi ?></div>
      <div class="stat-sub">Gratis (Subsidi Penuh)</div>
    </div>
    <div class="stat-card prestasi">
      <div class="stat-label">Mahasiswa Prestasi</div>
      <div class="stat-value prestasi"><?= $totalPrestasi ?></div>
      <div class="stat-sub">25% dari Tarif UKT</div>
    </div>
    <div class="stat-card total">
      <div class="stat-label">Total Tagihan (Filter)</div>
      <div class="stat-value total"><?= format_rp($totalTagihan) ?></div>
      <div class="stat-sub"><?= count($daftarMahasiswa) ?> mahasiswa ditampilkan</div>
    </div>
  </div>

  <!-- CONTROLS -->
  <div class="controls">
    <form method="GET" style="display:contents">
      <input type="hidden" name="jenis" value="<?= htmlspecialchars($filterJenis) ?>">
      <div class="search-wrap">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
        <input class="search-input" type="text" name="search" placeholder="Cari nama atau NIM..." value="<?= htmlspecialchars($search) ?>">
      </div>
    </form>

    <div class="filter-group">
      <?php foreach (['semua'=>'Semua', 'mandiri'=>'Mandiri', 'bidikmisi'=>'Bidikmisi', 'prestasi'=>'Prestasi'] as $val => $label): ?>
        <a href="?jenis=<?= $val ?><?= $search ? '&search='.urlencode($search) : '' ?>"
           class="filter-btn <?= $filterJenis === $val ? 'active-'.$val : '' ?>">
          <?php if($val !== 'semua'): ?><span class="badge-dot" style="width:8px;height:8px;border-radius:50%;background:<?= $val==='mandiri'?'var(--mandiri)':($val==='bidikmisi'?'var(--bidikmisi)':'var(--prestasi)') ?>"></span><?php endif; ?>
          <?= $label ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- RESULT INFO -->
  <div class="result-info">
    Menampilkan <strong><?= count($daftarMahasiswa) ?></strong> dari <strong><?= count($allRows) ?></strong> mahasiswa
    <?php if($filterJenis !== 'semua'): ?> · Filter: <strong><?= ucfirst($filterJenis) ?></strong><?php endif; ?>
    <?php if($search): ?> · Pencarian: "<strong><?= htmlspecialchars($search) ?></strong>"<?php endif; ?>
  </div>

  <!-- TABLE -->
  <div class="table-wrap">
    <?php if (empty($daftarMahasiswa)): ?>
      <div class="empty">
        <div class="empty-icon">🔍</div>
        <div class="empty-title">Tidak ditemukan</div>
        <div class="empty-desc">Tidak ada data mahasiswa yang cocok dengan pencarian atau filter yang dipilih.</div>
      </div>
    <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Sem</th>
          <th>Pembiayaan</th>
          <th>Spesifikasi Akademik</th>
          <th>Tagihan Semester</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($daftarMahasiswa as $i => $item):
          $obj  = $item['obj'];
          $row  = $item['row'];
          $jenis = $row['jenis_pembiayaan'];
          $tagihan = $obj->hitungTagihanSemester();
        ?>
        <tr>
          <td style="color:var(--muted);font-size:0.8rem;"><?= $i + 1 ?></td>
          <td class="nim-cell"><?= htmlspecialchars($obj->getNim()) ?></td>
          <td class="nama-cell"><?= htmlspecialchars($obj->getNamaMahasiswa()) ?></td>
          <td><span class="sem-badge"><?= $obj->getSemester() ?></span></td>
          <td>
            <span class="badge badge-<?= $jenis ?>">
              <span class="badge-dot"></span>
              <?= ucfirst($jenis) ?>
            </span>
          </td>
          <td class="spek-cell"><?= $obj->tampilkanSpesifikasiAkademik() ?></td>
          <td>
            <?php if ($jenis === 'bidikmisi'): ?>
              <span class="tagihan-gratis">✓ GRATIS</span>
            <?php elseif ($jenis === 'prestasi'): ?>
              <span class="tagihan-diskon"><?= format_rp($tagihan) ?></span>
            <?php else: ?>
              <span class="tagihan-nominal"><?= format_rp($tagihan) ?></span>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; ?>
  </div>

</main>

<footer>
  UAS Pemrograman Berorientasi Objek · <span>Ayla Azzura Putri</span> · TRPL 1A
  &nbsp;·&nbsp; Konsep: Abstraksi · Pewarisan · Polimorfisme
</footer>

</body>
</html>