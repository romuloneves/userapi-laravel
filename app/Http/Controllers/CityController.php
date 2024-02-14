<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;

class CityController extends Controller
{
    public function index(string $id = null)
    {
        // Obtém um registro de City() de acordo com o $id especificado.      

        if($id) // Verifica a existência da variável $id.
        {
            // Caso não seja nulo, o resultado equivalerá a uma array específica daquele id selecionado.

            $city = City::findOrFail($id);

            return new CityResource($city);
        }
        else
        {
            // Em caso de nulo, retornará uma array com todos os resultados pertencentes à City().

            $cities = City::all();

            return CityResource::collection($cities);
        }
    }

    public function store(Request $request)
    {
        // Insere um novo registro em City() utilizando dados armazenados em $data.

        $data = $request->all();
        $city = City::create($data);

        return new CityResource($city);
    }

    public function update(Request $request, string $id)
    {
        // Atualiza um registro existente em City() de acordo com o $id especificado, utilizando dados armazenados em $data.

        $city = City::findOrFail($id);
        $data = $request->all();

        $city->update($data);

        return new CityResource($city);
    }

    public function destroy(string $id)
    {
        // Remove um registro de City() de acordo com o $id especificado.

        City::findOrFail($id)->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
