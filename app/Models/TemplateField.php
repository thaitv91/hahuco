<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateField extends Model
{
    protected $table = "template_fields";
    
    protected $fillable = [
        'title', 'content','type', 'template', 'slug'
    ];
}
