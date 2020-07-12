<?php

namespace App\Services;

use App\Models\Client;
use App\Http\Requests\LoginClientRequest;
use App\Http\Requests\RegisterClientRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ClientService
{
    /**
     * @param RegisterClientRequest $request
     * @return JsonResponse
     */
    public function register(RegisterClientRequest $request)
    {
        $validated = $request->validated();

        $client = Client::create([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'token' => Str::random(255),
        ]);

        return response()->json([
            "client" => $client
        ]);
    }

    /**
     * @param LoginClientRequest $request
     * @return JsonResponse
     */
    public function login(LoginClientRequest $request)
    {
        $validated = $request->validated();

        if (!auth()->attempt($validated)) {
            return response()->json('Invalid credentials', 401);
        }

        return response()->json(auth()->user());
    }
}
