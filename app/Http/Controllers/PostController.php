<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Post;

use Illuminate\Support\Facades\Response;

class PostController extends Controller
{

    public function create(PostCreateRequest $request){

        try {

            $post = Post::create($request);

            return Response::json($post,201);

        }catch (\Exception $exception){

            return $exception->getMessage();

        }


    }

}
