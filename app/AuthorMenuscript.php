<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorMenuscript extends Model
{
    protected $fillable = ['author_id', 'menuscript_id', 'name', 'email'];
}
