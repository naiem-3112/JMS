<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menuscript extends Model
{
    protected $fillable = [
        'category_id', 'publisher_id', 'title', 'name', 'email', 'summery', 'country_id', 'paper_file'
    ];
}
