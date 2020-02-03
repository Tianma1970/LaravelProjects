<?php

namespace App;

use App\Todo;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function todos(){
        return $this->hasMany(Todo::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
