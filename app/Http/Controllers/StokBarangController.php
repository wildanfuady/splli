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
        return view('stok_barangs.create');
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

        return view('stok_barangs.edit')->with('stokBarang', $stokBarang);
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

        $stokBarang = $this->stokBarangRepository->update($request->all(), $id);

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

        $this->stokBarangRepository->delete($id);

        Flash::success('Stok Barang deleted successfully.');

        return redirect(route('stokBarangs.index'));
    }
}
