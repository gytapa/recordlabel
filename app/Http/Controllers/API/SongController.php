<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Song;

class SongController extends Controller
{

    public function getAll()
    {
        foreach (Song::all() as $song) {
            $songs[] = $song->ToJSONArray();
        }
        return response()->json($songs, 200);
    }

    public function get($id)
    {
        try {
            $song = Song::findOrFail($id);
            return response()->json(Song::find($id)->ToJSONArray(), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["id" => $id, "message" => "Song ID not found"], 404);
        }
    }

    public function delete($id)
    {
        try {
            $song = Song::findOrFail($id);
            $songResponse = Song::find($id)->ToJSONArray();
            $song->delete();
            return response()->json(array_merge($song->ToJSONArray(), ['message' => 'Artist deleted successfully.']), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["id" => $id, "message" => "Song ID not found"], 404);
        }
    }


    public function post(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|string',
                'genre' => 'required|integer',
                'year' => 'required|date',
                'artist' => 'required|integer',
                'album' => 'required|integer',
            ]);

        if ($validator->fails())
            return response()->json($validator->messages(), 201);

        $song = new Song();
        $song->name = $request->input('name');
        $song->genre = $request->input('genre');
        $song->year = $request->input('year');
        $song->artist = $request->input('artist');
        $song->album = $request->input('album');
        $song->save();
        return response()->json(array_merge($song->ToJSONArray(), ['message' => 'Song created successfully.']), 201);
    }

    public function put(Request $request,$id)
    {
        try {
            $song = Song::findOrFail($id);
            $validator = Validator::make($request->all(),
                [
                    'name' => 'required|string',
                    'genre' => 'required|integer',
                    'year' => 'required|date',
                    'artist' => 'required|integer',
                    'album' => 'required|integer',
                ]);

            if ($validator->fails())
                return response()->json($validator->messages(), 201);

            $song->name = $request->input('name');
            $song->genre = $request->input('genre');
            $song->year = $request->input('year');
            $song->artist = $request->input('artist');
            $song->album = $request->input('album');
            $song->save();
            return response()->json(array_merge($song->ToJSONArray(), ['message' => 'Song edited successfully.']), 201);
        } catch (ModelNotFoundException $e) {
            return response()->json(["id" => $request->input('id'), "message" => "Song ID not found"], 404);
        }
    }
}