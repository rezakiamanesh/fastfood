<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInsertData()
    {
        $data = User::factory()->make()->toArray();
        $data['password'] = bcrypt('123456');
        User::query()->create($data);
        $this->assertDatabaseHas('users',$data);
    }
}
