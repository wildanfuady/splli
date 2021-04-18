<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHasilUsahaAPIRequest;
use App\Http\Requests\API\UpdateHasilUsahaAPIRequest;
use App\Models\HasilUsaha;
use App\Repositories\HasilUsahaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\HasilUsahaResource;
use Response;

/**
 * Class HasilUsahaController
 * @package App\Http\Controllers\API
 */

class HasilUsahaAPIController extends AppBaseController
{
    /** @var  HasilUsahaRepository */
    private $hasilUsahaRepository;

    public function __construct(HasilUsahaRepository $hasilUsahaRepo)
    {
        $this->hasilUsahaRepository = $hasilUsahaRepo;
    }

    public function get_uang_masuk_by_tanggal($tgl = null)
    {
        $tgl = date('Y-m-d', strtotime($tgl));
        $pembayaran = \App\Models\Pembayaran::whereDate('tanggal', '=', $tgl)->get();
        $total = 0;
        foreach($pembayaran as $item){
            $total += (int)$item->total_harga;
        }
        return $total;
    }

    public function get_uang_keluar_by_tanggal($tgl = null)
    {
        $uangKeluar = \App\Models\UangKeluar::where('tanggal', '=', $tgl)->get();
        $total = 0;
        foreach($uangKeluar as $item){
            $total += (int)$item->total_harga;
        }
        return $total;
    }

    public function index(Request $request)
    {
        $hasilUsahas = $this->hasilUsahaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(HasilUsahaResource::collection($hasilUsahas), 'Hasil Usahas retrieved successfully');
    }

    /**
     * Store a newly created HasilUsaha in storage.
     * POST /hasilUsahas
     *
     * @param CreateHasilUsahaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHasilUsahaAPIRequest $request)
    {
        $input = $request->all();

        $hasilUsaha = $this->hasilUsahaRepository->create($input);

        return $this->sendResponse(new HasilUsahaResource($hasilUsaha), 'Hasil Usaha saved successfully');
    }

    /**
     * Display the specified HasilUsaha.
     * GET|HEAD /hasilUsahas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HasilUsaha $hasilUsaha */
        $hasilUsaha = $this->hasilUsahaRepository->find($id);

        if (empty($hasilUsaha)) {
            return $this->sendError('Hasil Usaha not found');
        }

        return $this->sendResponse(new HasilUsahaResource($hasilUsaha), 'Hasil Usaha retrieved successfully');
    }

    /**
     * Update the specified HasilUsaha in storage.
     * PUT/PATCH /hasilUsahas/{id}
     *
     * @param int $id
     * @param UpdateHasilUsahaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHasilUsahaAPIRequest $request)
    {
        $input = $request->all();

        /** @var HasilUsaha $hasilUsaha */
        $hasilUsaha = $this->hasilUsahaRepository->find($id);

        if (empty($hasilUsaha)) {
            return $this->sendError('Hasil Usaha not found');
        }

        $hasilUsaha = $this->hasilUsahaRepository->update($input, $id);

        return $this->sendResponse(new HasilUsahaResource($hasilUsaha), 'HasilUsaha updated successfully');
    }

    /**
     * Remove the specified HasilUsaha from storage.
     * DELETE /hasilUsahas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var HasilUsaha $hasilUsaha */
        $hasilUsaha = $this->hasilUsahaRepository->find($id);

        if (empty($hasilUsaha)) {
            return $this->sendError('Hasil Usaha not found');
        }

        $hasilUsaha->delete();

        return $this->sendSuccess('Hasil Usaha deleted successfully');
    }
}
