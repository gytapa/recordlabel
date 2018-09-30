<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class SongController extends Controller
{

    public function getAll()
    {
        $studio =
            [
                [
                    'id' => 1,
                    'name' => 'SongName',
                    'artist' => 1,
                    'year' => 2
                ],
                [
                    'id' => 1,
                    'name' => 'SongName',
                    'artist' => 1,
                    'year' => 2
                ]
            ];

        return response()->json($studio, 200);
    }

    public function get($id)
    {
        $song = [
            'id' => 1,
            'name' => 'SongName',
            'artist' => 1,
            'year' => 2
        ];
        if ($id == 0)
            return response()->json($song,404);
        return response()->json($song,200);
    }

    public function delete($id)
    {
        $song = [
            'id' => 1,
            'name' => 'SongName',
            'artist' => 1,
            'year' => 2
        ];
        if ($id == 0)
            return response()->json($song,405);
        return response()->json($song,200);
    }

    public function post($id)
    {
        $song = [
            'id' => 1,
            'name' => 'SongName',
            'artist' => 1,
            'year' => 2
        ];
        if ($id == 0)
            return response()->json($song,409);
        return response()->json($song,201);
    }

    public function put($id)
    {
        $song = [
            'id' => 1,
            'name' => 'SongName',
            'artist' => 1,
            'year' => 2
        ];
        if ($id == 0)
            return response()->json($song,404);
        return response()->json($song,200);
    }
}