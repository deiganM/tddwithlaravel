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

        // dummy data
        $dummyData = [
            'title' => 'The quick brown fox',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio fuga earum pariatur? Aliquam voluptatibus velit voluptas deserunt facere sapiente incidunt quas ex soluta totam.'
        ];

        $this->postJson(routes('posts.store'), $dummyData)->assertStatus(201);

        $this->assertEquals(1, Post::count());

        // check if what we sent was what we saved
        $post = Post::first();

        $this->assertEquals($dummyData['title'], $post->title);
        $this->assertEquals($dummyData['body'], $post->body);

        // Trust but verify
    }
}
