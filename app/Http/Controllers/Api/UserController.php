<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() : JsonResponse
    {
        $users = User::orderBy('id', 'DESC')->paginate(2);
        return response()->json([
            'status' => true,
            'users' => $users,
        ],200);
    }

    public function show(User $user) : JsonResponse
    {
        return response()->json([
            'status' => true,
            'user' => $user,
        ], 200);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try{

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            DB::commit(); //registra no banco de dados

            return response()->json([
                'status' => true,
                'user' => $user,
                'mensagem' => "Usuário cadastrado com sucesso",
            ], 201);

        }catch(Exception $e){

            DB::rollBack(); //não confirmar o registro no banco de dados

            return response()->json([
                'status' => false,
                'mensagem' => "Usuário não cadastrado",
            ], 400);
        }
    }
}
