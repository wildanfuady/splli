<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStokBarangAPIRequest;
use App\Http\Requests\API\UpdateStokBarangAPIRequest;
use App\Models\StokBarang;
use App\Repositories\StokBarangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\StokBarangResource;
use Response;

/**
 * Class StokBarangController
 * @package App\Http\Controllers\API
 */

class StokBarangAPIController extends AppBaseController
{
    /** @var  StokBarangRepository */
    private $stokBarangRepository;

    public function __construct(StokBarangRepository $stokBarangRepo)
    {
        $this->stokBarangRepository = $stokBarangRepo;
    }

    /**
     * Display a listing of the StokBarang.
     * GET|HEAD /stokBarangs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $stokBarangs = $this->stokBarangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(StokBarangResource::collection($stokBarangs), 'Stok Barangs retrieved successfully');
    }

    /**
     * Store a newly created StokBarang in storage.
     * POST /stokBarangs
     *
     * @param CreateStokBarangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStokBarangAPIRequest $request)
    {
        $input = $request->all();

        $stokBarang = $this->stokBarangRepository->create($input);

        return $this->sendResponse(new StokBarangResource($stokBarang), 'Stok Barang saved successfully');
    }

    /**
     * Display the specified StokBarang.
     * GET|HEAD /stokBarangs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var StokBarang $stokBarang */
        $stokBarang = $this->stokBarangRepository->find($id);

        if (empty($stokBarang)) {
            return $this->sendError('Stok Barang not found');
        }

        return $this->sendResponse(new StokBarangResource($stokBarang), 'Stok Barang retrieved successfully');
    }

    /**
     * Update the specified StokBarang in storage.
     * PUT/PATCH /stokBarangs/{id}
     *
     * @param int $id
     * @param UpdateStokBarangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStokBarangAPIRequest $request)
    {
        $input = $request->all();

        /** @var StokBarang $stokBarang */
        $stokBarang = $this->stokBarangRepository->find($id);

        if (empty($stokBarang)) {
            return $this->sendError('Stok Barang not found');
        }

        $stokBarang = $this->stokBarangRepository->update($input, $id);

        return $this->sendResponse(new StokBarangResource($stokBarang), 'StokBarang updated successfully');
    }

    /**
     * Remove the specified StokBarang from storage.
     * DELETE /stokBarangs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var StokBarang $stokBarang */
        $stokBarang = $this->stokBarangRepository->find($id);

        if (empty($stokBarang)) {
            return $this->sendError('Stok Barang not found');
        }

        $stokBarang->delete();

        return $this->sendSuccess('Stok Barang deleted successfully');
    }
}
