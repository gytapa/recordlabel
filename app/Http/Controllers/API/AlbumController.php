<?php

namespace App\Http\Controllers\API;

use App\Album;
use App\Artist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
    public function getAll()
    {
        foreach (Album::all() as $artist) {
            $albums[] = $artist->ToJSONArray();
        }
        return response()->json($albums, 200);
    }

    public function get($id)
    {
        try {
            $album = Album::findOrFail($id);
            return response()->json(Album::find($id)->ToJSONArray(), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["id" => $id, "message" => "Album ID not found"], 404);
        }
    }


    public function delete($id)
    {
        try {
            $album = Album::findOrFail($id);
            $albumResponse = Album::find($id)->ToJSONArray();
            $album->delete();
            return response()->json(array_merge($albumResponse, ['message' => 'Album deleted successfully.']), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["id" => $id, "message" => "Album ID not found"], 404);
        }
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name'   => 'required|string',
                'genre'  => 'required|integer',
                'year'   => 'required|date',
                'artist' => 'required|integer'
            ]);

        if ($validator->fails())
            return response()->json($validator->messages(), 400);
        if (!Artist::exists($request->input('artist')))
            return response()->json(['message' => 'Artist not found'], 400);

        $album = new Album();
        $album->name = $request->input('name');
        $album->genre = $request->input('genre');
        $album->year = $request->input('year');
        $album->artist = $request->input('artist');
        $album->save();
        return response()->json(array_merge($album->ToJSONArray(), ['message' => 'Album created successfully.']), 201);
    }

    public function put(Request $request,$id)
    {
        try {
            $album = Album::findOrFail($id);
            $validator = Validator::make($request->all(),
                [
                    'name'   => 'required|string',
                    'genre'  => 'required|integer',
                    'year'   => 'required|date',
                    'artist' => 'required|integer'
                ]);

            if ($validator->fails())
                return response()->json($validator->messages(), 201);

            if (!Artist::exists($request->input('artist')))
                return response()->json(['message' => 'Artist not found'], 400);

            $album->name = $request->input('name');
            $album->genre = $request->input('genre');
            $album->year = $request->input('year');
            $album->artist = $request->input('artist');
            $album->save();
            return response()->json(array_merge($album->ToJSONArray(), ['message' => 'Album edited successfully.']), 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(["id" => $request->input('id'), "message" => "Album ID not found"], 404);
        }
    }


}