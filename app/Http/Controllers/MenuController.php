<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('kategori')->get();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('menus.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga_menu' => 'required',
            'id_kategori' => 'required',
        ]);

        Menu::create($request->all());

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit(Menu $menu)
    {
        
        $kategoris = Kategori::all();
        return view('menus.edit', compact('menu', 'kategoris'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga_menu' => 'required',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
        ]);

        $menu->nama_menu = $request->nama_menu;
        $menu->harga_menu = $request->harga_menu;
        $menu->id_kategori = $request->id_kategori;
        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        // Periksa apakah ada transaksi terkait
        // $transaksiTerkait = TransaksiDetail::where('id_menu', $menu->id_menu)->exists();

        // if ($transaksiTerkait) {
        //     // Jika ada transaksi terkait, kirim pesan kesalahan
        //     return redirect()->route('menus.index')->with('success', 'Menu memiliki transaksi terkait. Tidak dapat dihapus.');
        // }
        // Jika tidak ada transaksi terkait, hapus menu
        $menu->delete();

        // Setelah penghapusan, kirim pesan sukses
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }

    public function show($id_menu)
    {
        $menu = Menu::findOrFail($id_menu);

        return view('menus.show', compact('menu'));
    }
}
