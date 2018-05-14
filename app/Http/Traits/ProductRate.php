<?php

namespace App\Http\Traits;

use App\Models\ProductRate;
use InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait ProductRate
{
	// get Rate on product
	public function getRated() {
		$rate = ProductRate::where('product_id', '=', $this->id)->first();
		if($rate) {
			$rate1 = $rate->sao1;
			$rate2 = $rate->sao2;
			$rate3 = $rate->sao3;
			$rate4 = $rate->sao4;
			$rate5 = $rate->sao5;
			$rate_count = $rate1 + $rate2 + $rate3 + $rate4 + $rate5;
			$rated = $rate_count != 0 ? ($rate1 + $rate2 * 2 + $rate3 * 3 + $rate4 * 4 + $rate5 * 5) / $rate_count : 0;
		} else {
			$rated = 0;
		}

		return $rated;
	}
}