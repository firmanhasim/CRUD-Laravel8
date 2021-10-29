<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- css toastr js dan cssnya juga kita copikan disini --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Halaman || {{ $title }}</title>
</head>

<body>
    <h1 class="text-center mt-5 mb-2">Data Pegawai</h1>

    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <a href="/tambah" class="btn btn-primary btn-sm mb-3">+ Tambah</a>
                <a href="/export" class="btn btn-warning btn-sm mb-3"> Export PDF</a>
            </div>
            <div class="col-2">
                <div class="row g-3 align-items-center mb-2 mr-5">

                    <div class="col-auto">
                        <form action="/" method="GET">
                            <input type="text" name="search" id="inputPassword6" class="form-control"
                                placeholder="Cari..." value="{{ request('search') }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-lg-12">
            <table class="table table-bordered">
                <tr align="center">
                    <th width="20px">No</th>
                    <th>Nama</th>
                    <th width="40">Gambar</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telepon</th>
                    <th>Di Buat</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($data as $no => $d)
                    {{-- kita tambahkan $no unutk mengurutkan nomor datanya --}}
                    <tr>
                        <td align="center">{{ $no + $data->firstItem() }}</td>
                        <td>{{ $d->nama }}</td>
                        <td align="center">
                            <img src="{{ asset('fotopegawai/' . $d->gambar) }}" alt="" style="width: 40px">
                        </td>
                        <td>{{ $d->jenis_kelamin }}</td>
                        <td>+62 {{ $d->no_telepon }}</td>
                        <td>{{ $d->created_at->format('d M Y') }}</td>
                        {{-- diffForHumans() --}}
                        <td width="150" align="center">
                            <a href="/edit/{{ $d->id }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger delete btn-sm" data-id="{{ $d->id }}"
                                data-nama="{{ $d->nama }}">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{-- karena dya berada di luar lupingan jadi kita panggil $data --}}
            {{ $data->links() }}
        </div>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    {{-- sweetalert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- jquery cdn --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- toastr js kita akan pastekan disini untuk scriptnya --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

{{-- disini kita akan paste tempat pemberitahuaanya --}}
<script>
    //kita akan menangkap tombol deletenya berdasarkan class
    $('.delete').click(function() {
        // untuk memanggil id kita akan membuat variabel baru
        var pegawaiid = $(this).attr('data-id'); // unutk menangkap id
        var nama = $(this).attr('data-nama');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Anda akan menghapus data " + nama + "!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes..!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/delete/" + pegawaiid + ""
                Swal.fire(
                    'Berhasiil!',
                    'Anda berhasil menghapus data ' + nama + '.',
                    'success'
                )
            }
        });
    });
</script>

<script>
    // notivikasi sukses menggunakan toastr dan kita akan lakukan pengkondisian
    @if (session()->has('success'))
        toastr.success('{{ session('success') }}')
    @endif
</script>

</html>
