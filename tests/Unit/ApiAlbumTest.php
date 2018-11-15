<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiAlbumTest extends TestCase
{

    public function testAlbumGetAllTest()
    {
        $response = $this->call('GET', '/api/album');

        $this->assertEquals(200, $response->status());
    }

    public function testAlbumGetTest()
    {
        $response = $this->call('GET', '/api/album/3');

        $this->assertEquals(200, $response->status());
    }
    public function testAlbumGetNonExistantTest()
    {
        $response = $this->call('GET', '/api/album/0');

        $this->assertEquals(404, $response->status());
    }

    public function testAlbumPostValid()
    {
        $response = $this->call('POST','/api/album',
            [
                'name' => 'Sally',
                'genre' => '1',
                'year' => '1996-07-01',
                'artist' => 2,
            ]);

        $this->assertEquals(201, $response->status());
    }

    public function testAlbumPostInValid()
    {
        $response = $this->call('POST','/api/album',
            [
                'name' => 'Sally',
                'genre' => '1',
                'artist' => 2,
            ]);

        $this->assertEquals(400, $response->status());
    }

    public function testAlbumDeleteValid()
    {
        $response = $this->call('DELETE','/api/album/5');

        $this->assertEquals(200, $response->status());
    }

    public function testAlbumDeleteInvalidValid()
    {
        $response = $this->call('DELETE','/api/album/5');
        $this->assertEquals(404, $response->status());
    }

    public function testAlbumPutValid()
    {
        $response = $this->call('PUT','/api/album/1',
            [
                'name' => 'Sally',
                'genre' => '1',
                'year' => '1996-07-01',
                'artist' => 2,
            ]);

        $this->assertEquals(201, $response->status());
    }

    public function testAlbumPutInValid()
    {
        $response = $this->call('PUT','/api/album/0',
            [
                'name' => 'Sally',
                'genre' => '1',
                'artist' => 2,
            ]);

        $this->assertEquals(404, $response->status());
    }
}
