<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupport;
use App\Http\Resources\ReplyResource;
use App\Http\Resources\SupportResource;
use App\Repositories\SupportRepository;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    protected $repository;

    public function __construct(SupportRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index(Request $request)
    {
        $supports = $this->repository->getSupports($request->all());

        return SupportResource::collection($supports);
    }


    public function createReplie(StoreReplySupport $request, $supportId)
    {
        $reply = $this->repository->createReplyToSupportId($supportId, $request->validated());

        return ReplyResource::collection($reply);
    }

}
