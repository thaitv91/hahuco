<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configure extends Model
{
    protected $table = "configure";
    
    protected $fillable = [
        'logo','sitename', 'facebook', 'twitter', 'google', 'instagram', 'copyright', 'promotion_title', 'promotion_content', 'promotion_url', 'promotion_image', 'android', 'apple', 'email', 'mapdes'
    ];
}
