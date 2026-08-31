CREATE DATABASE db_mahasiswaP;

USE db_mahasiswaP;

CREATE TABLE mahasiswa (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  noinduk VARCHAR(20),
  nama VARCHAR(100),
  jk CHAR(1),
  tgllahir DATE,
  alamat VARCHAR(100),
  dosen_pembimbing VARCHAR(100),
  telp VARCHAR(20)
);
