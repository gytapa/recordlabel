<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiArtistTest extends TestCase
{

    public function testArtistGetAllTest()
    {
        $response = $this->call('GET', '/api/artist');

        $this->assertEquals(200, $response->status());
    }

    public function testArtistGetTest()
    {
        $response = $this->call('GET', '/api/artist/2');

        $this->assertEquals(200, $response->status());
    }
    public function testArtistGetNonExistantTest()
    {
        $response = $this->call('GET', '/api/artist/0');

        $this->assertEquals(404, $response->status());
    }

    public function testArtistPostValid()
    {
        $response = $this->call('POST','/api/artist',
            [
                'name' => 'Sally',
                'genre' => '1',
                'gender'  => '1',
                'year' => '1996-07-01',
            ]);

        $this->assertEquals(201, $response->status());
    }

    public function testArtistPostInValid()
    {
        $response = $this->call('POST','/api/artist',
            [
                'name' => 'Sally',
                'year' => '1996-07-01',

            ]);

        $this->assertEquals(400, $response->status());
    }

    public function testArtistDeleteValid()
    {
        $response = $this->call('DELETE','/api/artist/5');

        $this->assertEquals(200, $response->status());
    }

    /*public function testArtistDeleteInvalidValid()
    {
        $response = $this->call('DELETE','/api/artist/5');
        $this->assertEquals(404, $response->status());
    }*/

    public function testArtistPutValid()
    {
        $response = $this->call('PUT','/api/artist/2',
            [
                'name' => 'Sally',
                'genre' => '1',
                'gender'  => '1',
                'year' => '1996-07-01',
                'artist' => 2,
            ]);

        $this->assertEquals(201, $response->status());
    }

    public function testArtistPutInValid()
    {
        $response = $this->call('PUT','/api/artist/0',
            [
                'name' => 'Sally',
                'genre' => '1',
                'gender'  => '2',
                'year' => '1996-07-01',
                'artist' => 2,
            ]);

        $this->assertEquals(404, $response->status());
    }



}
