<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
	public function __construct() {
        $this->middleware('admin');
    }
    
    public function index() {
    	$contacts = Contact::all();

    	return view('admin.contact.index', compact(['contacts']));
    }

    public function show($id) {
    	$contact = Contact::where('id', $id)->firstOrFail();
        $contact->status = 1;
        $contact->save();

    	return view('admin.contact.show', compact(['contact']));
    }

    public function destroy($id) {
    	Contact::where('id', $id)->delete();

    	\Session::flash('success', trans('admin/general.success.remove'));

    	return \Redirect::route('admin.contact');
    }
}
