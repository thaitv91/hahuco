<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageField extends Model
{
    protected $table = "page_fields";
    
    protected $fillable = [
        'page_id','title', 'content', 'type', 'template', 'slug'
    ];
}
