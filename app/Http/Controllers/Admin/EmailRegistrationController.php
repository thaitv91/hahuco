<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmailRegistration;

class EmailRegistrationController extends Controller
{
    public function index() {
    	$emails = EmailRegistration::all();

    	return view('admin.email_registration.index', compact(['emails']));
    }

    public function destroy($id) {
    	EmailRegistration::where('id', $id)->delete();

    	\Session::flash('success', trans('admin/general.success.remove'));

    	return \Redirect::route('admin.email_registration');
    }
}
