<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Testimonial extends Model
{
	use Searchable;

    protected $table = 'testimonial';
    protected $guareded = array();

    public function toSearchableArray()
    {
    	return [
    		'name' => $this->name,
    		'content' => $this->content,
            'job'   =>  $this->job
    	];
    }
}
