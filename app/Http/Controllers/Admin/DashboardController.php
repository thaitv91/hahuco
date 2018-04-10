<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use Carbon\Carbon;
use Spatie\Analytics\Exceptions\InvalidPeriod;
use Spatie\Analytics\Period;
use Analytics;
use App\Models\Libraries;

class DashboardController extends Controller
{
	public function __construct() {
		 $this->middleware('admin');
	}

    public function index() {
        $this->data = $this->getData();
    	return view('admin.dashboard.dashboard' , $this->data);
    }

    public function ajaxLoadData(){
        $this->data = $this->getData();

        // return view('admin.dashboard.ajaxDashboard', $this->data) ;
        
        return $this->data;
    }

    public function getData()
    {
        $data = array();
        
        $analyticsData_one = Analytics::fetchTotalVisitorsAndPageViews(Period::days(15));
        $data['dates'] = $analyticsData_one->pluck('date');
        $data['visitors'] = $analyticsData_one->pluck('visitors');
        $data['pageViews'] = $analyticsData_one->pluck('pageViews');
        $data['browserjson'] = Libraries::topbrowsers();
        $result = Libraries::country();
        $data['ceci_ver'] = config('mycms.ceci_ver');
        $data['title'] = trans('Dashboard'); 
        $data['pages'] = Analytics::fetchMostVisitedPages(Period::days(30));
        $data['traffics'] = Analytics::fetchTopReferrers(Period::days(30));
        $data['data_country'] = json_encode($result);
        $data['activeVisitors'] = Analytics::getAnalyticsService()->data_realtime->get('ga:' . env('ANALYTICS_VIEW_ID'), 'rt:activeVisitors')->totalsForAllResults['rt:activeVisitors'];
        $cities = Libraries::city();
        $data_city = [['City', 'View']];
        foreach ($cities as $key => $value) {
            array_push($data_city, array_values($value));
        }
        $data['city'] = json_encode($data_city);
        // Data device
        $data_device =  Analytics::getAnalyticsService()->data_realtime->get('ga:' . env('ANALYTICS_VIEW_ID'), 'rt:activeVisitors', ['dimensions'=>['rt:deviceCategory']])->rows;
        $title = ['Genre'];
        $val = ['Thiết bị'];
        if($data_device ==Null){
            $device = [];
        }else{
            foreach ($data_device as $key => $value) {
                    array_push($title, $value[0]);
                    array_push($val,  (int) $value[1]);
            }
        if (!in_array("DESKTOP", $title)) {
                    $title[1] = "DESKTOP";
                    $title[2] = "MOBILE";
                    $val[2] = $val[1];
                    $val[1] = 0;
        }
        if (!in_array("MOBILE", $title)) {
                    $mb = "MOBILE";
                    array_push($title, $mb);
                    $data_mb = 0;
                    array_push($val,$data_mb);
        }
            $device = [$title, $val];
        }
        $data['device'] = json_encode($device);

        return $data;
    }

}
