<?php

namespace Tests\Feature\Api\v1\Threads;

use App\Channel;
use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ThreadsTest extends TestCase
{

    /* @test get_all_threads */
    public function test_get_all_threads()
    {
        $response = $this->get(route('threads.index'));
        $response->assertStatus(Response::HTTP_OK);
    }

    /* @test get_a_single_thread */
    public function test_get_a_thread_by_slug()
    {

        $thread = factory(Thread::class)->create();

        $response = $this->get(route('threads.show', [$thread->slug]));
        $response->assertStatus(Response::HTTP_OK);

    }

    /**
     * @test a thread request to be validated
     */
    public function test_store_a_channel_should_be_validated()
    {
        $response = $this->postJson(route('threads.store'), []);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }


    /**
     * @test a thread can stored on DB
     */
    public function test_a_thread_should_be_stored()
    {

        Sanctum::actingAs(factory(User::class)->create());

        $response = $this->postJson(route('threads.store'), [
            'title' => 'React',
            'content' => 'React is great',
            'channel_id' => factory(Channel::class)->create()->id
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
    }

}
