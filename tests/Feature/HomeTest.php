<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePageIsWorkingCorrectly()
    {
        $response = $this->get('/');

        $response->assertSeeText('Hello world');
        $response->assertSeeText('This is the content of home page.');
    }

    public function testContactPageIsWorkingCorrectly() {
        $response = $this->get('/contact');

        $response->assertSeeText('Contact');
        $response->assertSeeText('Hello this is contact.');
    }
}
