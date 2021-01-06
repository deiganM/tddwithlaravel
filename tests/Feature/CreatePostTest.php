<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Post;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_can_create_new_posts()
    {
        // check if the post table is empty
        $this->assertEquals(0, Post::count());
    }
}
