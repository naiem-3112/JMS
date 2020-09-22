<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'team_name', 'category_id', 'reviewer_id', 'status'
    ];

    public function category(){
        return $this->hasOne(Category::class);
    }

    public function reviewer(){
        return $this->hasMany(User::class);
    }
}
