# Dokumentasi Aplikasi

## 1. Teknologi yang Digunakan

Aplikasi ini dibangun dengan teknologi dan layanan berikut:

### **Backend Framework:**
- **CodeIgniter 4**: Framework PHP yang digunakan untuk membangun aplikasi backend. CodeIgniter mempermudah pengembangan aplikasi web dengan pola arsitektur Model-View-Controller (MVC).

### **Database:**
- **PostgreSQL**: Digunakan sebagai database untuk menyimpan data terkait film, seperti detail film dan overview yang diperbarui.

### **Free API:**
- **Dummy JSON API**: API eksternal digunakan untuk mengambil informasi tentang produk, termasuk data seperti nama, detail, dan harga. API ini memungkinkan aplikasi untuk mengakses informasi produk.

---

## 2. Service yang Perlu Disiapkan untuk Menjalankan Website

Untuk menjalankan aplikasi ini dengan lancar, Anda perlu mempersiapkan beberapa layanan dan konfigurasi berikut:

### **Layanan yang Diperlukan:**

#### **Web Server:**
- Anda memerlukan web server seperti **Apache** atau **Nginx** untuk menjalankan aplikasi berbasis PHP. Anda juga harus memastikan **PHP versi 7.4** atau yang lebih baru terinstal di server.

#### **Database:**
- **PostgreSQL** harus terinstal dan berjalan di server. Anda juga perlu membuat database yang sesuai dengan konfigurasi yang terdapat di aplikasi.
- Pastikan tabel yang relevan sudah dibuat di database (misalnya `PRODUCT.DATA_PRODUCT` untuk menyimpan detail film).

---

## 3. Cara Meng-Install Aplikasi

Berikut adalah langkah-langkah untuk menginstall aplikasi ini:

### **Langkah 1: Menyiapkan Web Server**
- Pastikan **PHP 8.0** atau lebih baru sudah terinstal di server Anda.
- Install **Apache** atau **Nginx** sebagai web server.
- Konfigurasi server agar dapat menjalankan aplikasi PHP.

### **Langkah 2: Menyiapkan Database PostgreSQL**
- Install **PostgreSQL** di server Anda.
- restore sql yang diberikan di repo
- Konfigurasi **username** dan **password** database sesuai dengan file konfigurasi aplikasi (`app/config/Database.php`).

### **Langkah 3: Meng-Clone Aplikasi dan Install Dependencies**
- Clone repository aplikasi ini ke server Anda:
    ```bash
    git clone <repository-url>
    cd <folder-aplikasi>
    ```
- Install dependensi menggunakan **Composer**:
    ```bash
    composer install
    ```

### **Langkah 4: Konfigurasi database**
- Sesuaikan pengaturan **database**  anda pada bagian ini:
    ```ini
    database.default.hostname = localhost
    database.default.username = postgres
    database.default.password = rahasia123
    database.default.database = postgres
    ```


### **Langkah 6: Menjalankan Aplikasi**
- Jalankan web server Anda dan pastikan aplikasi dapat diakses melalui browser.
- Buka codingan dan masuk ke terminal, lalu ketik _php spark serve_.
- Aplikasi seharusnya dapat menampilkan data product dan bisa melihat detail dari product tersebut.

---

## 4. ERD (Entity-Relationship Diagram)

Untuk aplikasi ini, berikut adalah desain ERD yang menggambarkan relasi antar entitas dalam aplikasi:

### Tabel: DATA_PRODUCT
| Field    | Tipe Data | Keterangan                                           |
|----------|-----------|------------------------------------------------------|
| **ID**   | INTEGER   | Primary Key, ID film                                |
| **DETAIL_PROD** | TEXT     | Deskripsi atau sinopsis film                        |

**ID**: Tabel ini memiliki relasi satu-ke-satu dengan ID film yang diambil dari TMDb.

