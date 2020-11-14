<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menuscript extends Model
{
    protected $fillable = [
        'category_id', 'publisher_id', 'title', 'name', 'email', 'summery', 'country_id', 'paper_file'
    ];


public function category(){
    return $this->belongsTo('App\Category');
}

public function reviewers(){
    return $this->hasMany(Menuscript::class);
} 

public function user(){
    return $this->hasOne('App\User', 'id', 'author_id');
}

public function rev_menus(){
    return $this->hasMany(ReviewerMenuscript::class);
}

}
