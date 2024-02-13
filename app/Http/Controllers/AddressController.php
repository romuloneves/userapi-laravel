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
        /* Relacionamentos que serão tragos juntos ao objeto $address.
         * Convencionalmente são definidos pela variável $with */
        
        $with = ['user', 'street', 'city', 'state'];
        if($id)
        {
            $address = Address::with($with)->findOrFail($id);

            return new AddressResource($address);
        }
        else
        {
            $addresses = Address::with($with)->get();

            return AddressResource::collection($addresses);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $address = Address::create($data);

        return new AddressResource($address);
    }

    public function update(Request $request, string $id)
    {
        $address = Address::findOrFail($id);
        $data = $request->all();

        $address->update($data);

        return new AddressResource($address);
    }

    public function destroy(string $id)
    {
        Address::findOrFail($id)->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
