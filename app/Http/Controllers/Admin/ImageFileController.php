<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image, File;
class ImageFileController extends Controller
{
	protected  $except = [ '/upload' ];

	public function uploadImage($folder, $file)
	{
    	if (!is_dir($folder)) {
    		mkdir(public_path($folder), 0777, true);         
    	}
    	
        $filename = time() . '_' . $file->getClientOriginalName();
        Image::make($file)->save( public_path($folder).'/'.$filename );
        $image_url = $folder .'/'. $filename;
        return $image_url;
    }

    public function UploadEditor() {
	    // Allowed origins to upload images
	    $accepted_origins = array('http://hahuco.childtolife.com');
	    // Images upload path
	    $imageFolder = "/hahuco/uploads/editor/";

	    reset($_FILES);
	    $temp = current($_FILES);

	    if(is_uploaded_file($temp['tmp_name'])){
		    if(isset($_SERVER['HTTP_ORIGIN'])){
			    // Same-origin requests won't set an origin. If the origin is set, it must be valid.
			    if(in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)){
				    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
			    }else{
				    header("HTTP/1.1 403 Origin Denied");
				    return;
			    }
		    }

		    // Sanitize input
		    if(preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])){
			    header("HTTP/1.1 400 Invalid file name.");
			    return;
		    }

		    // Verify extension
		    if(!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))){
			    header("HTTP/1.1 400 Invalid extension.");
			    return;
		    }

		    // Accept upload if there was no origin, or if it is an accepted origin
		    $filetowrite = $imageFolder . $temp['name'];
		    move_uploaded_file($temp['tmp_name'], $filetowrite);

		    // Respond to the successful upload with JSON.
		    echo json_encode(array('location' => $filetowrite));
	    } else {
		    // Notify editor that the upload failed
		    header("HTTP/1.1 500 Server Error");
	    }
    }

	public function store()
	{
		$folder = 'uploads';
		$file = request()->file('name');
		return $file;
		if (!is_dir($folder)) {
			mkdir(public_path($folder), 777, true);
		}

		$filename = time() . '_' . $file->getClientOriginalName();
		Image::make($file)->save( public_path($folder).'/'.$filename );
		$image_url = $folder .'/'. $filename;
		return $image_url;
	}



}
