<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;

class BukuController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(){
        //get buku
        $buku = Buku::latest()->paginate(5);
        //render view with posts
        return view('buku.index', compact('buku'));
    }
    /**
     * create
     *
     * @@return void
     */
    public function create(){
        return view('buku.create');
    }
     /**
     * store
     *
     * @param Request $request * @return void
     */
    public function store(Request $request){
        $currentUserId = auth()->id();
        //Validasi Formulir
        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required',
        ]);
        $filename = 'Tersedia';

        //Fungsi Simpan Data ke dalam Database
        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'id_penerbit' => $currentUserId,
            'status' => $filename,
        ]);

        try{
            return redirect()->route('buku.index');
        }catch(Exception $e){
            return redirect()->route('buku.index');
        }
    }
    /**
     * edit
     *
     * @param int $id
     * @return void
     */
    public function edit($id){
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }
    /**
     * update
     *
     * @param mixed $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id){
        $buku = Buku::find($id);
        //validate form
        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required',
        ]);
        
        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
        ]);
        return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param int $id
     * @return void
     */
    public function destroy($id){
        $buku = Buku::find($id);
        $buku->delete();
        return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
