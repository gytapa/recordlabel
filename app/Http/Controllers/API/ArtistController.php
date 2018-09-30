<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class ArtistController extends Controller
{

    public function getAll()
    {
        $artist =
            [
                [
                    'id' => 1,
                    'name' => 'Artist',
                    'Gender' => 'Male',
                    'genre' => 'Rap'
                ],
                [
                    'id' => 1,
                    'name' => 'Artist',
                    'Gender' => 'Male',
                    'genre' => 'Rap'
                ]
            ];

        return response()->json($artist, 200);
    }

    public function get($id)
    {
        $artist = [
            'id' => 1,
            'name' => 'Artist',
            'Gender' => 'Male',
            'genre' => 'Rap'
        ];
        if ($id == 0)
            return response()->json($artist,404);
        return response()->json($artist,200);
    }

    public function delete($id)
    {
        $artist = [
            'id' => 1,
            'name' => 'Artist',
            'Gender' => 'Male',
            'genre' => 'Rap'
        ];
        if ($id == 0)
            return response()->json($artist,405);
        return response()->json($artist,200);
    }

    public function post($id)
    {
        $artist = [
            'id' => 1,
            'name' => 'Artist',
            'Gender' => 'Male',
            'genre' => 'Rap'
        ];
        if ($id == 0)
            return response()->json($artist,409);
        return response()->json($artist,201);
    }

    public function put($id)
    {
        $artist = [
            'id' => 1,
            'name' => 'Artist',
            'Gender' => 'Male',
            'genre' => 'Rap'
        ];
        if ($id == 0)
            return response()->json($artist,404);
        return response()->json($artist,200);
    }
}