<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewerMenuscript extends Model
{
    protected $fillale = [
        'reviewer_id', 'menuscript_id'
    ];

    public function menuscript(){
        return $this->belongsTo(Menuscript::class);
    }
}
