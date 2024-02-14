<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\Street;

class Address extends Model
{
    use HasFactory;

    /**
    * The belongs to "User" Relationship
    * Relacionamento pertence ao "User"
    *
    * @var array
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
    * The belongs to "State" Relationship
    * Relacionamento pertence ao "State"
    *
    * @var array
    */

    public function state()
    {
        return $this->belongsTo(State::class);
    }


    /**
    * The belongs to "City" Relationship
    * Relacionamento pertence ao "City"
    *
    * @var array
    */

    public function city()
    {
        return $this->belongsTo(City::class);
    }


    /**
    * The belongs to "Street" Relationship
    * Relacionamento pertence ao "Street"
    *
    * @var array
    */

    public function street()
    {
        return $this->belongsTo(Street::class);
    }

}
