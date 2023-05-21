<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\kategori;
use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $artikel = Artikel::all();
        return view('backend.artikel.index', [
            'artikel' => $artikel,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        $penulis = Penulis::all();
        return view('backend.artikel.create', compact('penulis', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data_saved = array(
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'penulis_id' => $request->penulis_id,
            'body' => $request->body,
            'slug' => Str::slug($request->judul),
            'user_id' => Auth::id(),
            'views' => 0,
            'is_active' => 1,
            'gambar_artikel' => $request->file('gambar_artikel')->store('artikel'),
        );

        Artikel::create($data_saved);
        return redirect()->route('artikel.index')->with(['success' => 'Data Berhasi Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::find($id);
        $kategori = kategori::all();
        $penulis = Penulis::all();
        return view('backend.artikel.edit', compact('artikel', 'penulis', 'kategori'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_saved = array(
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'penulis_id' => $request->penulis_id,
            'body' => $request->body,
            'slug' => Str::slug($request->judul),
            'user_id' => Auth::id(),
            'views' => 0,
            'is_active' => 1,
        );

        $artikel = Artikel::find($id);

        if ($artikel->gambar_artikel) {
            Storage::delete($artikel->gambar_artikel);
        }

        if ($request->hasFile('gambar_artikel')) {
            $gambar_artikel = $request->file('gambar_artikel')->store('artikel');
            $data_saved['gambar_artikel'] = $gambar_artikel;
        }

        $artikel->update($data_saved);

        return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);

        // Hapus file gambar dari storage
        Storage::delete($artikel->gambar_artikel);

        $artikel->delete();

        return redirect()->back();
    }
}
