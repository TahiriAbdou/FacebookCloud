<?php

namespace Hoteru;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $table = 'pages';
    
    public $fillable = [
        'slug',
        'title',
        'content',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'display_menu',
        'display_footer'
    ];

    public $guarded = [];
}
