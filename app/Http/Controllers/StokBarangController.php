<?php

namespace App\Http\Controllers;

use App\DataTables\StokBarangDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStokBarangRequest;
use App\Http\Requests\UpdateStokBarangRequest;
use App\Repositories\StokBarangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;

class StokBarangController extends AppBaseController
{
    /** @var  StokBarangRepository */
    private $stokBarangRepository;

    public function __construct(StokBarangRepository $stokBarangRepo)
    {
        $this->stokBarangRepository = $stokBarangRepo;
    }

    /**
     * Display a listing of the StokBarang.
     *
     * @param StokBarangDataTable $stokBarangDataTable
     * @return Response
     */
    public function index(StokBarangDataTable $stokBarangDataTable)
    {
        return $stokBarangDataTable->render('stok_barangs.index');
    }

    /**
     * Show the form for creating a new StokBarang.
     *
     * @return Response
     */
    public function create()
    {
        $barangs = \App\Models\Barang::get();
        $isEdit = false;
        return view('stok_barangs.create', compact('barangs', 'isEdit'));
    }

    /**
     * Store a newly created StokBarang in storage.
     *
     * @param CreateStokBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateStokBarangRequest $request)
    {
        $input = $request->all();

        $input['created_by'] = Auth::id();

        $stokBarang = $this->stokBarangRepository->create($input);

        Flash::success('Stok Barang saved successfully.');

        return redirect(route('stokBarangs.index'));
    }

    /**
     * Display the specified StokBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stokBarang = $this->stokBarangRepository->find($id);

        if (empty($stokBarang)) {
            Flash::error('Stok Barang not found');

            return redirect(route('stokBarangs.index'));
        }

        return view('stok_barangs.show')->with('stokBarang', $stokBarang);
    }

    /**
     * Show the form for editing the specified StokBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stokBarang = $this->stokBarangRepository->find($id);

        if (empty($stokBarang)) {
            Flash::error('Stok Barang not found');

            return redirect(route('stokBarangs.index'));
        }
        $barangs = \App\Models\Barang::get();
        $isEdit = true;
        return view('stok_barangs.edit', compact('stokBarang', 'isEdit', 'barangs'));
    }

    /**
     * Update the specified StokBarang in storage.
     *
     * @param  int              $id
     * @param UpdateStokBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStokBarangRequest $request)
    {
        $stokBarang = $this->stokBarangRepository->find($id);

        if (empty($stokBarang)) {
            Flash::error('Stok Barang not found');

            return redirect(route('stokBarangs.index'));
        }

        $input = $request->all();

        $barang = \App\Models\Barang::findOrFail($stokBarang->barang_id);

        if($input['tambah_stok'] != null || $input['tambah_stok'] != ""){
            $input['qty'] = $stokBarang->qty + $input['tambah_stok'];
            // $barang->qty_pembelian += $input['tambah_stok'];
            // $barang->save();
        }

        if($input['keluar_stok'] != null || $input['keluar_stok'] != ""){
            $input['qty'] = $stokBarang->qty - $input['keluar_stok'];
            // $barang->qty_pembelian -= $input['keluar_stok'];
            // $barang->save();
        }

        $input['updated_by'] = Auth::id();
        
        $stokBarang = $this->stokBarangRepository->update($input, $id);
        Flash::success('Stok Barang updated successfully.');

        return redirect(route('stokBarangs.index'));
    }

    /**
     * Remove the specified StokBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stokBarang = $this->stokBarangRepository->find($id);

        if (empty($stokBarang)) {
            Flash::error('Stok Barang not found');

            return redirect(route('stokBarangs.index'));
        }

        $input['deleted_by'] = Auth::id();

        $this->stokBarangRepository->update($input, $id);

        /// hapus juga data pembelian barang
        // $barang = \App\Models\Barang::findOrFail($stokBarang->barang_id);
        // $barang->delete();

        /// setelah sukses hapus barang, hapus stok barang
        $this->stokBarangRepository->delete($id);

        Flash::success('Stok Barang deleted successfully.');

        return redirect(route('stokBarangs.index'));
    }
}
