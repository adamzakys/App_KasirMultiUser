<?php

// app/Http/Controllers/StatistikController.php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index()
    {
        $data = $this->getStatistikData();
        $labels = ['Harian', 'Mingguan', 'Bulanan'];
    
        return view('statistik.index', compact('data', 'labels'));
    }
    
    private function getStatistikData()
    {
        $penjualanHarian = Transaksi::whereDate('created_at', Carbon::today())->count();
        $penjualanMingguan = Transaksi::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $penjualanBulanan = Transaksi::whereMonth('created_at', Carbon::now()->month)->count();
    
        $produkTerlaris = DB::table('transaksi_details')
            ->select('menus.nama_menu', DB::raw('SUM(transaksi_details.jumlah_pesanan) as terjual'))
            ->join('menus', 'transaksi_details.id_menu', '=', 'menus.id_menu')
            ->groupBy('menus.nama_menu')
            ->orderBy('terjual', 'desc')
            ->take(5)
            ->get();
    
        $pendapatanMakanan = Transaksi::whereHas('transaksiDetails.menu.kategori', function ($query) {
            $query->where('nama_kategori', 'Makanan');
        })->sum('total_bayar');
    
        $pendapatanMinuman = Transaksi::whereHas('transaksiDetails.menu.kategori', function ($query) {
            $query->where('nama_kategori', 'Minuman');
        })->sum('total_bayar');
    
        $kinerjaUser = User::withCount(['transaksis as pesanan_diambil' => function ($query) {
            $query->whereDate('created_at', Carbon::today());
        }])->get();
    
        return compact(
            'penjualanHarian',
            'penjualanMingguan',
            'penjualanBulanan',
            'produkTerlaris',
            'pendapatanMakanan',
            'pendapatanMinuman',
            'kinerjaUser'
        );
    }
    

}
