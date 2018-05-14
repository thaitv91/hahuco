<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductRate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class RatingController extends Controller
{
	// tinh trung binh
//	public function index() {
//		$rates = Rating::all();
//
//		$rateCount = [];
//		$rateValues = [];
//		$count = 0;
//		$total_point = 0;
//		foreach ($rates as $key => $rate) {
//			$rateCount["$key"] = $rate->count;
//			$rateValues["$key"] = $rate->value;
//			$count += $rate->count;
//			$total_point += $rate->count * $rate->value;
//		}
//
//		$rateArg = 0;
//		if($count != 0)
//			$rateArg = $total_point / $count;
//		//dd(json_encode($rates->get('value')));
//		$values = Rating::select('value')->get()->toJson();
//		$rating_count = Rating::select('count')->get();
//		//dd($rating_count);
//		$data = [
//			'title' => 'Rating',
//			'rateCounts' => $rating_count,
//			'rateValues' => $values,
//			'rateArg' => $rateArg,
//			'rates' => $rates
//		];
//
//		return view('admin.rating.index', $data);
//	}

	// post rating
	public function postRate( Request $request) {
		$data = $request->all();

		if($data['rate'] == (int) $data['rate'] ) {
			$rate = $data['rate'];
		} else {
			$rate = $data['rate'] + 1;
		}
		$product_id = (int) $data['product_id'];
		$product_rate = ProductRate::where('product_id', '=', $product_id)->first();
		if(! $product_rate) {
			$product_rate = new ProductRate();
			$product_rate->product_id = $product_id;
			$product_rate->sao1 = 0;
			$product_rate->sao2 = 0;
			$product_rate->sao3 = 0;
			$product_rate->sao4 = 0;
			$product_rate->sao5 = 0;
			$product_rate->save();
		}

		$checkCokie = $request->cookie("rated_$product_id");
		// check cookie
		if(is_null($checkCokie)) {
			// xu ly rate
			$product_rate["sao$rate"] += 1;
			$product_rate->save();

			// set cookie
			$response = new Response();
			$response->withCookie(cookie("rated_$product_id", '1', 1440));
			return $response;
		}

	}
}
