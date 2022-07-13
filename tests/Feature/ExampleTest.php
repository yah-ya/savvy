<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->post('api/transfer',
        [
            'card'=>'6104337960533014',
            'amount'=>'1000',
            'destinationCard'=>'6219861038567367'
        ]);

        $response->assertStatus(200);
        $this->assertEquals('{"res":true}',$response->content());
    }
}
