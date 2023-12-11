<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // Mendapatkan informasi user yang sedang login
        $userInfo = auth()->user();

        // Menghitung jumlah transaksi yang diambil oleh user
        $kinerjaUser = Transaksi::where('id_user', $userInfo->id)
            ->whereDate('created_at', Carbon::today())
            ->count();
          // Mendapatkan data transaksi berdasarkan tanggal
        $dataTransaksi = Transaksi::where('id_user', $userInfo->id)
            ->whereDate('created_at', '>=', Carbon::today()->subDays(7))
            ->whereDate('created_at', '<=', Carbon::today())
            ->get();

            // Menginisialisasi array data untuk diagram
            $data = [];
            foreach ($dataTransaksi as $transaksi) {
            $tanggal = Carbon::parse($transaksi->created_at)->format('d-M');
            $jumlah = $transaksi->jumlah;
            $data[] = [
                $tanggal,
                $jumlah,
            ];
        }
        // Mendapatkan produk yang sering dilayani oleh user
        $produkTerlayani = Transaksi::select('menus.nama_menu as nama_produk')
            ->join('transaksi_details', 'transaksis.id_transaksi', '=', 'transaksi_details.id_transaksi')
            ->join('menus', 'transaksi_details.id_menu', '=', 'menus.id_menu')
            ->where('transaksis.id_user', $userInfo->id)
            ->groupBy('menus.nama_menu')
            ->orderByDesc('jumlah_layanan')
            ->selectRaw('COUNT(transaksi_details.id_menu) as jumlah_layanan')
            ->take(5)
            ->get();

        return view('home.index', compact('userInfo', 'kinerjaUser', 'produkTerlayani'));
    }
}