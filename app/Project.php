<?php

namespace App;

use App\Todo;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function todo(){
        return $this->hasMany(Todo::class);
    }
}
