<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductContact as Contact;

class ProductContactController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }
    
    public function index() {
    	$contacts = Contact::all();

    	return view('admin.product_contact.index', compact(['contacts']));
    }

    public function show($id) {
    	$contact = Contact::where('id', $id)->firstOrFail();
        $contact->status = 1;
        $contact->save();

    	return view('admin.product_contact.show', compact(['contact']));
    }

    public function destroy($id) {
    	Contact::where('id', $id)->delete();

    	\Session::flash('success', trans('admin/general.success.remove'));

    	return \Redirect::route('admin.product.contact');
    }
}
