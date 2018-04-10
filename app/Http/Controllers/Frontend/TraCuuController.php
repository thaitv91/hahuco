<?php

namespace App\Http\Controllers\Frontend;

use App\Http\SearchAPI\TraCuuBoiThuong;
use App\Http\SearchAPI\TraCuuGCN;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class TraCuuController extends Controller
{
	public function index() {}

	public function getTraCuuBoiThuong(Request $request) {
		// $data = new TraCuuBoiThuong;
		// $data->vbi_key_cc = 'yeXD3AgAvbfEDvj79b66dS89';
		// $data->nv = 'XE';
		// $data->ps= 'BT';
		// $data->ma_cv = '17120585';
		// $data->dien_thoai = '0968160382';

		// $result = $data->getData();
		// dd($result->resultlist);
		$validator = Validator::make($request->all(),
			[
				'captcha' => 'required|captcha'
			],
			[   
				'captcha.required' => 'Vui long nhập mã xác nhận',
				'captcha.captcha' =>'Mã Captcha không đúng!!!'
			]);

		if ($validator->fails()) 
			return array(
				'type'	  => 'error',
				'results' => $validator->errors()
			);

		$vbi_key_cc = 'yeXD3AgAvbfEDvj79b66dS89';
		$nv_ng = 'NG';
		$nv_xe = 'XE';
		$loai = $request->loai;
		$nd_1 = $request->nd_1;
		$nd_2 = $request->nd_2;
		$ps = '';
		$data = array('results' => [], 'type' => '');

		$url_api = 'http://14.160.90.226:8889/api/truyvan/';
		$data_type_1 = '1/?'.
					'vbi_key_cc='.$vbi_key_cc.
					'&ma_cv='.$nd_1.
					'&dien_thoai='.$nd_2.
					'&nv=';

		$data_type_2 = '2/?'.
					'vbi_key_cc='.$vbi_key_cc.
					'&loai='.$loai.
					'&nd_1='.$nd_1.
					'&nd_2='.$nd_2.
					'&nv=';

		if ($loai == 'BT') {
			$ps = '&ps=BT';
			$data_ng = json_decode(file_get_contents($url_api.$data_type_1.$nv_ng.$ps));
			$data_xe = json_decode(file_get_contents($url_api.$data_type_1.$nv_xe.$ps));

			if ($data_ng->resultmessage == "SUCCESS")
				$data['results'] = $data_ng->resultlist;
			if ($data_xe->resultmessage == "SUCCESS")
				$data['results'] = $data_xe->resultlist;

			$data['type'] = 'BT';

		} elseif ($loai != 'HOADON') {
			$data_ng = json_decode(file_get_contents($url_api.$data_type_2.$nv_ng));
			$data_xe = json_decode(file_get_contents($url_api.$data_type_2.$nv_xe));

			if ($data_ng->resultmessage == "SUCCESS")
				$data['results'] = $data_ng->resultlist;
			if ($data_xe->resultmessage == "SUCCESS")
				$data['results'] = $data_xe->resultlist;

			$data['type'] = 'GCN';
		} else {
			$data_hoadon = json_decode(file_get_contents($url_api.$data_type_2.$nv_xe));

			if ($data_hoadon->resultmessage == "SUCCESS")
				$data['results'] = $data_hoadon->resultlist;
		
			$data['type'] = 'HOADON';
		}
			
		return $data;
	}

	public function getTraCuuGiayChungNhan() {

		$data = new TraCuuGCN;
		$data->vbi_key_cc = 'yeXD3AgAvbfEDvj79b66dS89';
		$data->nv = 'NG';
		$data->loai= 'GCN';
		$data->nd_1 = '020117032692';
		$data->nd_2 = '0953588183';

		$result = $data->getData();
		dd($result->resultlist);
	}

	public function postTraCuuBoiThuong(Request $request) {

		$data = $request->all();

		$tracuu = new TraCuuBoiThuong;
		$tracuu->vbi_key_cc = $data['vbi_key_cc'];
		$tracuu->nv =  $data['nv'];;
		$tracuu->ps =  $data['ps'];;
		$tracuu->ma_cv =  $data['ma_cv'];;
		$tracuu->dien_thoai =  $data['dien_thoai'];

		$result = $tracuu->getData();
		return $result;
	}
}
