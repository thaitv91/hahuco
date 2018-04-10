<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;

class Libraries extends Model
{
    static function country() {
        $country = Analytics::performQuery(Period::days(30),'ga:sessions',  ['dimensions'=>['ga:countryIsoCode'],'sort'=>'-ga:sessions']);
        // dd($country);
        $result= collect($country['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'code' =>  $dateRow[0],
                'value' => (int) $dateRow[1],
                'name'  => $dateRow[0]
            ];
        });

        return $result;
    }

    static function topbrowsers()
    {
        $analyticsData = Analytics::fetchTopBrowsers(Period::days(30));
        $array = $analyticsData->toArray();
        foreach ($array as $k=>$v)
        {
            $array[$k] ['name'] = $array[$k] ['browser'];
            unset($array[$k]['browser']); 
            $array[$k] ['y'] = $array[$k] ['sessions'];
            unset($array[$k]['sessions']); 
        }
        return json_encode($array);
    }

     static function city() {
        $city = Analytics::performQuery(Period::days(60),'ga:sessions',  ['dimensions' => 'ga:country,ga:regionIsoCode,ga:regionId, ga:cityId, ga:city,ga:latitude,ga:longitude','sort'=>'-ga:sessions','filters' => 'ga:country==Vietnam']);
        $result= collect($city['rows'] ?? [])->map(function (array $dateRow) {
            return [            
                'alt-name' => $dateRow[4],
                'value' => (int) $dateRow[6],
            ];
        });

        return $result;
    }

}
