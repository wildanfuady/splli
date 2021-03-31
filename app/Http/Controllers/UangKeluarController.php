<?php

namespace App\Http\Controllers;

use App\DataTables\UangKeluarDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUangKeluarRequest;
use App\Http\Requests\UpdateUangKeluarRequest;
use App\Repositories\UangKeluarRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UangKeluarController extends AppBaseController
{
    /** @var  UangKeluarRepository */
    private $uangKeluarRepository;

    public function __construct(UangKeluarRepository $uangKeluarRepo)
    {
        $this->uangKeluarRepository = $uangKeluarRepo;
    }

    /**
     * Display a listing of the UangKeluar.
     *
     * @param UangKeluarDataTable $uangKeluarDataTable
     * @return Response
     */
    public function index(UangKeluarDataTable $uangKeluarDataTable)
    {
        return $uangKeluarDataTable->render('uang_keluars.index');
    }

    /**
     * Show the form for creating a new UangKeluar.
     *
     * @return Response
     */
    public function create()
    {
        return view('uang_keluars.create');
    }

    /**
     * Store a newly created UangKeluar in storage.
     *
     * @param CreateUangKeluarRequest $request
     *
     * @return Response
     */
    public function store(CreateUangKeluarRequest $request)
    {
        $input = $request->all();

        $uangKeluar = $this->uangKeluarRepository->create($input);

        Flash::success('Uang Keluar saved successfully.');

        return redirect(route('uangKeluars.index'));
    }

    /**
     * Display the specified UangKeluar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $uangKeluar = $this->uangKeluarRepository->find($id);

        if (empty($uangKeluar)) {
            Flash::error('Uang Keluar not found');

            return redirect(route('uangKeluars.index'));
        }

        return view('uang_keluars.show')->with('uangKeluar', $uangKeluar);
    }

    /**
     * Show the form for editing the specified UangKeluar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $uangKeluar = $this->uangKeluarRepository->find($id);

        if (empty($uangKeluar)) {
            Flash::error('Uang Keluar not found');

            return redirect(route('uangKeluars.index'));
        }

        return view('uang_keluars.edit')->with('uangKeluar', $uangKeluar);
    }

    /**
     * Update the specified UangKeluar in storage.
     *
     * @param  int              $id
     * @param UpdateUangKeluarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUangKeluarRequest $request)
    {
        $uangKeluar = $this->uangKeluarRepository->find($id);

        if (empty($uangKeluar)) {
            Flash::error('Uang Keluar not found');

            return redirect(route('uangKeluars.index'));
        }

        $uangKeluar = $this->uangKeluarRepository->update($request->all(), $id);

        Flash::success('Uang Keluar updated successfully.');

        return redirect(route('uangKeluars.index'));
    }

    /**
     * Remove the specified UangKeluar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $uangKeluar = $this->uangKeluarRepository->find($id);

        if (empty($uangKeluar)) {
            Flash::error('Uang Keluar not found');

            return redirect(route('uangKeluars.index'));
        }

        $this->uangKeluarRepository->delete($id);

        Flash::success('Uang Keluar deleted successfully.');

        return redirect(route('uangKeluars.index'));
    }
}
