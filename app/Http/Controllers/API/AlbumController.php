<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function getAll()
    {
        $album =
            [
                [
                    'id' => 1,
                    'name' => 'Artist',
                    'Year' => '2005',
                    'Genre' => 'Rap'
                ],
                [
                    'id' => 1,
                    'name' => 'Artist',
                    'Year' => '2005',
                    'Genre' => 'Rap'
                ]
            ];

        return response()->json($album, 200);
    }

    public function get($id)
    {
        $album = [
            'id' => 1,
            'name' => 'Artist',
            'Year' => '2005',
            'Genre' => 'Rap'
        ];
        if ($id == 0)
            return response()->json($album,404);
        return response()->json($album,200);
    }

    public function delete($id)
    {
        $album = [
            'id' => 1,
            'name' => 'Artist',
            'Year' => '2005',
            'Genre' => 'Rap'
        ];
        if ($id == 0)
            return response()->json($album,405);
        return response()->json($album,200);
    }

    public function post($id)
    {
        $album = [
            'id' => 1,
            'name' => 'Artist',
            'Year' => '2005',
            'Genre' => 'Rap'
        ];
        if ($id == 0)
            return response()->json($album,409);
        return response()->json($album,201);
    }

    public function put($id)
    {
        $album = [
            'id' => 1,
            'name' => 'Artist',
            'Year' => '2005',
            'Genre' => 'Rap'
        ];
        if ($id == 0)
            return response()->json($album,404);
        return response()->json($album,200);
    }
}