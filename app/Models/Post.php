<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Post extends Model
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
    public function user(){

        return $this->belongsTo(User::class);

    }

//    queries

    public static function create(Request $request){

        $data = $request->only((new self)->getFillable());

//        $data['user_id']  = User::getUseFactoryAttribute()->Id;

        return self::create($data);

    }

}
