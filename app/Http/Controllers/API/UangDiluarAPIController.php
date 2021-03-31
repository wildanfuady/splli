<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUangDiluarAPIRequest;
use App\Http\Requests\API\UpdateUangDiluarAPIRequest;
use App\Models\UangDiluar;
use App\Repositories\UangDiluarRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UangDiluarResource;
use Response;

/**
 * Class UangDiluarController
 * @package App\Http\Controllers\API
 */

class UangDiluarAPIController extends AppBaseController
{
    /** @var  UangDiluarRepository */
    private $uangDiluarRepository;

    public function __construct(UangDiluarRepository $uangDiluarRepo)
    {
        $this->uangDiluarRepository = $uangDiluarRepo;
    }

    /**
     * Display a listing of the UangDiluar.
     * GET|HEAD /uangDiluars
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $uangDiluars = $this->uangDiluarRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(UangDiluarResource::collection($uangDiluars), 'Uang Diluars retrieved successfully');
    }

    /**
     * Store a newly created UangDiluar in storage.
     * POST /uangDiluars
     *
     * @param CreateUangDiluarAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUangDiluarAPIRequest $request)
    {
        $input = $request->all();

        $uangDiluar = $this->uangDiluarRepository->create($input);

        return $this->sendResponse(new UangDiluarResource($uangDiluar), 'Uang Diluar saved successfully');
    }

    /**
     * Display the specified UangDiluar.
     * GET|HEAD /uangDiluars/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UangDiluar $uangDiluar */
        $uangDiluar = $this->uangDiluarRepository->find($id);

        if (empty($uangDiluar)) {
            return $this->sendError('Uang Diluar not found');
        }

        return $this->sendResponse(new UangDiluarResource($uangDiluar), 'Uang Diluar retrieved successfully');
    }

    /**
     * Update the specified UangDiluar in storage.
     * PUT/PATCH /uangDiluars/{id}
     *
     * @param int $id
     * @param UpdateUangDiluarAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUangDiluarAPIRequest $request)
    {
        $input = $request->all();

        /** @var UangDiluar $uangDiluar */
        $uangDiluar = $this->uangDiluarRepository->find($id);

        if (empty($uangDiluar)) {
            return $this->sendError('Uang Diluar not found');
        }

        $uangDiluar = $this->uangDiluarRepository->update($input, $id);

        return $this->sendResponse(new UangDiluarResource($uangDiluar), 'UangDiluar updated successfully');
    }

    /**
     * Remove the specified UangDiluar from storage.
     * DELETE /uangDiluars/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UangDiluar $uangDiluar */
        $uangDiluar = $this->uangDiluarRepository->find($id);

        if (empty($uangDiluar)) {
            return $this->sendError('Uang Diluar not found');
        }

        $uangDiluar->delete();

        return $this->sendSuccess('Uang Diluar deleted successfully');
    }
}
