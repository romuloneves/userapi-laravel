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
        if($id)
        {
            $city = City::findOrFail($id);

            return new CityResource($city);
        }
        else
        {
            $cities = City::all();

            return CityResource::collection($cities);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $city = City::create($data);

        return new CityResource($city);
    }

    public function update(Request $request, string $id)
    {
        $city = City::findOrFail($id);
        $data = $request->all();

        $city->update($data);

        return new CityResource($city);
    }

    public function destroy(string $id)
    {
        City::findOrFail($id)->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
