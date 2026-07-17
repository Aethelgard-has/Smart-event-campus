-- ======================================
-- SMART EVENT DATABASE
-- ======================================

DROP TABLE IF EXISTS event;
DROP TABLE IF EXISTS admin;

CREATE TABLE admin (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100) NOT NULL
);

INSERT INTO admin (username, password, nama_lengkap)
VALUES
('admin','admin123','Administrator');

CREATE TABLE event (
    id_event INT AUTO_INCREMENT PRIMARY KEY,
    nama_event VARCHAR(150) NOT NULL,
    jenis_event ENUM('Seminar','Workshop','Pelatihan','Lomba') NOT NULL,
    tanggal DATE NOT NULL,
    lokasi VARCHAR(150) NOT NULL,
    penyelenggara VARCHAR(150) NOT NULL,
    deskripsi TEXT NOT NULL
);

INSERT INTO event
(nama_event, jenis_event, tanggal, lokasi, penyelenggara, deskripsi)
VALUES
(
'Seminar Artificial Intelligence',
'Seminar',
'2026-08-10',
'Aula Universitas Potensi Utama',
'Fakultas Informatika',
'Seminar mengenai perkembangan Artificial Intelligence dan Machine Learning.'
),
(
'Workshop Web Programming',
'Workshop',
'2026-08-18',
'Laboratorium Komputer',
'Himpunan Mahasiswa Informatika',
'Pelatihan membuat website menggunakan HTML, CSS, PHP dan MySQL.'
),
(
'Lomba UI/UX Design',
'Lomba',
'2026-09-01',
'Gedung B',
'BEM Universitas',
'Kompetisi desain antarmahasiswa.'
),
(
'Pelatihan Public Speaking',
'Pelatihan',
'2026-09-15',
'Ruang Seminar',
'UPU Career Center',
'Pelatihan meningkatkan kemampuan presentasi mahasiswa.'
);