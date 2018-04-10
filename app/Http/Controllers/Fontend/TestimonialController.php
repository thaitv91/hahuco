<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function show($id) {
    	$testimonial = Testimonial::where('id', $id)->firstOrFail();

    	dd($testimonial);
    }
}
