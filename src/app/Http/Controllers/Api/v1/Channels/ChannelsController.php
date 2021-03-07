<?php

namespace App\Http\Controllers\Api\v1\Channels;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ChannelRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ChannelsController extends Controller
{
    /**
     * Retrieve all channels
     * @method GET
     *
     * @param ChannelRepositoryInterface $channelRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllChannels(ChannelRepositoryInterface $channelRepository)
    {
        return response()->json($channelRepository->all(), Response::HTTP_OK);
    }


    /**
     *  Store a channel in DB.
     * @method POST
     * @param Request $request
     * @param ChannelRepositoryInterface $channelRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, ChannelRepositoryInterface $channelRepository)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = ['name' => $request->name, 'slug' => Str::slug($request->name)];
        $channelRepository->create($data);
        return \response()->json(['message' => 'channel created'], Response::HTTP_CREATED);
    }


    /**
     * Update a channel in DB.
     * @method PUT
     * @param Request $request
     * @param ChannelRepositoryInterface $channelRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ChannelRepositoryInterface $channelRepository)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = ['name' => $request->name, 'slug' => Str::slug($request->name)];
        $channelRepository->update($request->id, $data);
        return \response()->json(['message' => 'channel updated'], Response::HTTP_OK);
    }

    /**
     *
     * delete a channel(s)
     * @method DELETE
     * @param Request $request
     * @param ChannelRepositoryInterface $channelRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, ChannelRepositoryInterface $channelRepository)
    {
        $request->validate(['id' => 'required']);
        $channelRepository->destroy($request->id);
        return \response()->json(['message' => 'channel has been deleted'], Response::HTTP_OK);
    }

}
