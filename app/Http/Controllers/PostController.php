<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = PostResource::collection(Post::query()->latest()->paginate(16));

        return $this->successResponse([
            'posts' => $posts,
            'meta' => $posts->response()->getData()->meta
        ] , 200);
    }

    public function show(Post $post)
    {
        return $this->successResponse(new PostResource($post) , 200);
    }
}
