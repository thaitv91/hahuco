<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use App\Models\RecruitmentProfile as Profile;
use App\Models\RecruitmentJob as Job;
use App\Models\RecruitmentPlace as Place;
use App\Jobs\RecruitmentMail;
use Validator;

class RecruitmentController extends Controller
{
    public function index() {
        $title = 'Tuyển dụng';
        $recruitments = Recruitment::select('title', 'id', 'body', 'thumbnail', 'created_at')->get();

        return view('frontend.recruitment_list', compact(['title', 'recruitments']));
    }

    public function storeProfile(Request $request) {
        $validator = Validator::make($request->all(),
        [
            'email' =>  'email',
            'captcha' => 'required|captcha'
        ],
        [   
            'email.email' => 'Email không đúng định dạng!!!',
            'captcha.captcha' =>'Mã Captcha không đúng!!!'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }else{
           try {
            $profile = new Profile;
            $profile->name = $request->name;
            $profile->email = $request->email;
            $profile->phone = $request->phone;
            $profile->content = $request->content;

            $file;
            if ($file = $request->file('profile')) {
                $folder = 'file/profile';
                $fileName = time().'_'.$request->profile->getClientOriginalName();
                $file->move($folder, $fileName);
                $profile->profile = $folder.'/'.$fileName;
            }

            $profile->save();

            $this->sendMail($profile->email);
        } catch (Exception $e) {
            return 0;
        }

        return 1;
        }
    	
    }

    private function sendMail($email_user) {
        $send_mail = (new RecruitmentMail($email_user));
        dispatch($send_mail);
    }

    public function search(Request $request) {
        $recruitments = new Recruitment;

        if ($request->job) {
            $job_id = $request->job;
            $recruitments = $recruitments->where('job_id', $job_id);
        }

        if ($request->place) {
            $place_id = $request->place;
            $recruitments = $recruitments->where('place_id', $place_id);
        }

        $keyword = $request->keyword;
        if ($keyword && ($keyword != '')) {
            $keyword = $this->convert_vi_to_en($keyword);
            $keyword = preg_replace('/[^A-Za-z0-9" "]/', '', $keyword); //Replace all special chars
            $keyword = preg_replace("/[[:blank:]]+/"," ",$keyword); //Replace multiple space
            $keyword = trim($keyword);//Trim space at first and last string
            $keyword = str_replace(' ', '%', $keyword);
            $keyword = '%'.$keyword.'%';
            $recruitments = $recruitments->where('title', 'LIKE', $keyword);
        }

        $recruitments = $recruitments->paginate(5);

        return view('frontend.recruitment_result', compact(['recruitments']));
    }

    public function show($id) {

        $recruitment = Recruitment::where('slug', $id)->firstOrFail();
	    $title = "Tuyển Dụng: " . $recruitment->title;
        return view('frontend.recruitment_detail', compact(['recruitment', 'title']));
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
