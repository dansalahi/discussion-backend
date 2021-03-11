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


    /**
     *  Store a thread in DB.
     * @method POST
     * @param Request $request
     * @param ThreadRepositoryInterface $threadRepository
     * @return JsonResponse
     */
    public function store(Request $request, ThreadRepositoryInterface $threadRepository): JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'channel_id' => 'required',
        ]);
        $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->title),
            'content' => $request->input('content'),
            'channel_id' => $request->input('channel_id'),
            'user_id' => auth()->user()->id
        ];
        $threadRepository->create($data);
        return \response()->json(['message' => 'thread created'], Response::HTTP_CREATED);
    }


}
