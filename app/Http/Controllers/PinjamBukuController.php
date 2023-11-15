<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use App\Models\PinjamBuku;

class PinjamBukuController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(){
        //get pinjamBuku
        $pinjamBuku = Buku::where('id_penerbit', '!=', auth()->id())
            ->where('status', 'Tersedia')
            ->paginate(5);
        //render view with posts
        return view('pinjamBuku.index', compact('pinjamBuku'));
    }
    /**
     * edit
     *
     * @param int $id
     * @return void
     */
    public function edit($id){
        $pinjamBuku = Buku::find($id);
        return view('pinjamBuku.index', compact('pinjamBuku'));
    }
    /**
     * update
     *
     * @param mixed $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id){
        $pinjamBuku  = Buku::find($id);
        //validate form 
        $pinjamBuku->update([
            'status' => 'Dipinjam',
        ]);
        return redirect()->route('pinjamBuku.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}
