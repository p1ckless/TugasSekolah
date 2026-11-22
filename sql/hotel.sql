CREATE DATABASE IF NOT EXISTS db_hotel;
USE db_hotel;

CREATE TABLE tamu (
    id_tamu VARCHAR(10) PRIMARY KEY,
    nama_tamu VARCHAR(100),
    alamat TEXT,
    no_telepon VARCHAR(15),
    email VARCHAR(100)
);

CREATE TABLE kamar (
    no_kamar VARCHAR(10) PRIMARY KEY,
    tipe_kamar VARCHAR(30),
    harga_permalam INT,
    status_kamar VARCHAR(20)
);

CREATE TABLE pembayaran (
    id_pembayaran VARCHAR(10) PRIMARY KEY,
    status_pembayaran VARCHAR(20),
    tanggal_pembayaran DATE,
    total_bayar INT
);

CREATE TABLE petugas (
    id_petugas VARCHAR(10) PRIMARY KEY,
    nama_petugas VARCHAR(100),
    alamat TEXT,
    no_telepon VARCHAR(15),
    jabatan VARCHAR(30)
);

CREATE TABLE reservasi (
    id_reservasi VARCHAR(10) PRIMARY KEY,
    tanggal_reservasi DATE,
    tanggal_check_in DATE,
    tanggal_check_out DATE
);

INSERT INTO tamu (id_tamu, nama_tamu, alamat, no_telepon, email) 
VALUES 
    ('T001', 'Putra', 'Jl. Melati No. 15, Bandung', '081234567890', 'Putra@gmail.com'),
    ('T002', 'Rinjani', 'Jl. Anggrek No. 2, Jakarta', '082345678910', 'Rinjani@gmail.com'), 
    ('T003', 'Syelsi', 'Jl. Tulip No. 23, Jakarta', '089123456789', 'Syelsi@gmail.com');

INSERT INTO kamar (no_kamar, tipe_kamar, harga_permalam, status_kamar) 
VALUES 
    ('K001', 'Standart', 500000, 'Terisi'),
    ('K002', 'Deluxe', 800000, 'Terisi'),
    ('K003', 'Suite', 1000000, 'Tersedia'),
    ('K004', 'Suite', 1000000, 'Dibersihkan');

INSERT INTO pembayaran (id_pembayaran, status_pembayaran, tanggal_pembayaran, total_bayar) 
VALUES 
    ('PB001', 'Lunas', '2026-08-14', 1000000), 
    ('PB002', 'Lunas', '2026-08-15', 500000),
    ('PB003', 'Lunas', '2026-08-16', 800000);

INSERT INTO petugas (id_petugas, nama_petugas, alamat, no_telepon, jabatan) 
VALUES 
    ('P001', 'Heisenberg', 'Jl. Merdeka No. 10, Jakarta', '081234987654', 'Resepsionis'),
    ('P002', 'Sigma', 'Jl. Mawar No. 5, Bandung', '082342015678', 'Admin'),
    ('P003', 'Acar', 'Jl. Daisy No. 23, Bandung', '089234156789', 'Manager');

INSERT INTO reservasi (id_reservasi, tanggal_reservasi, tanggal_check_in, tanggal_check_out)
VALUES 
    ('R001', '2026-08-10', '2026-08-13', '2026-08-14'),
    ('R002', '2026-08-11', '2026-08-14', '2026-08-16'),
    ('R003', '2026-08-12', '2026-08-16', '2026-08-18'),
    ('R004', '2026-08-12', '2026-08-20', '2026-08-23');

SELECT id_reservasi, tanggal_check_in, tanggal_check_out, DATEDIFF(tanggal_check_out, tanggal_check_in) 
AS lama_menginap FROM reservasi;

ALTER TABLE reservasi ADD COLUMN id_tamu VARCHAR(10), ADD COLUMN no_kamar VARCHAR(10), ADD COLUMN id_petugas VARCHAR (10);
ALTER TABLE pembayaran ADD COLUMN id_reservasi VARCHAR(10), ADD COLUMN id_petugas VARCHAR(10);

-- Foregin Key untuk Reservasi
ALTER TABLE reservasi ADD CONSTRAINT fk_reservasi_tamu FOREIGN KEY (id_tamu) REFERENCES tamu(id_tamu);
ALTER TABLE reservasi ADD CONSTRAINT fk_reservasi_petugas FOREIGN KEY (id_petugas) REFERENCES petugas(id_petugas);
ALTER TABLE reservasi ADD CONSTRAINT fk_reservasi_kamar FOREIGN KEY (no_kamar) REFERENCES kamar(no_kamar);

-- Foregin Key untuk Pembayaran
ALTER TABLE pembayaran ADD CONSTRAINT fk_pembayaran_petugas FOREIGN KEY (id_petugas) REFERENCES petugas(id_petugas);
ALTER TABLE pembayaran ADD CONSTRAINT fk_pembayaran_reservasi FOREIGN KEY (id_reservasi) REFERENCES reservasi(id_reservasi);

-- Update data insert yang Lama
UPDATE reservasi SET id_tamu = 'T001', no_kamar = "K001", id_petugas = 'P001' WHERE id_reservasi = 'R001';
UPDATE reservasi SET id_tamu = 'T002', no_kamar = "K002", id_petugas = 'P002' WHERE id_reservasi = 'R002';
UPDATE reservasi SET id_tamu = 'T003', no_kamar = "K003", id_petugas = 'P003' WHERE id_reservasi = 'R003';

UPDATE pembayaran SET id_reservasi = 'R001', id_petugas = 'P001' WHERE id_pembayaran = 'PB001';
UPDATE pembayaran SET id_reservasi = 'R002', id_petugas = 'P002' WHERE id_pembayaran = 'PB002';
UPDATE pembayaran SET id_reservasi = 'R003', id_petugas = 'P003' WHERE id_pembayaran = 'PB003';