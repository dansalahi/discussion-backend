<?php

namespace App\Http\Controllers\Api\v1\Threads;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ThreadRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ThreadsController extends Controller
{
    /**
     * Retrieve all threads
     * @method GET
     *
     * @param ThreadRepositoryInterface $threadRepository
     * @return JsonResponse
     */
    public function index(ThreadRepositoryInterface $threadRepository): JsonResponse
    {
        return response()->json($threadRepository->all(), Response::HTTP_OK);
    }


    /**
     * Retrieve single thread.
     * @method GET
     *
     * @param string $slug
     * @param ThreadRepositoryInterface $threadRepository
     * @return JsonResponse
     */
    public function show(string $slug, ThreadRepositoryInterface $threadRepository): JsonResponse
    {
        return \response()->json($threadRepository->findBySlug($slug), Response::HTTP_OK);
    }

}
