<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUangKeluarAPIRequest;
use App\Http\Requests\API\UpdateUangKeluarAPIRequest;
use App\Models\UangKeluar;
use App\Repositories\UangKeluarRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UangKeluarResource;
use Response;

/**
 * Class UangKeluarController
 * @package App\Http\Controllers\API
 */

class UangKeluarAPIController extends AppBaseController
{
    /** @var  UangKeluarRepository */
    private $uangKeluarRepository;

    public function __construct(UangKeluarRepository $uangKeluarRepo)
    {
        $this->uangKeluarRepository = $uangKeluarRepo;
    }

    /**
     * Display a listing of the UangKeluar.
     * GET|HEAD /uangKeluars
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $uangKeluars = $this->uangKeluarRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(UangKeluarResource::collection($uangKeluars), 'Uang Keluars retrieved successfully');
    }

    /**
     * Store a newly created UangKeluar in storage.
     * POST /uangKeluars
     *
     * @param CreateUangKeluarAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUangKeluarAPIRequest $request)
    {
        $input = $request->all();

        $uangKeluar = $this->uangKeluarRepository->create($input);

        return $this->sendResponse(new UangKeluarResource($uangKeluar), 'Uang Keluar saved successfully');
    }

    /**
     * Display the specified UangKeluar.
     * GET|HEAD /uangKeluars/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UangKeluar $uangKeluar */
        $uangKeluar = $this->uangKeluarRepository->find($id);

        if (empty($uangKeluar)) {
            return $this->sendError('Uang Keluar not found');
        }

        return $this->sendResponse(new UangKeluarResource($uangKeluar), 'Uang Keluar retrieved successfully');
    }

    /**
     * Update the specified UangKeluar in storage.
     * PUT/PATCH /uangKeluars/{id}
     *
     * @param int $id
     * @param UpdateUangKeluarAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUangKeluarAPIRequest $request)
    {
        $input = $request->all();

        /** @var UangKeluar $uangKeluar */
        $uangKeluar = $this->uangKeluarRepository->find($id);

        if (empty($uangKeluar)) {
            return $this->sendError('Uang Keluar not found');
        }

        $uangKeluar = $this->uangKeluarRepository->update($input, $id);

        return $this->sendResponse(new UangKeluarResource($uangKeluar), 'UangKeluar updated successfully');
    }

    /**
     * Remove the specified UangKeluar from storage.
     * DELETE /uangKeluars/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UangKeluar $uangKeluar */
        $uangKeluar = $this->uangKeluarRepository->find($id);

        if (empty($uangKeluar)) {
            return $this->sendError('Uang Keluar not found');
        }

        $uangKeluar->delete();

        return $this->sendSuccess('Uang Keluar deleted successfully');
    }
}
