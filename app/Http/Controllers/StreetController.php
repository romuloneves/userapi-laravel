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
        if($id)
        {
            $street = Street::findOrFail($id);

            return new StreetResource($street);
        }
        else
        {
            $streets = Street::all();

            return StreetResource::collection($streets);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $street = Street::create($data);

        return new StreetResource($street);
    }

    public function update(Request $request, string $id)
    {
        $street = Street::findOrFail($id);
        $data = $request->all();

        $street->update($data);

        return new StreetResource($street);
    }

    public function destroy(string $id)
    {
        Street::findOrFail($id)->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
