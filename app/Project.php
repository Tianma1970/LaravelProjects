<?php

namespace App;

use App\Todo;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function todos(){
        return $this->hasMany(Todo::class);
    }
}
