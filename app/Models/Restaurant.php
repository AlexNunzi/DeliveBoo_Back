<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function food()
    {
        return $this->hasMany(Food::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
