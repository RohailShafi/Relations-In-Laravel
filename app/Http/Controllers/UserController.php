<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\SinglePostRequest;

//dd('In User Controller');

class UserController extends Controller
{


    public function makeUser(UserCreateRequest $request){


        try {

            $user = User::create($request);

            return Response::json($user , 200);

        }catch (\Exception $exception){

            return $exception->getMessage();

        }

    }

    public function singlePost(SinglePostRequest $request){

//        dd('In User Controller');
        try {

            return User::getPost($request);

        }catch (\Exception $exception){

            return $exception->getMessage();

        }


    }
}
