<?php

namespace App\Http\Controllers;

use App\DataTables\UangDiluarDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUangDiluarRequest;
use App\Http\Requests\UpdateUangDiluarRequest;
use App\Repositories\UangDiluarRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Auth;

class UangDiluarController extends AppBaseController
{
    /** @var  UangDiluarRepository */
    private $uangDiluarRepository;

    public function __construct(UangDiluarRepository $uangDiluarRepo)
    {
        $this->uangDiluarRepository = $uangDiluarRepo;
    }

    /**
     * Display a listing of the UangDiluar.
     *
     * @param UangDiluarDataTable $uangDiluarDataTable
     * @return Response
     */
    public function index(UangDiluarDataTable $uangDiluarDataTable)
    {
        return $uangDiluarDataTable->render('uang_diluars.index');
    }

    /**
     * Show the form for creating a new UangDiluar.
     *
     * @return Response
     */
    public function create()
    {
        return view('uang_diluars.create');
    }

    /**
     * Store a newly created UangDiluar in storage.
     *
     * @param CreateUangDiluarRequest $request
     *
     * @return Response
     */
    public function store(CreateUangDiluarRequest $request)
    {
        $input = $request->all();

        $input['created_by'] = Auth::id();

        $uangDiluar = $this->uangDiluarRepository->create($input);

        Flash::success('Uang Diluar saved successfully.');

        return redirect(route('uangDiluars.index'));
    }

    /**
     * Display the specified UangDiluar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $uangDiluar = $this->uangDiluarRepository->find($id);

        if (empty($uangDiluar)) {
            Flash::error('Uang Diluar not found');

            return redirect(route('uangDiluars.index'));
        }

        return view('uang_diluars.show')->with('uangDiluar', $uangDiluar);
    }

    /**
     * Show the form for editing the specified UangDiluar.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $uangDiluar = $this->uangDiluarRepository->find($id);

        if (empty($uangDiluar)) {
            Flash::error('Uang Diluar not found');

            return redirect(route('uangDiluars.index'));
        }

        return view('uang_diluars.edit')->with('uangDiluar', $uangDiluar);
    }

    /**
     * Update the specified UangDiluar in storage.
     *
     * @param  int              $id
     * @param UpdateUangDiluarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUangDiluarRequest $request)
    {
        $uangDiluar = $this->uangDiluarRepository->find($id);

        if (empty($uangDiluar)) {
            Flash::error('Uang Diluar not found');

            return redirect(route('uangDiluars.index'));
        }

        $input = $request->all();

        $input['updated_by'] = Auth::id();

        $uangDiluar = $this->uangDiluarRepository->update($input, $id);

        Flash::success('Uang Diluar updated successfully.');

        return redirect(route('uangDiluars.index'));
    }

    /**
     * Remove the specified UangDiluar from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $uangDiluar = $this->uangDiluarRepository->find($id);

        if (empty($uangDiluar)) {
            Flash::error('Uang Diluar not found');

            return redirect(route('uangDiluars.index'));
        }

        $input['deleted_by'] = Auth::id();

        $this->stokBarangRepository->update($input, $id);

        $this->uangDiluarRepository->delete($id);

        Flash::success('Uang Diluar deleted successfully.');

        return redirect(route('uangDiluars.index'));
    }
}
