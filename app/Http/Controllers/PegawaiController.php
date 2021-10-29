<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use PDF;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    //disini kita akan membuat methodnya untuk mengarahnka route pertama kita tadi
    public function index(Request $request) // kita akan tambahkan request untuk pencarian kita
    {
        if ($request->has('search')) {
            $data = Pegawai::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Pegawai::paginate(5);
        }
        return view('pegawai', compact('data'), [
            'title' => 'Pegawai'
        ]);

        // unutk menampilkan data kita bisa juga gunakan compact agar bisa menampung varibel diatas
    }

    // method tambah data
    public function tambah()
    {
        return view('tambah', [
            'title' => 'Tambah Data'
        ]);
    }

    // method insert unutk menjalankan input datanya
    public function insert(Request $request)
    {
        $data = Pegawai::create($request->all());
        // disini kita akn request datanya kita unutk memasukkan gambar
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('fotopegawai/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
            //move unutk menyimpan gambarnya
        }
        return redirect('/')->with('success', 'Data berhasil di tambahkan!');
    }

    // method edit unutk menampilkan data
    public function edit($id)
    {
        return view('edit', [
            'title' => 'Edit Data',
            'data' => Pegawai::find($id)
        ]);
    }

    // method update
    public function update(Request $request, $id)
    {
        Pegawai::find($id)->update($request->all());
        return redirect('/')->with('success', 'Data berhasil di ubah!');
    }

    // method hapus
    public function delete($id)
    {
        Pegawai::destroy($id);
        return redirect('/')->with('success', 'Data berhasil di hapus!');
    }

    // method for pdf
    public function export()
    {
        $data = Pegawai::all(); //untuk mengambil semua data
        view()->share('data', $data);
        // kita akan membuat variable baru dan jangan lupa kita import classnya
        $pdf = PDF::loadView('exportpdf'); // kita akan mengarahkan ke view export pdf kita
        return $pdf->download('data Pegawai.pdf'); // pada saat di download nama filenya akan menjadi data pegawai.pdf
    }
}
