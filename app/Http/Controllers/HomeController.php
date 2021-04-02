<?php

namespace App\Http\Controllers;

use App\DataTables\LogDataTable;

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
    public function index(LogDataTable $logDataTable)
    {
        $jumlahPembelianBarang = \App\Models\Barang::count();
        return $logDataTable->render('home', compact('jumlahPembelianBarang'));
    }

}
