<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Studio;

class StudioController extends Controller
{

    public function getAll()
    {
        foreach (Studio::all() as $studio) {
            $studios[] = $studio->ToJSONArray();
        }
        return response()->json($studios, 200);
    }

    public function get($id)
    {
        try {
            $studio = Studio::findOrFail($id);
            return response()->json(Studio::find($id)->ToJSONArray(), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["id" => $id, "message" => "Studio ID not found"], 404);
        }
    }

    public function delete($id)
    {
        try {
            $studio = Studio::findOrFail($id);
            $studioResponse = Studio::find($id)->ToJSONArray();
            $studio->delete();
            return response()->json(array_merge($studio->ToJSONArray(), ['message' => 'Studio deleted successfully.']), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["id" => $id, "message" => "Studio ID not found"], 404);
        }
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'address' => 'required|string',
                'quality' => 'required|integer'
            ]);

        if ($validator->fails())
            return response()->json($validator->messages(), 201);

        $studio = new Studio();
        $studio->name = $request->input('name');
        $studio->address = $request->input('address');
        $studio->quality = $request->input('quality');
        $studio->save();
        return response()->json(array_merge($studio->ToJSONArray(), ['message' => 'Studio created successfully.']), 201);
    }


    public function put(Request $request,$id)
    {
        $studio = Studio::findOrFail($id);
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'address' => 'required|string',
                'quality' => 'required|integer'
            ]);

        if ($validator->fails())
            return response()->json($validator->messages(), 201);
        $studio->name = $request->input('name');
        $studio->address = $request->input('address');
        $studio->quality = $request->input('quality');
        $studio->save();
        return response()->json(array_merge($studio->ToJSONArray(), ['message' => 'Studio created successfully.']), 201);
    }
}