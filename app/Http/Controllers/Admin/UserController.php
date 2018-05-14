<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use App\UserMeta;
use Session;
use Redirect;
use Validator;
use Storage;
use Carbon\Carbon;
use Hash;

class UserController extends Controller
{	
	public function __construct()
    {	
    	$this->user = new User;
        $this->user_meta = new UserMeta;
        $this->middleware('admin');
    }

   	public function index(){
   		$users = $this->user->get(['id','username','email','isadmin']);
   		$title = "Quản lý người dùng";
        return view('admin.users.index',compact('users', 'title'));
   	}

   	public function edit($id)
    {
        //
        $user = $this->user->where('id',$id)->get(['id','username','email','isadmin'])->first();

        $user_detail = $user->getUserInfo()->first();
        if ($user_detail->count()) {
            $this->user_meta->create(['userid'=>$user->id]);
        }

	    $title = "Người dùng: " . $user->username;
        return view('admin.users.edit',compact('user', 'title'));
    }


    public function update(Request $request, $id)
    {
        $user = $this->user->where('id',$id)->first();
        $user_meta = $this->user_meta->where('userid',$id)->first();
        $old_user = $this->user->where('id',$id)->first();
        $validator = Validator::make($request->all(),
            [	
                'username'      => 'required|string|max:255',
                'email'         =>  'required|email',
            ]);

        if ($this->user->where('email',$request->email)->where('id','<>',$old_user->id)->first()) {
            Session::flash('error','Email is already exists!');
            return Redirect::back();
            
        }

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user->email = $request->email;
        $user->username = $request->username;

        $user_meta->firstname = $request->firstname;
        $user_meta->lastname = $request->lastname;

        DB::beginTransaction();
        try {
            $user->save();
            $user_meta->save();
            DB::commit();
        } catch (Exception $e) {
            Session::flash('error','Opp! Please try again.Error!');
            DB::rollback();
        }
        Session::flash('success','Success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        //
        $user = $this->user->where('id',$id);
        $user_meta = $this->user_meta->where('userid',$id);
        DB::beginTransaction();
        try {
            $user_meta->delete();
            $user->delete();
            DB::commit();
        } catch (Exception $e) {
            Session::flash('error','Error');
            DB::rollback();
            return Redirect::back();
        }
        Session::flash('success','Success');
        return Redirect::back();
    }

    public function getUrlDelete(Request $request) {
        $id = $request->id;
        if (isset($id)) {
            return route('admin.user.delete',['id'=>$id]);
        }
        return -1;
    }
}
