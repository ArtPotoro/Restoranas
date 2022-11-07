<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restoran extends Model
{
    use HasFactory;

    protected $fillable=['name', 'city', 'address', 'hours'];

    public function meals(){
        return $this->hasMany(Meal::class);
    }
}
