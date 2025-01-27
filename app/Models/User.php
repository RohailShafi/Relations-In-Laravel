<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public function __construct(array $attributes = [])
    {

        $this->table = config('database.models.' .class_basename(__CLASS__). '.table');
        $this->fillable = config('database.models.' .class_basename(__CLASS__). '.fillable');
        $this->hidden = config('database.models.' .class_basename(__CLASS__). '.hidden');

        parent::__construct($attributes);
    }

//    relation
//
    public function posts(){

        return $this->hasMany(Post::class );

    }

    public function country(){

        return $this->belongsTo(Country::class );

    }

//    queries

    public static function create(Request $request){

        $data = $request->only((new self)->getFillable());

        return self::create($data);

    }

    public static function getPost(Request $request){


        return User::with('posts' ,'country')->find($request->input('id'));

    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
