<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiSongTest extends TestCase
{

    public function testSongGetAllTest()
    {
        $response = $this->call('GET', '/api/song');

        $this->assertEquals(200, $response->status());
    }

    public function testSongGetTest()
    {
        $response = $this->call('GET', '/api/song/2');

        $this->assertEquals(200, $response->status());
    }
    public function testSongGetNonExistantTest()
    {
        $response = $this->call('GET', '/api/song/0');

        $this->assertEquals(404, $response->status());
    }

    public function testSongPostValid()
    {
        $response = $this->call('POST','/api/song',
            [
                'name' => 'Sally',
                'genre' => '1',
                'gender'  => '1',
                'year' => '1996-07-01',
                'artist' => 1,
                'album' => 3
            ]);

        $this->assertEquals(201, $response->status());
    }

    public function testSongPostInValid()
    {
        $response = $this->call('POST','/api/song',
            [
                'name' => 'Sally',
                'year' => '1996-07-01',

            ]);

        $this->assertEquals(400, $response->status());
    }

    public function testSongDeleteValid()
    {
        $response = $this->call('DELETE','/api/song/5');

        $this->assertEquals(200, $response->status());
    }

    /*public function testSongDeleteInvalidValid()
    {
        $response = $this->call('DELETE','/api/song/5');
        $this->assertEquals(404, $response->status());
    }*/

    public function testSongPutValid()
    {
        $response = $this->call('PUT','/api/song/2',
            [
                'name' => 'Sally',
                'genre' => '1',
                'gender'  => '1',
                'year' => '1996-07-01',
                'artist' => 1,
                'album' => 3
            ]);

        $this->assertEquals(201, $response->status());
    }

    public function testSongPutInValid()
    {
        $response = $this->call('PUT','/api/song/0',
            [
                'genre' => '1',
                'gender'  => '1',
                'year' => '1996-07-01',
                'artist' => 1,
                'album' => 3
            ]);

        $this->assertEquals(404, $response->status());
    }



}
