<?php

namespace App\Http\Controllers;

use App\Http\Requests\SingleCountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CountryController extends Controller
{

    public function allDataAboutUser(SingleCountryRequest $request){

        try {

            $result = Country::getUsersWithPostsAndCountry($request);

            return Response::json($result , 201);

        }catch (\Exception $exception){

            return $exception->getMessage();

        }

    }

}
