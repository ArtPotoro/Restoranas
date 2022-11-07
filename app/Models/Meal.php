<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable=['mealName','price', 'restoran_id', 'image'];

    public function restoran(){
        return $this->belongsTo(Restoran::class);
    }
}
