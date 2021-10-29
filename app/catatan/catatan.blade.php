<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <p>

        MEMBUAT DATABASE SERTA KONFIGURASINYA

        1. pertama kita akan membuat database kita di phpmyadmin
        2. kemudian kita akan seting di .env untuk menyeting nama database yang telah kita buat
        3. jika suda kita akan membuat model controler serta migrationnya denga cara ketikkan perintah di terminal
        -> [php artisan make:model Pegawai -mc]
        4. kemudian kita akan membuat table secara otomatis kedalam migratiaon yang kita buat tadi yaitu table pegawais
        5. jika suda kita buat tablenya kita lakukan perintah
        -> [php artisan migrate:fresh]

    </p>

    <P>

        MENAMBAHKAN DATA MENGGUNAKAN SEDERS DAN TAMPILKAN

        1. pertama disini kita akan membuat route pada file web.php
        2. kemudian kita akan membuat method di controler kita untuk mengarahkan route kita di controler pegawai serta
        membuat view pegawai
        3. jika suda kita akan mengisi data secara manual menggunakan seeders pada folder seders jika suda maka kita
        ketikkan perinta [php artisan migrate:fresh --seed] agar datanya terisi dan untuk membuat file seder
        [php artisan make:seeder folder]
        4. kemudian kita akan tampilkan datanya pada controler pegawai kita
        5. jika suda kita akan luping menggunaka foreach pada file view pegawai kita

    </P>

    <p>

        MENAMBAHKAN DATA

        1. pertama kita akan membuat view tambah datanya terlebih dahulu
        2. jika suda kita akan membuat route tambahnya pada file web kita
        3. jika suda kita akan buat methot tambahnya pada file controler pegawai kita
        4. jika suda kita akan buat route baru unutk menjalankan proses input datanya dan kita akan membuat methodnya di
        controler pegawai
        5. dan jangan lupa kita tambahkan protected $guarded = ['id']; pada model kita agar idnya di isi otomatis

    </p>

    <p>

        EDIT DATA

        1. pertama kita akan membuat route unutk edit datanya pada file web kita
        2. jika suda kita akan membuat view untuk edit data
        3. jika suda kita akan membuat method untuk menampilkan view edit kita pada controler dan kita akan tangkap
        datanya pada view edit kita
        4. kemudian kita akan membuat route updatenya unutk menjalankan editnya
        5. dak kita akan membuat method updatenya untuk menjalannkan updatenya

    </p>

    <p>

        HAPUS DATA

        1. pertama kita akan membuat route unutk hapus dlu
        2. kemudian kita akan membuat methodnya di controler kita kemudian kita jalankan methodnya

    </p>

    <p>

        UPLOAD IMAGE

        1. pertama kita akan tambahkan filt baru pada table kita dak kita akan buka migration kita unutk table pegawai
        2. jika suda kita tambahkan fild baru maka kita akan [php artidan migrate:fresh --seed]
        3. jika suda kita akan merubah tampilan tambah data kita dan juga view pegawai unutk menampung gambar
        4. kemudian di method insert kita tambahkan pengkondisian untuk mengupload gambarnya

        if ($request->hasFile('gambar')) {
        $request->file('gambar')->move('fotopegawai/', $request->file('gambar')->getClientOriginalName());
        $data->gambar = $request->file('gambar')->getClientOriginalName();
        $data->save();
        //move unutk menyimpan gambarnya
        }

    </p>

    <p>

        MEMBUAT SWICT ALERT DELETE DATA

        1. pertama kita akan copikan cdn nya <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        2. kemudian kita tinggal tentukan untuk pilihan sweetalertnya
        3. dan kemudian kita akan copikan jquerynya agar alertnya berfungsi yang diambil dari webside jquery cdn fersi
        jquery 3.x core 3.6.0 minified
        4. kemudian kita akan memanggil idnya dlu data-id="{{ $d->id }} yang bertujuan unutk menangkap datanya

    </p>

    <p>

        MEMBUAT TOASTR NOTIVIKASI UNUTK TAMBAH DATA

        1. pertama kita akan membuaka link https://cdnjs.com/libraries/toastr.js/latest untuk mencopy pastekan css dan
        js notovikasi kita yaitu toastr
        2. dan jika suda kita akan buka juga link https://github.com/CodeSeven/toastr untuk mengambil toastr bagian
        other option yang ini // Display a success toast, with a title
        toastr.success('Have fun storming the castle!', 'Miracle Max Says')
        3. dan unutk menjalankan ini kita harus gunakan script jquery yang di atas untuk sweetalert
        4. jika suda maka kita akan gunakan pengkondisian untuk menampilkan toastrnya

    </p>

    <p>

        MEMBUAT PAGINATION

        1. untuk membuat pagination kita ketikkan saja di indexnya Pegawai::paginate(5) untuk membatasi 5 data yang
        muncul
        2. dan untuk menampilkan datanya kita perlu tambahkan juga {{ $data->links() }} pada view pegawai kita
        3. kemudian kita akan menmbahkan paginator::useboostrap pada file service providers kita agar tampilan
        paginatioonya terlihat bagus

    </p>

    <p>

        MEMBUAT SEARCHING

        1. pertama kita akan cari form control unutk pencarian dulu
        2. jika suda kita akan membuat pengkondisian di method index kita

    </p>

    <p>

        EXPORT PDF

        1. pertaman kita akan kunjungi web side pdf larafel https://github.com/barryvdh/laravel-dompdf
        2. kemudian kita install [composer require barryvdh/laravel-dompdf] ke dalam terminal kita
        3. jika sda kita install maka kita akan copykan classnya [Barryvdh\DomPDF\ServiceProvider::class,] kedalam
        folder config app bagian providers dan kita cpastekan ['PDF' => Barryvdh\DomPDF\Facade::class,] di bagian
        aliases
        4. kemudian kita akan jalankan publisnya ke terminal kita [php artisan vendor:publish
        --provider="Barryvdh\DomPDF\ServiceProvider"] untuk configurasinya
        5. kemudian kita akan membuat button pada tampilan pegawai kita
        6. kemudian kita akan membuat route unutk pdf kita
        7. kemudian kita akan membuat method di controler pegawai kita

    </p>

    <p>

        EXPORT EXCEL error

        1. pertama kita kunjungi dlu situs https://docs.laravel-excel.com/3.1/getting-started/installation.html
        2. kemudian kita akan install [composer require maatwebsite/excel] kedalam terminal kita

    </p>

    <p>


    </p>

</body>

</html>
