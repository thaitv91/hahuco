<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Jobs\ContactNotification;
use App\Models\Configure;

class ContactController extends Controller
{
    public function storeContact(Request $request) {
    	$request->validate([
    		'email'		=>	'required | email',
    		'phone'		=>	'required',
    	]);

    	$contact = new Contact;
    	$contact->name = $request->name;
    	$contact->email = $request->email;
    	$contact->phone = $request->phone;
    	$contact->content = $request->content;
    	$contact->status = 0;
    	$contact->save();

        //$this->sendMail($contact->email);

    	\Session::flash('success', 'Cảm ơn bạn đã Liên hệ với chúng tôi');

    	return \Redirect::back();
    }

    private function sendMail($user_email) {
        $configure = Configure::first();
        $email = 'admin@gmail.com';
        $template = 'mail.notice_to_admin';
        $data = $user_email;

        if ($configure->email) {
            $email = $configure->email;
        }

        $send_mail = (new ContactNotification($email, $data, $template));
        dispatch($send_mail);
    }
}
