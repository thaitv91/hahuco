<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmailRegistration as Email;

class EmailRegistrationController extends Controller
{
    public function storeEmail(Request $request) {
    	$request->validate([
    		'email'		=>	'required | email'
    	]);

    	$email = Email::where('email', $request->email)->first();
    	if (isset($email)) {
    		\Session::flash('warning', 'Email had been registed!');

    		return \Redirect('');
    	}

    	$email = new Email;
    	$email->email = $request->email;
    	$email->save();

    	\Session::flash('success', 'Email register successfully!');

    	return \Redirect('');
    }

    public function storeEmailAjax(Request $request) {
        $response = ['status'=>0, 'message' =>  '']; //status : 0-fail, 1-success
        //Validate email
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $email = Email::where('email', $request->email)->first();
            
            if (!isset($email)) {
                $email = new Email;
                $email->email = $request->email;
                $email->save();
            }
                $response['status'] = 1;
                $response['message'] = trans('frontend/home.success_register_email');
        } else {
            $response['message'] = trans('frontend/home.invalid_email');
        }

        return $response;
    }
}
