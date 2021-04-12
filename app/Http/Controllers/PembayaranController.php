<?php

namespace App\Http\Controllers;

use App\DataTables\PembayaranDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Repositories\PembayaranRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PembayaranController extends AppBaseController
{
    /** @var  PembayaranRepository */
    private $pembayaranRepository;

    public function __construct(PembayaranRepository $pembayaranRepo)
    {
        $this->pembayaranRepository = $pembayaranRepo;
    }

    /**
     * Display a listing of the Pembayaran.
     *
     * @param PembayaranDataTable $pembayaranDataTable
     * @return Response
     */
    public function index(PembayaranDataTable $pembayaranDataTable)
    {
        return $pembayaranDataTable->render('pembayarans.index');
    }

    /**
     * Show the form for creating a new Pembayaran.
     *
     * @return Response
     */
    public function create()
    {
        $stokBarang = \App\Models\StokBarang::pluck('barang_id');
        $barangs = \App\Models\Barang::whereIn('id', $stokBarang)->get();
        $isEdit = false;
        return view('pembayarans.create', compact('barangs', 'isEdit'));
    }

    /**
     * Store a newly created Pembayaran in storage.
     *
     * @param CreatePembayaranRequest $request
     *
     * @return Response
     */
    public function store(CreatePembayaranRequest $request)
    {
        $input = $request->all();

        $input['tanggal'] = date('Y-m-d H:i', strtotime($request->tanggal));
        $input['barang_id'] = $request->barang_id;

        /// delete space
        $plat = str_replace(" ", "", $request->plat_motor);
        $tanggal = str_replace(" ", "", $request->tanggal);

        /// otomatis membuat id po ambil dari plat dan tanggal
        $idPo = substr($plat, 0, 2).substr($tanggal, 0, 2).rand(111,999);
        $input['id_po'] = $idPo;

        $pembayaran = $this->pembayaranRepository->create($input);

        Flash::success('Pembayaran saved successfully.');

        return redirect(route('pembayarans.index'));
    }

    /**
     * Display the specified Pembayaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pembayaran = $this->pembayaranRepository->find($id);

        if (empty($pembayaran)) {
            Flash::error('Pembayaran not found');

            return redirect(route('pembayarans.index'));
        }

        return view('pembayarans.show')->with('pembayaran', $pembayaran);
    }

    /**
     * Show the form for editing the specified Pembayaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pembayaran = $this->pembayaranRepository->find($id);

        if (empty($pembayaran)) {
            Flash::error('Pembayaran not found');

            return redirect(route('pembayarans.index'));
        }   

        $stokBarang = \App\Models\StokBarang::pluck('barang_id');
        $barangs = \App\Models\Barang::whereIn('id', $stokBarang)->get();
        $isEdit = true;

        return view('pembayarans.edit', compact('barangs', 'isEdit', 'pembayaran'));
    }

    /**
     * Update the specified Pembayaran in storage.
     *
     * @param  int              $id
     * @param UpdatePembayaranRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePembayaranRequest $request)
    {
        $pembayaran = $this->pembayaranRepository->find($id);

        if (empty($pembayaran)) {
            Flash::error('Pembayaran not found');

            return redirect(route('pembayarans.index'));
        }
        $input = $request->all();
        $input['barang_id'] = $request->barang_id;
        $input['tanggal'] = date('Y-m-d H:i', strtotime($request->tanggal));

        /// delete space
        $plat = str_replace(" ", "", $request->plat_motor);
        $tanggal = str_replace(" ", "", $request->tanggal);

        /// otomatis membuat id po ambil dari plat dan tanggal
        $idPo = substr($plat, 0, 2).substr($tanggal, 0, 2).rand(111,999);
        $input['id_po'] = $idPo;

        $pembayaran = $this->pembayaranRepository->update($input, $id);

        Flash::success('Pembayaran updated successfully.');

        return redirect(route('pembayarans.index'));
    }

    /**
     * Remove the specified Pembayaran from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pembayaran = $this->pembayaranRepository->find($id);

        if (empty($pembayaran)) {
            Flash::error('Pembayaran not found');

            return redirect(route('pembayarans.index'));
        }

        $this->pembayaranRepository->delete($id);

        Flash::success('Pembayaran deleted successfully.');

        return redirect(route('pembayarans.index'));
    }
}
