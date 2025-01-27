<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RoleController extends Controller
{


    public function role(RoleCreateRequest $request){

        try {

            $role = Role::createRole($request);

            return Response::json($role , 201);

        }catch (\Exception $exception){

            return $exception->getMessage();

        }

    }
}
