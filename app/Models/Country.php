<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Country extends Model
{

    use HasFactory;


    public function __construct(array $attributes = [])
    {

        $this->table = config('database.models.' .class_basename(__CLASS__). '.table');
        $this->fillable = config('database.models.' .class_basename(__CLASS__). '.fillable');
        $this->hidden = config('database.models.' .class_basename(__CLASS__). '.hidden');

        parent::__construct($attributes);
    }


//    relations
//
//    public function users(){
//
//        return $this->hasMany(User::class );
//
//    }

    public function users(){


        return $this->hasManyThrough(Post::class , User::class ,
            'country_id' , 'user_id' , 'id' , 'id' );

    }

    public static function getUsersWithPostsAndCountry(Request $request){

        $country = Country::find($request->input('id'));

        return $country->users;

//        return Country::with('users.posts')->find($request->input('id'));

    }

}



