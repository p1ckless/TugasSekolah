-- Kode ini dibuat untuk menyempurnakan tugas pada LKM Basis Data
-- Studi Kasus Hotel

CREATE TABLE tamu (
  id_tamu TEXT PRIMARY KEY,
  nama_tamu TEXT,
  alamat TEXT,
  no_telepon INT,
  email TEXT
);

CREATE TABLE kamar (
  no_kamar TEXT PRIMARY KEY,
  tipe_kamar TEXT,
  harga_permalam INT,
  status_kamar TEXT
);

CREATE TABLE pembayaran (
  id_pembayaran TEXT PRIMARY KEY,
  status_pembayaran TEXT,
  tanggal_pembayaran DATE,
  total_bayar INT
);

CREATE TABLE petugas (
  id_petugas TEXT PRIMARY KEY,
  nama_petugas TEXT,
  alamat TEXT,
  no_telepon INT,
  jabatan TEXT
);

CREATE TABLE reservasi (
  id_reservasi TEXT PRIMARY KEY,
  tanggal_reservasi DATE,
  tanggal_check_in DATE,
  tanggal_check_out DATE
);


INSERT INTO tamu(id_tamu, nama_tamu, alamat, no_telepon, email) 
VALUES ("T001", "Putra", "Jl. Melati No. 15, Bandung", 081234567890, "Putra@gmail.com"),
("T002", "Rinjani", "Jl. Anggrek No. 2, Jakarta", 082345678910, "Rinjani@gmail.com"), 
("T003", "Syelsi", "Jl. Tulip No. 23, Jakarta", 089123456789, "Syelsi@gmail.com");

INSERT INTO kamar (no_kamar, tipe_kamar, harga_permalam, status_kamar) 
VALUES ("K001", "Standart", 500000, "Terisi"),
("K002", "Deluxe", 800000, "Terisi"),
("K003", "Suite", 1000000, "Tersedia"),
("K004", "Suite", 1000000, "Dibersihkan");

INSERT INTO pembayaran (id_pembayaran, status_pembayaran, tanggal_pembayaran, total_bayar) VALUES ("PB001", "Lunas", "2026-08-14", 1000000),("PB002", "Lunas", "2026-08-15", 500000),
("PB003", "Lunas", "2026-08-16", 800000);

INSERT INTO petugas(id_petugas, nama_petugas, alamat, no_telepon, jabatan) VALUES ("P001", "Heisenberg", "Jl. Merdeka No. 10, Jakarta", 081234987654, "Resepsionis"),
("P002", "Sigma", "Jl. Mawar No. 5, Bandung", 082342015678, "Admin"),
("POO3", "Acar", "Jl. Daisy No. 23, Bandung", 089234156789, "Manager");

INSERT INTO reservasi (id_reservasi, tanggal_reservasi, tanggal_check_in, tanggal_check_out)
VALUES ("R001", "2026-08-10", "2026-08-13", "2026-08-14"),
("R002", "2026-08-11", "2026-08-14", "2026-08-16"),
("R003", "2026-08-12", "2026-08-16", "2026-08-18"),
("R004", "2026-08-12", "2026-08-20", "2026-08-23");

SELECT julianday(tanggal_check_out) - julianday(tanggal_check_in) 
AS lama_menginap FROM reservasi;