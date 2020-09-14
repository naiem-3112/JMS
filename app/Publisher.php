<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = [
        'title', 'name', 'email', 'summery', 'country_id', 'paper_file'
    ];
}
