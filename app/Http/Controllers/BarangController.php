<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;

class BarangController extends Controller
{
   public function index(): View
   {
      $barang = Barang::latest()->paginate(5);
      return view('barang.index', compact('barang'));
   }

   public function create(): View
   {
      return view('barang.create');
   }
  
   public function store(Request $request): RedirectResponse
   {
      $request->validate([
         'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
         'nama' => 'required|min:5',
         'keterangan' => 'required|min:10',
         'harga' => 'required|numeric',
         'stok' => 'required|numeric'
      ]);

      $gambar = $request->file('gambar');
      $gambar->storeAs('barang', $gambar->hashName(), 'public');

      $barang = new Barang();
      $barang->gambar = $gambar->hashName();
      $barang->nama = $request->nama;
      $barang->keterangan = $request->keterangan;
      $barang->harga = $request->harga;
      $barang->stok = $request->stok;
      $barang->save();

      // redirect based on user type
      if (session('user_type') === 'admin') {
         return redirect()->route('admin.barang')->with(['success' => 'Data Berhasil Disimpan!']);
      }
      return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
   }

   public function show(string $id): View
   {
      $barang = Barang::findOrFail($id);
      return view('barang.show', compact('barang'));
   }

   public function edit(string $id): View
   {
      $barang = Barang::findOrFail($id);
      return view('barang.edit', compact('barang'));
   }

   public function update(Request $request, $id): RedirectResponse
   {
      // validate form
      $request->validate([
         'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
         'nama' => 'required|min:5',
         'keterangan' => 'required|min:10',
         'harga' => 'required|numeric',
         'stok' => 'required|numeric'
      ]);

      // get product by ID
      $barang = Barang::findOrFail($id);

      // check if image is uploaded
      if ($request->hasFile('gambar')) {
         // delete old image
         Storage::disk('public')->delete('barang/' . $barang->gambar);
         // upload new image
         $gambar = $request->file('gambar');
         $gambar->storeAs('barang', $gambar->hashName(), 'public');
         // update product with new image
         $barang->update([
            'gambar' => $gambar->hashName(),
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga,
            'stok' => $request->stok
         ]);
      } else {
         // update product without image
         $barang->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga,
            'stok' => $request->stok
         ]);
      }

      // redirect based on user type
      if (session('user_type') === 'admin') {
         return redirect()->route('admin.barang')->with(['success' => 'Data Berhasil Diubah!']);
      }
      return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
   }

   public function destroy(string $id): RedirectResponse
   {
      $barang = Barang::findOrFail($id);
      Storage::disk('public')->delete('barang/' . $barang->gambar);
      $barang->delete();
      if (session('user_type') === 'admin') {
         return redirect()->route('admin.barang')->with(['success' => 'Data Berhasil dihapus']);
      }
      return redirect()->route('barang.index')->with(['success' => 'Data Berhasil dihapus']);
   }
}

