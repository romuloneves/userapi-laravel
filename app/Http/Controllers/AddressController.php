<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Models\Address;

class AddressController extends Controller
{
    public function index(string $id = null)
    {
        /**
         * Relacionamentos que serão trazidos juntos ao objeto $address.
         * Convencionalmente são definidos pela variável $with
        */
        
        $with = ['user', 'street', 'city', 'state'];

        // Obtém um registro de Address() de acordo com o $id especificado.        

        if($id) // Verifica a existência da variável $id.
        {
            // Caso não seja nulo, o resultado equivalerá a uma array específica daquele id selecionado.

            $address = Address::with($with)->findOrFail($id);

            return new AddressResource($address);
        }
        else
        {
            // Em caso de nulo, retornará uma array com todos os resultados pertencentes à Address().

            $addresses = Address::with($with)->get();

            return AddressResource::collection($addresses);
        }
    }

    public function store(Request $request)
    {
        // Insere um novo registro em Address() utilizando dados armazenados em $data.

        $data = $request->all();
        $address = Address::create($data);

        return new AddressResource($address);
    }

    public function update(Request $request, string $id)
    {
        // Atualiza um registro existente em Address() de acordo com o $id especificado, utilizando dados armazenados em $data.

        $address = Address::findOrFail($id);
        $data = $request->all();

        $address->update($data);

        return new AddressResource($address);
    }

    public function destroy(string $id)
    {
        // Remove um registro de Address() de acordo com o $id especificado.

        Address::findOrFail($id)->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
