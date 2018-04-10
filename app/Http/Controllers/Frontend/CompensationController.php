<?php

namespace App\Http\Controllers\Frontend;

use App\Models\News;
use App\Models\Partner;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IndemnityProvince;

class CompensationController extends Controller
{
	/**
	 * Show the application Compensation.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = [
			'title' => 'Boi Thuong',
		];
		return view('frontend.compensation_main');
	}

	public function compensationOto()
	{
		$data = [
			'title' => 'Boi Thuong Oto',
		];
		return view('frontend.compensation');
	}

	public function getQuanHuyen(Request $request) {
		$province = IndemnityProvince::where('code', $request->province_code)->first();
		
		if(!isset($province)) 
			return 0;

		$districts = $province->districts;

		return $districts;
	}
}