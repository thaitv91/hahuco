<?php

namespace App\Http\Controllers\Frontend;

use App\Models\DichVu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use Cviebrock\EloquentSluggable\Sluggable;

class DichvuController extends Controller
{
	public function show($id) {

		$dichvu = DichVu::where('slug', '=', $id)->first();

		$data = [
			'title' => 'Dịch vụ: ' . $dichvu->name,
			'dichvu' => $dichvu
		];

		return view('frontend.chitietdichvu', $data);

	}
}
