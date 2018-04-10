<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class APIController extends Controller
{
    public function hapi() {
        $_POST['so_tien_ycbh'] = str_replace(',', '', $_POST['so_tien_ycbh']);
    	$curl = curl_init();
        curl_setopt_array( $curl, array(
            CURLOPT_PORT           => "8889",
            CURLOPT_URL            => "http://14.160.90.226:8889/api/cc/12",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT        => 15,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => http_build_query($_POST)
        ) );

        $response = curl_exec( $curl );
        $err      = curl_error( $curl );

        curl_close( $curl );
        $result = json_decode($response);
        $status;

        if( isset($result) && $result->resultmessage == "SUCCESS") {
            $status = 'SUCCESS';
            return $status;
        }else {
            return isset($result) ? $result->resultmessage : 'Connect is timeout. Please try again';
            // return ;
        }
    }

    public function capi() {
        $curl = curl_init();
        $_POST['ngay_tb'] = Carbon::now()->format('d/m/Y');
        $_POST['gio_tb'] = Carbon::now()->format('H:i');

        curl_setopt_array( $curl, array(
            CURLOPT_PORT           => "8889",
            CURLOPT_URL            => "http://14.160.90.226:8889/api/cc/1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 15,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => http_build_query($_POST)
        ) );

        $response = curl_exec( $curl );
        $err      = curl_error( $curl );

        curl_close( $curl );
        $result = json_decode($response);
        $status = 'ERROR';

        if( isset($result) && $result->resultmessage == "SUCCESS") {
            $status = 'SUCCESS';
            return $status;
        }

        // $err_msg = $result->resultOutValue;
        return isset($result) ? $result->resultmessage : 'Connect is timeout. Please try again';
    }
}
