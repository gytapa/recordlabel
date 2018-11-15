<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiStudioTest extends TestCase
{

    public function testStudioGetAllTest()
    {
        $response = $this->call('GET', '/api/studio');

        $this->assertEquals(200, $response->status());
    }

    public function testStudioGetTest()
    {
        $response = $this->call('GET', '/api/studio/1');

        $this->assertEquals(200, $response->status());
    }
    public function testStudioGetNonExistantTest()
    {
        $response = $this->call('GET', '/api/studio/0');

        $this->assertEquals(404, $response->status());
    }

    public function testStudioPostValid()
    {
        $response = $this->call('POST','/api/studio',
            [
                'name' => 'Sally',
                'address' => 'address',
                'quality'  => '1',
            ]);

        $this->assertEquals(201, $response->status());
    }

    public function testStudioPostInValid()
    {
        $response = $this->call('POST','/api/studio',
            [
                'name' => 'Sally',
                'year' => '1996-07-01',

            ]);

        $this->assertEquals(400, $response->status());
    }

    public function testStudioDeleteValid()
    {
        $response = $this->call('DELETE','/api/studio/5');

        $this->assertEquals(200, $response->status());
    }

    /*public function testStudioDeleteInvalidValid()
    {
        $response = $this->call('DELETE','/api/studio/5');
        $this->assertEquals(404, $response->status());
    }*/

    public function testStudioPutValid()
    {
        $response = $this->call('PUT','/api/studio/1',
            [
                'name' => 'Sally',
                'address' => 'address',
                'quality'  => '1',
            ]);

        $this->assertEquals(201, $response->status());
    }

    public function testStudioPutInValid()
    {
        $response = $this->call('PUT','/api/studio/0',
            [
                'name' => 'Sally',
                'address' => 'address',
            ]);

        $this->assertEquals(404, $response->status());
    }



}
