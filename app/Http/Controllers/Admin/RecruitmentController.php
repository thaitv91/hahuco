<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use App\Models\RecruitmentJob as Job;
use App\Models\RecruitmentPlace as Place;
use App\Models\RecruitmentProfile as Profile;
use App\Models\RecruitmentResume as Resume;

class RecruitmentController extends Controller
{
	private $imate;

	public function __construct() {
		$this->middleware('admin');
		$this->image = new ImageFileController;
	}

    public function index() {
    	$title = 'Recruitment';
    	$recruitments = Recruitment::all();

    	return view('admin.recruitment.indexRecruitment', compact(['title', 'recruitments']));
    }

    public function createRecruitment() {
    	$title = 'Recruitment | Create';
    	$jobs = Job::all();
    	$places = Place::all();

    	return view('admin.recruitment.createRecruitment', compact(['title', 'jobs', 'places']));
    }

    public function storeRecruitment(Request $request) {
    	$request->validate(array(
    			'title'		=>	'required',
    			'body'		=>	'required',
    			'job'		=>	'required',
    			'place'		=>	'required',
    	));

    	$recruitment = new Recruitment;
    	$recruitment->title = $request->title;
    	$recruitment->body = $request->body;
    	$recruitment->job_id = $request->job;
    	$recruitment->place_id = $request->place;

    	if($request->thumbnail) {
    		$recruitment->thumbnail = $this->image->uploadImage('images/recruitment', $request->thumbnail);
    	}

    	$recruitment->save();

    	\Session::flash('success', 'Create item success');

    	return redirect()->route('admin.recruitment.index');
    }

    public function editRecruitment($id) {
    	$title = 'Recruitment | Edit';
    	$recruitment = Recruitment::where('id', $id)->firstOrFail();
    	$jobs = Job::all();
    	$places = Place::all();

    	return view('admin.recruitment.editRecruitment', compact(['title', 'recruitment', 'jobs', 'places']));
    }

    public function updateRecruitment(Request $request, $id) {
    	$request->validate(array(
    			'title'		=>	'required',
    			'body'		=>	'required',
    			'job'		=>	'required',
    			'place'		=>	'required',
    	));

    	$recruitment = Recruitment::where('id', $id)->firstOrFail();
    	$recruitment->title = $request->title;
    	$recruitment->body = $request->body;
    	$recruitment->job_id = $request->job;
    	$recruitment->place_id = $request->place;

    	if($request->thumbnail) {
    		$recruitment->thumbnail = $this->image->uploadImage('images/recruitment', $request->thumbnail);
    	}
    	$recruitment->save();

    	\Session::flash('success', 'Update item success');

    	return redirect()->route('admin.recruitment.edit', ['id' => $id]);
    }

    public function removeRecruitment($id) {
    	Recruitment::where('id', $id)->delete();

    	\Session::flash('success', 'Remove item success');

    	return redirect()->route('admin.recruitment.index');
    }

    public function indexJob() {
    	$title = 'Recruitment | Job';
    	$jobs = Job::all();

    	return view('admin.recruitment.indexJob', compact(['title', 'jobs']));
    } 

    public function createJob() {
    	$title = 'Recruitment | Job | Create';

    	return view('admin.recruitment.createJob', compact(['title']));
    }

    public function storeJob(Request $request) {
    	$request->validate(['name' => 'required']);

    	$job = new Job;
    	$job->name = $request->name;
    	$job->description = $request->description;
    	$job->save();

    	\Session::flash('success', 'Create item success');

    	return redirect()->route('admin.recruitment.job.index');
    }

    public function editJob($id) {
    	$title = 'Recruitment | Job | Edit';
    	$job = Job::where('id', $id)->firstOrFail();

    	return view('admin.recruitment.editJob', compact(['title', 'job']));
    }

    public function updateJob(Request $request, $id) {
    	$request->validate(['name' => 'required']);

    	$job = Job::where('id', $id)->firstOrFail();
    	$job->name = $request->name;
    	$job->description = $request->description;
    	$job->save();

    	\Session::flash('success', 'Update item success');

    	return redirect()->route('admin.recruitment.job.edit', ['id' => $id]);
    }

    public function removeJob($id) {
    	Job::where('id', $id)->delete();

    	\Session::flash('success', 'Remove item success');

    	return redirect()->route('admin.recruitment.job.index');
    }

    public function indexPlace() {
    	$title = 'Recruitment | Place';
    	$places = Place::all();

    	return view('admin.recruitment.indexPlace', compact(['title', 'places']));
    } 

    public function createPlace() {
    	$title = 'Recruitment | Place | Create';

    	return view('admin.recruitment.createPlace', compact(['title']));
    }

    public function storePlace(Request $request) {
    	$request->validate(['name' => 'required']);

    	$place = new Place;
    	$place->name = $request->name;
    	$place->description = $request->description;
    	$place->save();

    	\Session::flash('success', 'Create item success');

    	return redirect()->route('admin.recruitment.place.index');
    }

    public function editPlace($id) {
    	$title = 'Recruitment | Place | Edit';
    	$place = Place::where('id', $id)->firstOrFail();

    	return view('admin.recruitment.editPlace', compact(['title', 'place']));
    }

    public function updatePlace(Request $request, $id) {
    	$request->validate(['name' => 'required']);

    	$place = Place::where('id', $id)->firstOrFail();
    	$place->name = $request->name;
    	$place->description = $request->description;
    	$place->save();

    	\Session::flash('success', 'Update item success');

    	return redirect()->route('admin.recruitment.place.edit', ['id' => $id]);
    }

    public function removePlace($id) {
    	Place::where('id', $id)->delete();

    	\Session::flash('success', 'Remove item success');

    	return redirect()->route('admin.recruitment.place.index');
    }

    public function indexProfile() {
        $title = 'Recruitment | Profile';
        $profiles = Profile::all();

        return view('admin.recruitment.indexProfile', compact(['title', 'profiles']));
    }

    public function showProfile($id) {
        $title = 'Recruitment | Profile | Detail';
        $profile = Profile::where('id', $id)->firstOrFail();
        $profile->status = 1;
        $profile->save();

        return view('admin.recruitment.showProfile', compact(['title', 'profile']));
    }

    public function removeProfile($id) {
        Profile::where('id', $id)->delete();

        \Session::flash('success', 'Remove item success');

        return redirect()->route('admin.recruitment.profile.index');
    }

    public function indexResume() {
        $title = 'Recruitment |Resume';
        $resumes = Resume::all();

        return view('admin.recruitment.indexResume', compact(['title', 'resumes']));
    }

    public function createResume() {
        $title = 'Recruitment | Resume | Create';

        return view('admin.recruitment.createResume', compact(['title']));
    }

    public function storeResume(Request $request) {
        $request->validate(array(
                'name'     =>  'required',
                'thumbnail'=>  'required | mimes:jpeg,bmp,png,jpg',
                'resume_format'=>  'required | mimes:jpeg,bmp,png,jpg',
        ));

        $resume = new Resume;
        $resume->name = $request->name;
        $resume->description = $request->description;

        if($request->thumbnail) {
            $resume->thumbnail = $this->image->uploadImage('images/resume/thumbnail', $request->thumbnail);
        }

        if($request->resume_format) {
            $resume->url_download = $this->image->uploadImage('images/resume/files', $request->resume_format);
        }

        $resume->save();

        \Session::flash('success', 'Create item success');

        return redirect()->route('admin.recruitment.resume.index');
    }

    public function editResume($id) {
        $title = 'Recruitment | Resume | Edit';
        $resume = Resume::where('id', $id)->firstOrFail();

        return view('admin.recruitment.editResume', compact(['title', 'resume']));
    }

    public function updateResume(Request $request, $id) {
        $request->validate(array(
                'name'     =>  'required',
                'thumbnail'=>  'mimes:jpeg,bmp,png,jpg',
                'resume_format'=>  'mimes:jpeg,bmp,png,jpg',
        ));
        $resume = Resume::where('id', $id)->firstOrFail();
        $resume->name = $request->name;
        $resume->description = $request->description;

        if($request->thumbnail) {
            $resume->thumbnail = $this->image->uploadImage('images/resume/thumbnail', $request->thumbnail);
        }

        if($request->resume_format) {
            $resume->url_download = $this->image->uploadImage('images/resume/files', $request->resume_format);
        }

        $resume->save();

        \Session::flash('success', 'Update item success');

        return redirect()->route('admin.recruitment.resume.edit', ['id' => $id]);
    }

    public function removeResume($id) {
        Resume::where('id', $id)->delete();

        \Session::flash('success', 'Remove item success');

        return redirect()->route('admin.recruitment.resume.index');
    }
}
