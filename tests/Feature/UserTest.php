<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class UserTest extends TestCase
{

    public function test_login_successful(): void
    {
        $data = [
            'core_id' => 'dictator'
        ];

        $response = $this->post('/api/users/authenticate/', $data)
            ->assertStatus(200)
            ->assertSee(1);
    }

    public function test_login_denied(): void
    {
        $data = [
            'core_id' => 'admin'
        ];

        $response = $this->post('/api/users/authenticate/', $data)
            ->assertStatus(200)
            ->assertSee(0);
    }
}
