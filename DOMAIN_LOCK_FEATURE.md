# Fitur Otomatisasi Pembuatan File View dan Kunci Nama Domain

## Deskripsi
Fitur ini mengimplementasikan otomatisasi pembuatan file view dan kunci (lock) nama domain saat pengguna menyimpannya untuk pertama kali dari dashboard.

## Alur Kerja

### 1. Pengguna Mengisi Domain
- Pengguna mengisi dan menyimpan nama domain unik untuk tokonya di dashboard
- Sistem memvalidasi domain untuk memastikan keunikan

### 2. Otomatisasi Pembuatan File View
Setelah domain disimpan, sistem secara otomatis:
- Membuat direktori `resources/views/storefronts/{domain}/`
- Membuat file `index.blade.php` dengan konten yang meng-extend tema yang dipilih
- Menggunakan tema default 'horizon' jika belum ada tema yang dipilih

### 3. Kunci Domain (Immutable)
- Setelah domain disimpan, pengguna tidak dapat mengubahnya lagi
- Frontend menampilkan pesan bahwa domain tidak dapat diubah
- Backend mengabaikan request perubahan domain jika sudah ada

## Implementasi Teknis

### Backend Changes

#### DashboardController.php
```php
// Mencegah perubahan domain jika sudah ada
if ($request->has('domain') && $store && !empty($store->domain)) {
    $request->request->remove('domain');
}

// Otomatisasi pembuatan file view
if ($request->has('domain') && !empty($store->domain)) {
    $domain = $store->domain;
    $selectedTheme = $store->selected_theme ?? 'horizon';
    
    $directoryPath = resource_path('views/storefronts/' . $domain);
    
    if (!File::isDirectory($directoryPath)) {
        File::makeDirectory($directoryPath, 0755, true);
    }
    
    $bladeContent = "@extends('themes.' . '{$selectedTheme}')";
    File::put($directoryPath . '/index.blade.php', $bladeContent);
}
```

#### StorefrontController.php
```php
// Menggunakan view dari direktori storefronts
$templateView = "storefronts.{$userDomain}.index";
return view($templateView, $storeData);
```

### Frontend Changes

#### dashboard.blade.php
- Menampilkan domain yang sudah disimpan dengan pesan bahwa tidak dapat diubah
- Menyembunyikan form input jika domain sudah ada
- Menampilkan pesan informatif tentang status domain

## Struktur File yang Dibuat

```
resources/views/
├── storefronts/
│   ├── domain1/
│   │   └── index.blade.php
│   ├── domain2/
│   │   └── index.blade.php
│   └── ...
└── themes/
    ├── horizon.blade.php
    ├── craft.blade.php
    └── sense.blade.php
```

## Keuntungan

1. **Isolasi View**: Setiap domain memiliki direktori view sendiri
2. **Kustomisasi Per-Domain**: Memungkinkan kustomisasi tampilan per domain
3. **Keamanan**: Domain tidak dapat diubah setelah disimpan
4. **Otomatisasi**: Tidak perlu manual membuat file view
5. **Skalabilitas**: Mudah untuk menambah fitur kustomisasi per domain

## Testing

Untuk menguji fitur ini:

1. Login ke dashboard
2. Isi domain untuk pertama kali
3. Simpan domain
4. Cek bahwa file view dibuat di `resources/views/storefronts/{domain}/`
5. Coba ubah domain - seharusnya tidak bisa
6. Akses storefront melalui domain yang dibuat

## Catatan Penting

- Domain bersifat immutable setelah disimpan
- File view otomatis dibuat dengan extend tema yang dipilih
- Struktur direktori dibuat secara otomatis
- Fallback ke tema 'horizon' jika belum ada tema yang dipilih 