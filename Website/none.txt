CREATE DATABASE db_mahasiswaa;

USE db_mahasiswaa;

CREATE TABLE mahasiswa (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  no_induk VARCHAR(20),
  nama VARCHAR(100),
  jk CHAR(1),
  tgl_lahir DATE,
  alamat VARCHAR(100),
  dosen_pembimbing VARCHAR(100),
  no_telepon VARCHAR(20)
);
