<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index(string $id = null)
    {
        // Obtém um registro de User() de acordo com o $id especificado.   

        if($id) // Verifica a existência da variável $id.
        {
            // Caso não seja nulo, o resultado equivalerá a uma array específica daquele id selecionado.

            $user = User::with('addresses')->findOrFail($id);

            return new UserResource($user);
        }
        else
        {
            // Em caso de nulo, retornará uma array com todos os resultados pertencentes à User().

            $users = User::with('addresses')->get();

            return UserResource::collection($users);
        }
    }

    public function store(Request $request)
    {
        // Insere um novo registro em User() utilizando dados armazenados em $data.

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);

        return new UserResource($user);
    }

    public function update(Request $request, string $id)
    {
        // Atualiza um registro existente em User() de acordo com o $id especificado, utilizando dados armazenados em $data.

        $user = User::findOrFail($id);
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user->update($data);

        return new UserResource($user);
    }

    public function destroy(string $id)
    {
        // Remove um registro de User() de acordo com o $id especificado.

        User::findOrFail($id)->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
