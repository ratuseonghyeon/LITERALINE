# Pembagian Peran Tim Literaline

Literaline merupakan platform membaca digital yang dikembangkan menggunakan PHP Native dan MySQL. Dalam proses pengembangannya, setiap anggota tim memiliki tanggung jawab pada bagian atau folder tertentu agar pengerjaan project lebih terstruktur.

## Pembagian Peran

| No | Anggota    | Bagian/Folder           | Tanggung Jawab                                                                               |
| -- | ---------- | ----------------------- | -------------------------------------------------------------------------------------------- |
| 1  | Ratu       | `auth/`                 | Mengembangkan sistem login, logout, session, pengecekan login, dan hak akses user/admin.     |
| 2  | Silvi/Cipi | `admin/`                | Mengembangkan dashboard admin serta fitur pengelolaan data melalui CRUD.                     |
| 3  | Ayu        | `database/` & `config/` | Mengatur database, tabel, relasi antar tabel, serta koneksi database.                        |
| 4  | Jihan      | `stories/`              | Mengembangkan fitur cerita/buku, daftar cerita, detail cerita, kategori, dan filter.         |
| 5  | Airin      | `chapters/`             | Mengembangkan fitur chapter dan halaman membaca cerita.                                      |
| 6  | Hasna      | `user/` & `profile/`    | Mengembangkan dashboard user, halaman profile, bio, foto, liked stories, dan saved stories.  |
| 7  | Faira      | `layout/` & `assets/`   | Mengembangkan header, navbar, footer, CSS, serta tampilan umum yang digunakan dalam project. |

## Teknologi yang Digunakan

* PHP Native
* MySQL
* HTML
* CSS
* JavaScript
* Laragon
* Git & GitHub

## Kolaborasi

Setiap anggota mengerjakan bagian yang telah ditentukan sesuai dengan pembagian tugas. Hasil pengerjaan dikembangkan dalam satu repository GitHub Literaline agar project dapat dikerjakan secara bersama-sama dan terorganisir.

Setiap perubahan pada bagian yang berkaitan dengan bagian anggota lain akan dikomunikasikan terlebih dahulu untuk menghindari konflik dan error pada project.

## Struktur Pembagian Project

```text
Literaline/
│
├── auth/             → Ratu
├── admin/            → Silvi/Cipi
├── database/         → Ayu
├── config/           → Ayu
├── stories/          → Jihan
├── chapters/         → Airin
├── user/             → Hasna
├── profile/          → Hasna
├── layout/           → Faira
├── assets/           → Faira
└── index.php
```
