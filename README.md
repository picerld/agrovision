# SCM Agrovision Technology

Agrovision adalah platform berbasis web yang dirancang untuk mendukung digitalisasi sektor pertanian. Proyek ini bertujuan untuk mempermudah manajemen distribusi, pencatatan, dan pelaporan komoditas pertanian dengan menggunakan teknologi modern berbasis Laravel.

---

## 📝 **Backlog Proyek**

### **Epic 1: Manajemen Komoditas**

**Sebagai** admin, **saya ingin** dapat mengelola data komoditas, **sehingga** saya dapat mencatat hasil panen dengan mudah.

-   **User Story 1.1:** Tambahkan komoditas baru dengan nama, masa panen, dan gambar.

    -   **Acceptance Criteria:**
        -   Pengguna dapat mengisi form dengan validasi untuk semua field.
        -   Gambar dapat diunggah menggunakan Dropzone.js.

-   **User Story 1.2:** Edit data komoditas yang sudah ada.

    -   **Acceptance Criteria:**
        -   Pengguna dapat memperbarui informasi komoditas tanpa menghapus data yang ada.

-   **User Story 1.3:** Hapus komoditas.
    -   **Acceptance Criteria:**
        -   Pengguna dapat menghapus komoditas dengan konfirmasi sebelum tindakan.

### **Epic 2: Distribusi Benih dan Pupuk**

**Sebagai** admin, **saya ingin** melihat dan mengelola pendistribusian, **sehingga** saya dapat memastikan alokasi yang tepat.

-   **User Story 2.1:** Tambahkan data distribusi bulanan untuk benih dan pupuk.

    -   **Acceptance Criteria:**
        -   Pengguna dapat memilih jenis komoditas, jumlah, dan tanggal distribusi.

-   **User Story 2.2:** Tampilkan laporan distribusi dalam grafik.
    -   **Acceptance Criteria:**
        -   Data distribusi bulanan divisualisasikan dengan ApexCharts.js.

### **Epic 3: Live Search Menggunakan Datatable**

**Sebagai** pengguna, **saya ingin** mencari data secara langsung, **sehingga** saya dapat menemukan informasi lebih cepat.

-   **User Story 3.1:** Implementasi live search pada tabel data.
    -   **Acceptance Criteria:**
        -   Pencarian memberikan hasil sesuai input tanpa reload halaman.

### **Epic 4: Custom Pagination**

**Sebagai** pengguna, **saya ingin** melihat data dalam tampilan yang teratur, **sehingga** saya dapat menavigasi data dengan mudah.

-   **User Story 4.1:** Tambahkan pagination kustom untuk datatable.
    -   **Acceptance Criteria:**
        -   Data ditampilkan per halaman dengan opsi untuk mengatur jumlah data per halaman.

### **Epic 5: Ekspor Data**

**Sebagai** pengguna, **saya ingin** mengekspor data ke format PDF atau CSV, **sehingga** saya dapat menggunakannya untuk pelaporan.

-   **User Story 6.1:** Implementasi fitur ekspor data.
    -   **Acceptance Criteria:**
        -   Data dapat diunduh dalam format PDF atau CSV sesuai filter yang diterapkan.

---

## 🛠️ **Teknologi yang Digunakan**

-   **Framework**: Laravel 11
-   **Front-End**: TailwindCSS, FlyonUI
-   **JavaScript Library**: ApexCharts.js, Dropzone.js, Preline.js
-   **Database**: MySQL

---

## 📦 **Instalasi dan Konfigurasi**

### Persyaratan

-   PHP >= 8.1
-   Composer
-   Node.js & npm/yarn
-   MySQL

### Langkah Instalasi

1. Clone repositori ini:

    ```bash
    git clone https://github.com/picerld/agrovision.git
    cd agrovision
    ```

2. Instal dependensi menggunakan Composer dan npm:

    ```bash
    composer install
    npm install && npm run dev
    ```

3. Salin file `.env.example` ke `.env` dan sesuaikan konfigurasi database:

    ```bash
    cp .env.example .env
    ```

4. Generate aplikasi key:

    ```bash
    php artisan key:generate
    ```

5. Migrasi dan seeding database:

    ```bash
    php artisan migrate --seed
    ```

6. Jalankan aplikasi:

    ```bash
    php artisan serve
    ```

    Akses aplikasi di `http://localhost:8000`

7. Pada `App/Providers/AppServiceProvider`
    ```bash
        public function boot(): void
        {
            app()->make(PermissionRegistrar::class)->forgetCachedPermissions();
        }
    ```

---

## 🎨 **Kontribusi**

Kami selalu terbuka untuk kontribusi! Jika Anda ingin berkontribusi, ikuti langkah-langkah berikut:

1. Fork repositori ini.
2. Buat branch baru untuk fitur atau perbaikan Anda:
    ```bash
    git checkout -b fitur-anda
    ```
3. Commit perubahan Anda:
    ```bash
    git commit -m "Menambahkan fitur baru"
    ```
4. Push ke branch Anda:
    ```bash
    git push origin fitur-anda
    ```
5. Buat Pull Request.

---

## 📚 **Dokumentasi Tambahan**

-   [Laravel Documentation](https://laravel.com/docs)
-   [FlyonUI Documentation](https://flyonui.com/)
-   [TailwindCSS Documentation](https://tailwindcss.com/docs)

---

## 🤝 **Lisensi**

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

## 🌟 **Dukungan**

Jika Anda menemukan masalah atau memiliki pertanyaan, jangan ragu untuk membuka issue atau menghubungi kami melalui email di info@bedabisa.com.

Terima kasih telah menggunakan Agrovision! 🌾

---

![Logo](https://bedabisa.com/assets/img/logo/logo-bedabisa.png)


