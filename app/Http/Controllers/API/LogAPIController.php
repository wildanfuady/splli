<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLogAPIRequest;
use App\Http\Requests\API\UpdateLogAPIRequest;
use App\Models\Log;
use App\Repositories\LogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\LogResource;
use Response;

/**
 * Class LogController
 * @package App\Http\Controllers\API
 */

class LogAPIController extends AppBaseController
{
    /** @var  LogRepository */
    private $logRepository;

    public function __construct(LogRepository $logRepo)
    {
        $this->logRepository = $logRepo;
    }

    /**
     * Display a listing of the Log.
     * GET|HEAD /logs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $logs = $this->logRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(LogResource::collection($logs), 'Logs retrieved successfully');
    }

    /**
     * Store a newly created Log in storage.
     * POST /logs
     *
     * @param CreateLogAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLogAPIRequest $request)
    {
        $input = $request->all();

        $log = $this->logRepository->create($input);

        return $this->sendResponse(new LogResource($log), 'Log saved successfully');
    }

    /**
     * Display the specified Log.
     * GET|HEAD /logs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Log $log */
        $log = $this->logRepository->find($id);

        if (empty($log)) {
            return $this->sendError('Log not found');
        }

        return $this->sendResponse(new LogResource($log), 'Log retrieved successfully');
    }

    /**
     * Update the specified Log in storage.
     * PUT/PATCH /logs/{id}
     *
     * @param int $id
     * @param UpdateLogAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogAPIRequest $request)
    {
        $input = $request->all();

        /** @var Log $log */
        $log = $this->logRepository->find($id);

        if (empty($log)) {
            return $this->sendError('Log not found');
        }

        $log = $this->logRepository->update($input, $id);

        return $this->sendResponse(new LogResource($log), 'Log updated successfully');
    }

    /**
     * Remove the specified Log from storage.
     * DELETE /logs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Log $log */
        $log = $this->logRepository->find($id);

        if (empty($log)) {
            return $this->sendError('Log not found');
        }

        $log->delete();

        return $this->sendSuccess('Log deleted successfully');
    }
}
