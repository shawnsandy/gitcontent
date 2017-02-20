<?php

namespace ShawnSandy\GitContent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GistCollection extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'gist_id',
        'title',
        'description',
        'tags'
    ];
}
