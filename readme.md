```markdown
# Tugas Praktikum 8 - Desain Pemrograman Berbasis Objek (TP8DPBO2425C1)

Saya **Mochamamd Azka Basria** dengan NIM **2405170** mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahan-Nya maka saya tidak akan melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

_Repository_ ini berisi implementasi dari pola desain arsitektur **MVC (Model-View-Controller)** menggunakan **PHP** dan **MySQL**. Studi kasus yang diambil adalah sebuah "Music Library" (Perpustakaan Musik), di mana program ini mengelola data relasional antara Artist, Album, Lagu, dan Playlist.

---

## Fitur Utama

Aplikasi ini mengimplementasikan fungsionalitas **CRUD (Create, Read, Update, Delete)** penuh untuk semua entitas data utama:

- **Song (Lagu):**
  - Menampilkan semua lagu beserta album dan artist-nya.
  - Menambah lagu baru ke dalam album tertentu.
  - Mengedit data lagu.
  - Menghapus lagu.
- **Artist:**
  - Menampilkan semua artist.
  - Menambah artist baru.
  - Mengedit nama artist.
  - Menghapus artist.
- **Album:**
  - Menampilkan semua album beserta artist-nya.
  - Menambah album baru untuk artist tertentu.
  - Mengedit data album.
  - Menghapus album.
- **Playlist:**
  - Menampilkan semua playlist yang telah dibuat.
  - Menambah playlist baru.
  - Mengedit nama playlist.
  - Menghapus playlist.
  - **Fitur Detail:** Menampilkan halaman detail untuk **menambah** dan **menghapus** lagu spesifik dari sebuah playlist.

---

## Desain Program & Konsep yang Digunakan

### 1. Pola Arsitektur MVC (Model-View-Controller)

Ini adalah konsep inti dari tugas ini. Arsitektur program dipisahkan menjadi tiga komponen utama:

- **Model:** Bertanggung jawab atas semua logika data dan interaksi dengan _database_.
  - Berisi _query_ SQL (SELECT, INSERT, UPDATE, DELETE).
  - Contoh: `models/Song.php`, `models/Artist.php`.
- **View:** Bertanggung jawab atas logika presentasi dan rendering data ke HTML.
  - Mengambil data yang sudah diproses dari Controller.
  - Mengisi _template_ HTML dengan data.
  - Contoh: `views/SongView.php`, `views/ArtistView.php`.
- **Controller:** Bertindak sebagai "otak" atau perantara.
  - Menerima _request_ dari pengguna (melalui `index.php`, `artist.php`, dll.).
  - Meminta data ke **Model**.
  - Meneruskan data yang didapat ke **View** untuk ditampilkan.
  - Contoh: `controllers/SongController.php`, `controllers/ArtistController.php`.

### 2. Desain Database (ERD)

Database `db_music` [mvc9/db_music.sql] yang digunakan memiliki 5 tabel dengan relasi sebagai berikut:

- `artist` (One) -> `album` (Many)
  - Satu Artist bisa memiliki banyak Album.
- `album` (One) -> `song` (Many)
  - Satu Album bisa memiliki banyak Lagu.
- `playlist` (Many) <-> `song` (Many)
  - Satu Playlist bisa berisi banyak Lagu, dan satu Lagu bisa ada di banyak Playlist.
  - Relasi ini dijembatani oleh tabel `playlist_song`.
```

[artist] 1--\* [album] 1--\* [song] _--_ [playlist\_song] \*--1 [playlist]
(id) (id) (id) (playlist_id) (id)
(name) (title) (title) (song_id) (name)
(artist_id) (album_id)

```markdown
---

## Struktur Proyek

Struktur direktori dirancang untuk memisahkan setiap komponen MVC dengan jelas.
```

.
├── album.php \# Router untuk Album
├── artist.php \# Router untuk Artist
├── index.php \# Router untuk Song (Home)
├── playlist.php \# Router untuk Playlist
├── config.php \# Konfigurasi Database
├── db_music.sql \# File SQL Database
│
├── controllers/
│ ├── AlbumController.php
│ ├── ArtistController.php
│ ├── PlaylistController.php
│ └── SongController.php
│
├── models/
│ ├── Album.php
│ ├── Artist.php
│ ├── DB.php \# Class Database Induk
│ ├── Playlist.php
│ └── Song.php
│
├── views/
│ ├── AlbumView.php
│ ├── AlbumEditView.php
│ ├── ArtistView.php
│ ├── ArtistEditView.php
│ ├── PlaylistView.php
│ ├── PlaylistDetailView.php
│ ├── PlaylistEditView.php
│ ├── SongView.php
│ ├── SongEditView.php
│ └── Template.php \# Class Template Engine
│
└── templates/
├── album.html
├── album_edit.html
├── artist.html
├── artist_edit.html
├── index.html
├── playlist.html
├── playlist_detail.html
├── playlist_edit.html
└── song_edit.html

```markdown
---

## Penjelasan Alur Kerja (Contoh: Halaman Artist)

Berikut adalah alur *request* dari awal hingga akhir saat pengguna mengakses halaman Artist:

1.  **Request:** Pengguna mengakses `artist.php` di browser.
2.  **Routing:** *File* `artist.php` [mvc9/artist.php] menerima *request*. Karena tidak ada `POST` atau `GET` parameter, *file* ini memanggil fungsi `index()` dari `ArtistController`.
3.  **Controller:** `ArtistController->index()` [mvc9/controllers/ArtistController.php] dieksekusi.
4.  **Model:** `Controller` membuat objek `Artist` (dari *model*) dan memanggil `Artist->getArtist()` [mvc9/models/Artist.php].
5.  **Database:** `ArtistModel` menjalankan *query* `SELECT * FROM artist`, dan mengembalikan hasilnya ke `Controller`.
6.  **View:** `Controller` mengambil data tersebut dan meneruskannya ke `ArtistView->render($data)` [mvc9/views/ArtistView.php].
7.  **Template:** `ArtistView` memuat *file* `templates/artist.html` [mvc9/templates/artist.html].
8.  **Render:** `ArtistView` mengganti *placeholder* `DATA_TABEL` di dalam HTML dengan data artist yang sudah diformat.
9.  **Response:** HTML yang sudah jadi dikirimkan kembali ke browser pengguna.

Alur yang sama berlaku untuk semua fitur **Create** (Tambah), **Update** (Edit), dan **Delete** (Hapus), di mana *router* (`artist.php`) akan memanggil fungsi yang berbeda di *controller* (misal: `add()`, `update()`, `delete()`).

---

## Dokumentasi Program (Screenshot)

_(Silakan tambahkan screenshot atau screen record Anda di sini. Berikut adalah daftar yang direkomendasikan)_

### 1. Halaman Utama (Daftar Lagu)

![Halaman Utama](URL_SCREENSHOT_ANDA_DI_SINI)

### 2. Halaman CRUD Artist

![Halaman Artist](URL_SCREENSHOT_ANDA_DI_SINI)

### 3. Halaman CRUD Album

![Halaman Album](URL_SCREENSHOT_ANDA_DI_SINI)

### 4. Halaman CRUD Playlist (Daftar)

![Halaman Playlist](URL_SCREENSHOT_ANDA_DI_SINI)

### 5. Halaman Form Edit (Contoh: Edit Album)

![Form Edit Album](URL_SCREENSHOT_ANDA_DI_SINI)

### 6. Halaman Detail Playlist (Fitur Inti)

![Detail Playlist](URL_SCREENSHOT_ANDA_DI_SINI)
```
