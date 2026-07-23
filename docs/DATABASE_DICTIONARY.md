# SIMLAB - Database Dictionary

## Deskripsi

Dokumen ini berisi struktur database final yang akan digunakan pada project SIMLAB (Sistem Informasi Manajemen Laboratorium Komputer).

**Status : FINAL**

---

# 1. users

Digunakan untuk proses login seluruh pengguna sistem.

| Kolom | Tipe | Keterangan |
|--------|------|------------|
| id | bigint | Primary Key |
| name | varchar(255) | Nama pengguna |
| email | varchar(255) | Email unik |
| password | varchar(255) | Password |
| role | enum | admin, mahasiswa, dosen |
| created_at | timestamp | Laravel |
| updated_at | timestamp | Laravel |

---

# 2. mahasiswas

Menyimpan data mahasiswa.

| Kolom | Tipe |
|--------|------|
| id | bigint |
| user_id | bigint (FK users) |
| nim | varchar(20) |
| nama | varchar(100) |
| prodi | varchar(100) |
| angkatan | year |
| no_hp | varchar(20) |
| alamat | text |
| created_at | timestamp |
| updated_at | timestamp |

---

# 3. dosens

Menyimpan data dosen.

| Kolom | Tipe |
|--------|------|
| id | bigint |
| user_id | bigint (FK users) |
| nip | varchar(30) |
| nama | varchar(100) |
| no_hp | varchar(20) |
| created_at | timestamp |
| updated_at | timestamp |

---

# 4. mata_kuliahs

Daftar mata kuliah.

| Kolom | Tipe |
|--------|------|
| id | bigint |
| kode | varchar(20) |
| nama | varchar(100) |
| semester | integer |
| sks | integer |
| created_at | timestamp |
| updated_at | timestamp |

---

# 5. praktikums

Data praktikum.

| Kolom | Tipe |
|--------|------|
| id | bigint |
| mata_kuliah_id | bigint (FK mata_kuliahs) |
| nama | varchar(100) |
| biaya | decimal(12,2) |
| status | boolean |
| created_at | timestamp |
| updated_at | timestamp |

---

# 6. laboratories

Data laboratorium.

| Kolom | Tipe |
|--------|------|
| id | bigint |
| nama | varchar(100) |
| lokasi | varchar(100) |
| kapasitas | integer |
| created_at | timestamp |
| updated_at | timestamp |

---

# 7. computers

Data komputer laboratorium.

| Kolom | Tipe |
|--------|------|
| id | bigint |
| laboratory_id | bigint (FK laboratories) |
| kode_pc | varchar(30) |
| spesifikasi | text |
| status | enum(aktif, rusak, maintenance) |
| created_at | timestamp |
| updated_at | timestamp |

---

# 8. kelas_praktikums

Kelas praktikum.

| Kolom | Tipe |
|--------|------|
| id | bigint |
| praktikum_id | bigint (FK praktikums) |
| dosen_id | bigint (FK dosens) |
| laboratory_id | bigint (FK laboratories) |
| nama_kelas | varchar(20) |
| kuota | integer |
| created_at | timestamp |
| updated_at | timestamp |

---

# 9. jadwals

Jadwal praktikum.

| Kolom | Tipe |
|--------|------|
| id | bigint |
| kelas_praktikum_id | bigint (FK kelas_praktikums) |
| hari | varchar(20) |
| jam_mulai | time |
| jam_selesai | time |
| created_at | timestamp |
| updated_at | timestamp |

---

# 10. pendaftarans

Header pendaftaran mahasiswa.

| Kolom | Tipe |
|--------|------|
| id | bigint |
| mahasiswa_id | bigint (FK mahasiswas) |
| tanggal_daftar | date |
| status | enum(Belum Bayar, Menunggu Verifikasi, Lunas) |
| created_at | timestamp |
| updated_at | timestamp |

---

# 11. detail_pendaftarans

Detail praktikum yang dipilih mahasiswa.

| Kolom | Tipe |
|--------|------|
| id | bigint |
| pendaftaran_id | bigint (FK pendaftarans) |
| kelas_praktikum_id | bigint (FK kelas_praktikums) |
| harga | decimal(12,2) |
| created_at | timestamp |
| updated_at | timestamp |

---

# 12. pembayarans

Data pembayaran mahasiswa.

| Kolom | Tipe |
|--------|------|
| id | bigint |
| pendaftaran_id | bigint (FK pendaftarans) |
| total_bayar | decimal(12,2) |
| bukti_pembayaran | varchar(255) |
| status | enum(Menunggu, Diterima, Ditolak) |
| tanggal_bayar | date |
| created_at | timestamp |
| updated_at | timestamp |
