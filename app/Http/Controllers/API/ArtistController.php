<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArtistController extends Controller
{

    public function getAll()
    {

        foreach (Artist::all() as $artist) {
            $artists[] = $artist->ToJSONArray();
        }
        return response()->json($artists, 200);
    }

    public function get($id)
    {
        try {
            $artist = Artist::findOrFail($id);
            return response()->json(Artist::find($id)->ToJSONArray(), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["id" => $id, "message" => "Artist ID not found"], 404);
        }
    }


    public function delete($id)
    {
        try {
            $artist = Artist::findOrFail($id);
            $artistRespnse = Artist::find($id)->ToJSONArray();
            $artist->delete();
            return response()->json(array_merge($artist->ToJSONArray(), ['message' => 'Artist deleted successfully.']), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["id" => $id, "message" => "Artist ID not found"], 404);
        }
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'gender' => 'required|integer|min:0|max:1',
                'genre' => 'required|integer',
            ]);

        if ($validator->fails())
            return response()->json($validator->messages(), 201);

        $artist = new Artist();
        $artist->name = $request->input('name');
        $artist->gender = $request->input('gender');
        $artist->genre = $request->input('genre');
        $artist->save();
        return response()->json(array_merge($artist->ToJSONArray(), ['message' => 'Artist created successfully.']), 201);
    }

    public function put(Request $request)
    {
        try {
            $artist = Artist::findOrFail($request->input('id'));
            $validator = Validator::make($request->all(),
                [
                    'name' => 'required|string',
                    'gender' => 'required|integer|min:0|max:1',
                    'genre' => 'required|integer',
                ]);

            if ($validator->fails())
                return response()->json($validator->messages(), 201);

            $artist->name = $request->input('name');
            $artist->gender = $request->input('gender');
            $artist->genre = $request->input('genre');
            $artist->save();
            return response()->json(array_merge($artist->ToJSONArray(), ['message' => 'Artist edited successfully.']), 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(["id" => $request->input('id'), "message" => "Artist ID not found"], 404);
        }
    }
}