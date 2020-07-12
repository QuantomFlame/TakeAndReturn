<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginClientRequest;
use App\Http\Requests\RegisterClientRequest;
use App\Services\ClientService;

class ClientController extends Controller
{
    /**
     * @var ClientService
     */
    private $clientService;

    /**
     * ClientController constructor.
     * @param ClientService $clientService
     */
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }


    public function register(RegisterClientRequest $request)
    {
        return $this->clientService->register($request);
    }

    public function login(LoginClientRequest $request)
    {
        return $this->clientService->login($request);
    }
}
