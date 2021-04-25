<?php

namespace App\Http\Controllers;

use App\DataTables\LogDataTable;
use App\DataTables\StokBarangDataTable;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LogDataTable $logDataTable, StokBarangDataTable $stokBarangDataTable)
    {
        $jumlahPembelianBarang = \App\Models\Barang::count();
        $jumlahUangKeluar = \App\Models\UangKeluar::sum('total_harga');
        $jumlahUangDiluar = \App\Models\UangDiluar::sum('sisa_hutang');

        $logs = \App\Models\Log::limit(10)->get();
        $stokBarangs = \App\Models\StokBarang::where('qty', '<=', 20)->paginate(10);

        return view('home', compact('jumlahPembelianBarang', 'jumlahUangKeluar', 'jumlahUangDiluar', 'logs', 'stokBarangs'));
    }

}
