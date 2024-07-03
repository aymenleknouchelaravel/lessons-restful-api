<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User as UserResource;


class LoginController extends Controller
{

    public function login(Request $request)
    {
        $user = User::where('email', 'like', $request->email)->first();
        $accessToken = $user->createToken('Access Token')->accessToken;

        return response()->json([
            'user' => new UserResource($user),
            'access_token' => $accessToken,
        ]);
    }
}



// eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZmUwYWJlZmU0NDRjNmM4MmUyMzY5YzkzYTFiYTE0MDhhNzZmM2FhZjgxZGQwZjQ2N2U5MzM1NDIxYjEwYjdiZDQwNTgyYjkwZjJlYWY5ZWYiLCJpYXQiOjE3MjAwNDA1NjYuMTY2Mzc0LCJuYmYiOjE3MjAwNDA1NjYuMTY2MzgsImV4cCI6MTcyMTMzNjU2NS44ODM4MSwic3ViIjoiNTgiLCJzY29wZXMiOltdfQ.rs7_WfoQtskCrCWn4tYBDMEHgTbk-wk5nWmIiWqCtlZa-4MP3B0jBqBDKgokgctOvaq4C65q1m_o0ruj1ghRlkYzHutwhYdHBf1n16e1C5n-BPNnfgwAvBOkQSA8n9G2TKuoVuaYFn2pOL5axiLNuM6YdOKxaV7luBcJz9ulzlIUoE5qNuIlZu2QvgUZOvr0BiOwnfYVySAhmP23rjfFSfraVwmY7FYKfD0kM8RyToOjFIFKVtDHgrqPbqv0cFuGovMIycjx51Pv-KAx1L0G1wVSmhNJpgQ4Pxj7AZIzciNwrKC37PyAx3Gn9Pez7AsRvC1ysVAo1cVm69dWPIe62-RwXfDTk3cYqNJmbN8fcstcU1dYDhYwuQpiU_gYTQgCtBXD4eKcTTJIMcEWgCU8TySAl-54YXoWh1HTlTIRKo9qBK45l8Sah22Ey45a5RrZcBbQb0YBI6hsphpDD27t94Ufsw5_k3_n8Bk9zIlcCZq7J28N3u1c-7h6_6EnezPLd5q5c7ZOx51E3nemKg3789GPHQPPciclJi6vzb5Tfcd81I2h6Hr03I5H8rWm-5Slt5fOb_GaSHMm_sR-3DBg020_1tOmICCdABlc45HpzF3CiA1JEGTj1IMA1HBoIxz4YeFLwnwc5I_zISXCXfU8Fm8ENkfqc4Wz_8g5TxUTLJg
