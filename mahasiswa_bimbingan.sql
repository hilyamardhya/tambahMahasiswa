CREATE DATABASE bimbingan_mahasiswa;

USE bimbingan_mahasiswa;

CREATE TABLE mahasiswa_bimbingan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nim VARCHAR(15) NOT NULL,
  nama VARCHAR(50) NOT NULL,
  dosen_pembimbing VARCHAR(50),
  jurusan VARCHAR(50)
);
