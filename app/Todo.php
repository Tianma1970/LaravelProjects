<?php

namespace App;

use App\Project;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'title', 'description', 'project_id', 'completed',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function complete($completed = true){
        $this->completed = $completed;
        $this->save();
    }
}
