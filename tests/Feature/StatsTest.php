<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUser()
    {
        $this->get(route('stats.users',rand(1,1000)))
            ->assertStatus(200);
    }

    public function testLogs()
    {
        $this->get(route('stats.logs',rand(1,1000)))
            ->assertStatus(200);
    }

    public function testMetas()
    {
        $this->get(route('stats.metas',rand(1,1000)))
            ->assertStatus(200);
    }
}
