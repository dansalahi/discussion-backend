<?php

namespace Tests\Feature\Api\v1\Threads;

use App\Thread;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
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

}
