<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Listar todos os usuários com perfil
     */
    public function index()
    {
        return response()->json(
            User::with('profile')->get(),
            200
        );
    }

    /**
     * Criar usuário + perfil
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:users,email',
            'senha' => 'required|min:6',
            'perfil_nome' => 'required'
        ]);

        return DB::transaction(function () use ($request) {

            $profile = Profile::create([
                'perfil_nome' => $request->perfil_nome
            ]);

            $user = User::create([
                'nome' => $request->nome,
                'email' => $request->email,
                'senha' => Hash::make($request->senha),
                'profile_id' => $profile->id
            ]);

            return response()->json(
                $user->load('profile'),
                201
            );
        });
    }

    /**
     * Mostrar usuário específico
     */
    public function show(string $id)
    {
        $user = User::with('profile')->findOrFail($id);

        return response()->json($user, 200);
    }

    /**
     * Atualizar usuário
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'email' => 'email|unique:users,email,' . $id
        ]);

        $user->update($request->only(['nome', 'email']));

        if ($request->perfil_nome) {
            $user->profile->update([
                'perfil_nome' => $request->perfil_nome
            ]);
        }

        return response()->json(
            $user->load('profile'),
            200
        );
    }

    /**
     * Deletar usuário
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'Usuário deletado com sucesso'
        ], 200);
    }
}