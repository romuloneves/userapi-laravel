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
        if($id)
        {
            $state = State::findOrFail($id);

            return new StateResource($state);
        }
        else
        {
            $states = State::all();

            return StateResource::collection($states);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $state = State::create($data);

        return new StateResource($state);
    }

    public function update(Request $request, string $id)
    {
        $state = State::findOrFail($id);
        $data = $request->all();

        $state->update($data);

        return new StateResource($state);
    }

    public function destroy(string $id)
    {
        State::findOrFail($id)->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
