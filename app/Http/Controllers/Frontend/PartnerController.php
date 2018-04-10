<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnerController extends Controller
{
	public function show($id) {

		$partner = Partner::where('id', $id)->firstOrFail();

		dd($partner);	
	}
}
