<?php

namespace App\Http\Controllers;

use App\DataTables\HasilUsahaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateHasilUsahaRequest;
use App\Http\Requests\UpdateHasilUsahaRequest;
use App\Repositories\HasilUsahaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class HasilUsahaController extends AppBaseController
{
    /** @var  HasilUsahaRepository */
    private $hasilUsahaRepository;

    public function __construct(HasilUsahaRepository $hasilUsahaRepo)
    {
        $this->hasilUsahaRepository = $hasilUsahaRepo;
    }

    /**
     * Display a listing of the HasilUsaha.
     *
     * @param HasilUsahaDataTable $hasilUsahaDataTable
     * @return Response
     */
    public function index(HasilUsahaDataTable $hasilUsahaDataTable)
    {
        return $hasilUsahaDataTable->render('hasil_usahas.index');
    }

    /**
     * Show the form for creating a new HasilUsaha.
     *
     * @return Response
     */
    public function create()
    {
        return view('hasil_usahas.create');
    }

    /**
     * Store a newly created HasilUsaha in storage.
     *
     * @param CreateHasilUsahaRequest $request
     *
     * @return Response
     */
    public function store(CreateHasilUsahaRequest $request)
    {
        $input = $request->all();

        $hasilUsaha = $this->hasilUsahaRepository->create($input);

        Flash::success('Hasil Usaha saved successfully.');

        return redirect(route('hasilUsahas.index'));
    }

    /**
     * Display the specified HasilUsaha.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hasilUsaha = $this->hasilUsahaRepository->find($id);

        if (empty($hasilUsaha)) {
            Flash::error('Hasil Usaha not found');

            return redirect(route('hasilUsahas.index'));
        }

        return view('hasil_usahas.show')->with('hasilUsaha', $hasilUsaha);
    }

    /**
     * Show the form for editing the specified HasilUsaha.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hasilUsaha = $this->hasilUsahaRepository->find($id);

        if (empty($hasilUsaha)) {
            Flash::error('Hasil Usaha not found');

            return redirect(route('hasilUsahas.index'));
        }

        return view('hasil_usahas.edit')->with('hasilUsaha', $hasilUsaha);
    }

    /**
     * Update the specified HasilUsaha in storage.
     *
     * @param  int              $id
     * @param UpdateHasilUsahaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHasilUsahaRequest $request)
    {
        $hasilUsaha = $this->hasilUsahaRepository->find($id);

        if (empty($hasilUsaha)) {
            Flash::error('Hasil Usaha not found');

            return redirect(route('hasilUsahas.index'));
        }

        $hasilUsaha = $this->hasilUsahaRepository->update($request->all(), $id);

        Flash::success('Hasil Usaha updated successfully.');

        return redirect(route('hasilUsahas.index'));
    }

    /**
     * Remove the specified HasilUsaha from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hasilUsaha = $this->hasilUsahaRepository->find($id);

        if (empty($hasilUsaha)) {
            Flash::error('Hasil Usaha not found');

            return redirect(route('hasilUsahas.index'));
        }

        $this->hasilUsahaRepository->delete($id);

        Flash::success('Hasil Usaha deleted successfully.');

        return redirect(route('hasilUsahas.index'));
    }
}
