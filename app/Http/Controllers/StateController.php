<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\StateResource;
use App\Models\State;

class StateController extends Controller
{
    public function index(string $id = null)
    {
        // Obtém um registro de State() de acordo com o $id especificado.   

        if($id) // Verifica a existência da variável $id.
        {
            // Caso não seja nulo, o resultado equivalerá a uma array específica daquele id selecionado.

            $state = State::findOrFail($id);

            return new StateResource($state);
        }
        else
        {
            // Em caso de nulo, retornará uma array com todos os resultados pertencentes à State().

            $states = State::all();

            return StateResource::collection($states);
        }
    }

    public function store(Request $request)
    {
        // Insere um novo registro em State() utilizando dados armazenados em $data.

        $data = $request->all();
        $state = State::create($data);

        return new StateResource($state);
    }

    public function update(Request $request, string $id)
    {
        // Atualiza um registro existente em State() de acordo com o $id especificado, utilizando dados armazenados em $data.

        $state = State::findOrFail($id);
        $data = $request->all();

        $state->update($data);

        return new StateResource($state);
    }

    public function destroy(string $id)
    {
        // Remove um registro de State() de acordo com o $id especificado.

        State::findOrFail($id)->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
