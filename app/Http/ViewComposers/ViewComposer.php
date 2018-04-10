<?php 

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\Configure;
class ViewComposer
{
	public function __construct() 
    {
    	$configViews = Configure::first();
        $logo = is_null($configViews) ? '' : $configViews->logo;
        $sitename = is_null($configViews) ? '' : $configViews->sitename;
        $facebook = is_null($configViews) ? '' : $configViews->facebook;
        $twitter = is_null($configViews) ? '' : $configViews->twitter;
        $google = is_null($configViews) ? '' : $configViews->google;
        $instagram = is_null($configViews) ? '' : $configViews->instagram;
        $copyright = is_null($configViews) ? '' : $configViews->copyright;
        $promotion_image = is_null($configViews) ? '' : $configViews->promotion_image;
        $promotion_title = is_null($configViews) ? '' : $configViews->promotion_title;
        $promotion_content = is_null($configViews) ? '' : $configViews->promotion_content;
        $promotion_url = is_null($configViews) ? '' : $configViews->promotion_url;
        $android = is_null($configViews) ? '' : $configViews->android;
        $apple = is_null($configViews) ? '' : $configViews->apple;

	    $this->logo = $logo;
	    $this->sitename = $sitename;
	    $this->facebook = $facebook;
	    $this->twitter = $twitter;
	    $this->google = $google;
	    $this->instagram = $instagram;
	    $this->copyright = $copyright;
	    $this->promotion_title = $promotion_title;
	    $this->promotion_content = $promotion_content;
	    $this->promotion_image = $promotion_image;
	    $this->promotion_url = $promotion_url;
	    $this->android = $android;
	    $this->apple = $apple;

    }
	public function compose(View $view)
  	{
       $view->with('logo',$this->logo);
       $view->with('sitename',$this->sitename);
       $view->with('facebook',$this->facebook);
       $view->with('twitter',$this->twitter);
       $view->with('google',$this->google);
       $view->with('instagram',$this->instagram);
       $view->with('copyright',$this->copyright);
       $view->with('promotion_image',$this->promotion_image);
       $view->with('promotion_url',$this->promotion_url);
       $view->with('promotion_content',$this->promotion_content);
       $view->with('promotion_title',$this->promotion_title);
       $view->with('android',$this->android);
       $view->with('apple',$this->apple);
      }
}