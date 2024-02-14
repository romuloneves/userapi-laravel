<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\StreetResource;
use App\Models\Street;

class StreetController extends Controller
{
    public function index(string $id = null)
    {
        // Obtém um registro de Street() de acordo com o $id especificado.   

        if($id) // Verifica a existência da variável $id.
        {
            // Caso não seja nulo, o resultado equivalerá a uma array específica daquele id selecionado.

            $street = Street::findOrFail($id);

            return new StreetResource($street);
        }
        else
        {
            // Em caso de nulo, retornará uma array com todos os resultados pertencentes à Street().

            $streets = Street::all();

            return StreetResource::collection($streets);
        }
    }

    public function store(Request $request)
    {
        // Insere um novo registro em Street() utilizando dados armazenados em $data.

        $data = $request->all();
        $street = Street::create($data);

        return new StreetResource($street);
    }

    public function update(Request $request, string $id)
    {
        // Atualiza um registro existente em Street() de acordo com o $id especificado, utilizando dados armazenados em $data.

        $street = Street::findOrFail($id);
        $data = $request->all();

        $street->update($data);

        return new StreetResource($street);
    }

    public function destroy(string $id)
    {
        // Remove um registro de Street() de acordo com o $id especificado.

        Street::findOrFail($id)->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
