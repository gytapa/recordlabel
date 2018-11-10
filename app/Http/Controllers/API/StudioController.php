<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class StudioController extends Controller
{

    public function getAll()
    {
        $studio =
            [
                [
                    'id' => 1,
                    'name' => 'SongName',
                    'address' => 'Vilnius',
                    'quality' => 2
                ],
                [
                    'id' => 1,
                    'name' => 'SongName',
                    'address' => 'Vilnius',
                    'quality' => 2
                ]
            ];

        return response()->json($studio, 200);
    }

    public function get($id)
    {
        $studio = [
            'id' => 1,
            'name' => 'SongName',
            'address' => 'Vilnius',
            'quality' => 2
        ];
        if ($id == 0)
            return response()->json($studio,404);
        return response()->json($studio,200);
    }

    public function delete($id)
    {
        $studio = [
            'id' => 1,
            'name' => 'SongName',
            'address' => 'Vilnius',
            'quality' => 2
        ];
        if ($id == 0)
            return response()->json($studio,405);
        return response()->json($studio,200);
    }

    public function post()
    {
        $studio = [
            'id' => 1,
            'name' => 'SongName',
            'address' => 'Vilnius',
            'quality' => 2
        ];
        return response()->json($studio,201);
    }

    public function put($id)
    {
        $studio = [
            'id' => 1,
            'name' => 'SongName',
            'address' => 'Vilnius',
            'quality' => 2
        ];
        if ($id == 0)
            return response()->json($studio,404);
        return response()->json($studio,200);
    }
}