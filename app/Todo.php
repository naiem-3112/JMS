<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable=['title', 'completed', 'description'];

    public function steps(){
        return $this->hasMany(Step::class);
    }
}

